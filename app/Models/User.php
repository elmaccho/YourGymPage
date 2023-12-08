<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'email',
        'role',
        'password',
        'pass_type_id',
        'pass_start_date',
        'pass_end_date'
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

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function hasAddress(): bool
    {
        return !is_null($this->address);
    }
    public function userOrderData(): HasOne
    {
        return $this->hasOne(UserOrderData::class);
    }

    public function passType(): BelongsTo
    {
        return $this->BelongsTo(PassType::class);
    }
    public function hasPassType(): bool
    {
        return !is_null($this->passType);
    }
    public function startDatePass()
    {
        $todayDate = Carbon::now();
        $startDate = $todayDate->diffInDays($this->pass_start_date, false);
        return $startDate;
    }

    public function endDatePass()
    {
        $todayDate = Carbon::now();
        $endDate = $todayDate->diffInDays($this->pass_end_date, false);
        return $endDate;
    }

}
