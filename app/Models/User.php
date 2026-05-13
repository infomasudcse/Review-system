<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function clients() {
        return $this->hasMany(Client::class);
    }

	public function reviewRequests() {
        return $this->hasMany(ReviewRequest::class);
    }

	public function settings() {
		return $this->hasOne(Setting::class);
	}

    public function hasFeature(string $feature)
    {
        $plan = $this->plan ?? 'free';
        return config("features.features.$feature.$plan") ?? false;
    }

    public function getFeatureLimit(string $feature)
    {
        $plan = $this->plan ?? 'free';
        return config("features.features.$feature.$plan");
    }

	public function complaints()
	{
		// This allows the Merchant to see all complaints from all their clients
		return $this->hasManyThrough(Complaint::class, Client::class);
	}

}
