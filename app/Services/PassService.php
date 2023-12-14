<?php

namespace App\Services;

use Carbon\Carbon;

class PassService
{

    
    public function calculateRemainingDays(Carbon $passStartDate, Carbon $passEndDate)
    {      
        if(now() < $passStartDate){
            $remainingDays = now() ->diffInDays($passStartDate);
            $remainingHours = now()->diffInHours($passStartDate);
            $remainingMinutes = now()->diffInMinutes($passStartDate) % 60;
            $remainingSeconds = now()->diffInSeconds($passStartDate) % 60;

            return compact(
                'remainingDays',
                'remainingHours',
                'remainingMinutes',
                'remainingSeconds'
            );
        } else if (now() >= $passStartDate){
            $remainingDays = now() ->diffInDays($passEndDate);
            $remainingHours = now()->diffInHours($passEndDate);
            $remainingMinutes = now()->diffInMinutes($passEndDate) % 60;
            $remainingSeconds = now()->diffInSeconds($passEndDate) % 60;

            return compact(
                'remainingDays',
                'remainingHours',
                'remainingMinutes',
                'remainingSeconds'
            );
        }
    }
}
