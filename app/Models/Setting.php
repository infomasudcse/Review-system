<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Setting extends Model
{
    use HasFactory;

    // Table name is optional if already "settings"
    protected $table = 'settings';

    protected $fillable = [
        'user_id',
        'business_name',
		'phone',
        'email',
		'country_name',
		'country_code',
        'google_review_link',
		'google_business_name',
        'default_whatsapp_template',
        'default_email_template',
		'slug'
    ];

    // One-to-one relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
