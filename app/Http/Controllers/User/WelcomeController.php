<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\TwoDResult;
use App\Models\Admin\TwoDSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
    public function index()
    {
        $sessions = TwoDSession::with(['results' => function($query){
            $query->whereDate('created_at', Carbon::today());
        }])->get();
        $latest_result = TwoDResult::latest()->first()->result;
        return view('welcome', compact('sessions', 'latest_result'));
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
        // return $dailyResults;

        return view('calendar', compact('dailyResults'));
    }
}
