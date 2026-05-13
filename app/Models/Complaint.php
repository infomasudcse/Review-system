<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

	protected $fillable = ['client_id', 'message', 'tokenId', 'is_resolved', 'resolved_at'];

	protected $casts = [
		'resolved_at' => 'datetime',
	];

    // Get the client who made this complaint
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

	public function scopeUnresolved($query)
	{
		return $query->where('is_resolved', 0);
	}

	public function scopeResolved($query)
	{
		return $query->where('is_resolved', 1);
	}

}
