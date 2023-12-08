<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PassType extends Model
{
    use HasFactory;

    protected $fillable = [
    ];

    public function user(): HasMany
    {
        return $this->HasMany(User::class);
    }

}
