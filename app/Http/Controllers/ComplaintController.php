<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\Client;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = auth()->user()->complaints()->with('client')->unresolved()->latest()->paginate(20);
        return view('complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		$request->validate([
			'client_id' => 'required|exists:clients,id',
			'message' => 'required|min:10',
		]);

		if (isset($request['name']) && $request['name']) {
			$client = Client::where('id', $request['client_id'])->update(['name' => $request['name']]);

		}

		if ($request->tokenId) {

			$exists = Complaint::where('tokenId', $request->tokenId)->exists();

			if ($exists) {
				return redirect()->back()->with('error', 'Feedback already submitted.');
			}
		}


        Complaint::create([
			'client_id' => $request->client_id,
			'message' => $request->message,
			'tokenId' => $request->tokenId,
			'is_resolved' => false,
		]);

		return view('review-landing.review-thank-you');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->update([
            'is_resolved' => 1,
            'resolved_at' => now(),
        ]);

		return redirect()->back()->with('success', 'Complaint marked as resolved.');
    }

	public function resolvedIndex()
	{
		// Fetch only resolved complaints for the current user
		$complaints = auth()->user()->complaints()
			->with('client')
			->resolved()
			->latest('resolved_at')
			->paginate(20);

		return view('complaints.resolved', compact('complaints'));
	}

	public function clearAllResolved()
	{
		// Permanently delete all resolved complaints for this user
		auth()->user()->complaints()->where('is_resolved', 1)->delete();

		return redirect()->route('complaints.index')->with('success', 'Resolved complaints history cleared.');
	}


}
