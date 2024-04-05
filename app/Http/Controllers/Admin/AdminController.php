<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TwoDResult;
use App\Models\Admin\TwoDSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect(route('login'))->with('error', "Please Login First!");
        }
        $sessions = TwoDSession::with(['results' => function($query){
            $query->whereDate('created_at', Carbon::today());
        }])->get();
        // return $results;

        return view('admin.dashboard', compact('sessions'));
    }
}
