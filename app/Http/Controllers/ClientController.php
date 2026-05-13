<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\RedirectResponse;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Client::class, 'client');
    }

	public function downloadTemplate($format): BinaryFileResponse
	{
		// 1. Validate the format requested
		$extension = ($format === 'excel') ? 'xlsx' : 'csv';
		$fileName = "customer_template.{$extension}";
		$filePath = storage_path("app/public/{$fileName}");

		// 2. Create the file and add headers + 1 sample row
		$writer = SimpleExcelWriter::create($filePath)
			->addRow([
				'name'  => 'John Doe',
				'email' => 'john@example.com',
				'phone' => '+447123456789'
			]);

		// 3. Download and delete the file from the server after sending
		return response()->download($filePath)->deleteFileAfterSend(true);
	}

	public function storeFromFile(Request $request): RedirectResponse
	{

		if (!$request->user()->subscribed('pro-plan')) {
			return redirect()->route('billing')
				->with('status', 'Bulk importing is a Pro feature. Please upgrade to continue!');
		}

		$request->validate([
		'csv_file' => 'required|file|mimes:csv,txt,xlsx'
		],
		[
			'csv_file.mimes' => 'The file must be a CSV or Excel spreadsheet. We cannot read PDF or Image files.',
        	'csv_file.required' => 'Please select a file to upload.',
		]
		);
		$extension = $request->file('csv_file')->getClientOriginalExtension();

		$rows = SimpleExcelReader::create($request->file('csv_file')->getRealPath(), $extension)->getRows();

		$rows->each(function (array $row) {
			auth()->user()->clients()->create([
				'name'  => $row['name'],
				'email' => $row['email']?? null,
				'phone' => $row['phone'] ?? null, // Safely handles missing phone columns
			]);
		});

		return redirect()->back()->with('status', 'Clients imported successfully!');
	}


    public function index(Request $request)
    {
        if ($request->query('checkout') === 'success') {
			session()->now('success', 'Welcome to the Pro Plan! Your account is now active.');
		}
		$clients = auth()->user()->clients()->latest()->paginate(20);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = auth()->user();
		$client_qty = $user->clients()->count();
		if (!$user->subscribed('pro-plan') && $client_qty >= 20) {
			$message = 'You have reached the limit of 20 clients on the Free plan. Upgrade to Pro Plan for unlimited clients';
			return redirect()->route('billing')
				->with('error', $message);
		}
		if ($request->has('full_phone')) {
			$request->merge(['phone' => $request->full_phone]);
		}

		$request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
        ]);

        auth()->user()->clients()->create($request->all());

		$message = 'Client created. Request a Review now.';

        return redirect()->route('clients.index')->with('success', $message);
    }

    public function show(Client $client)
    {
        //$this->authorize('view', $client); // optional
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        //$this->authorize('update', $client); // optional
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client): RedirectResponse
    {
       // $this->authorize('update', $client);

		if ($request->has('full_phone')) {
			$request->merge(['phone' => $request->full_phone]);
		}
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string'
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated. Request a review');
    }

    public function destroy(Client $client): RedirectResponse
    {
        $this->authorize('delete', $client);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted.');
    }
}
