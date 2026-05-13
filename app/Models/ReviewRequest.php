<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'channel',          // sms or whatsapp
        'status',           // pending, sent, failed, scheduled
        'tokenId',
        'body',
		'provider_id',
		'clicked_at',
		'updated_at',
		'google_clicked_at'
    ];

	protected $casts = [
		'clicked_at' => 'datetime',
		'google_clicked_at' => 'datetime',
	];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
