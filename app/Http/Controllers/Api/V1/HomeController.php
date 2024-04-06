<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\TwoDResult;
use App\Models\Admin\TwoDSession;
use App\Traits\HttpResponses;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HttpResponses;
    public function home()
    {
        $sessions = TwoDSession::with(['results' => function($query){
            $query->whereDate('created_at', Carbon::today());
        }])->get();
        $latest_result = TwoDResult::latest()->first();
        return $this->success([
            'sessions' => $sessions,
            'latest_result' => $latest_result
        ], 200);
    }

    public function calendar()
    {
        $today = Carbon::today();

        // Initialize an empty array to store daily results
        $dailyResults = [];

        // Loop through each day starting from today and going back a certain number of days (e.g., 7 days)
        for ($i = 0; $i < 7; $i++) {
            // Calculate the date for the current iteration
            $date = $today->copy()->subDays($i);

            // Retrieve results for the current day
            $results = TwoDResult::whereDate('created_at', $date)->get();

            // Store the results for the current day in the dailyResults array
            $dailyResults[$date->format('Y-m-d')] = $results;
        }
        return $this->success($dailyResults, 200);
    }
}
