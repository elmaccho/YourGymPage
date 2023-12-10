<?php

namespace App\Services;

use Carbon\Carbon;

class PassService
{
    public function calculateRemainingDays(Carbon $passStartDate, Carbon $passEndDate)
    {
        $remainingToPass = now()->diffInDays($passStartDate);
        $remainingDays = $passStartDate->diffInDays($passEndDate);
        $remainingHours = now()->diffInHours($passStartDate);
        $remainingMinutes = now()->diffInMinutes($passStartDate) % 60;
        $remainingSeconds = now()->diffInSeconds($passStartDate) % 60;

        return compact('remainingToPass', 'remainingDays', 'remainingHours', 'remainingMinutes', 'remainingSeconds');
    }
}
