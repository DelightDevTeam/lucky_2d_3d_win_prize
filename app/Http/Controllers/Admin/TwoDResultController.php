<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TwoDResult;
use App\Models\Admin\TwoDSession;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TwoDResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = TwoDResult::latest()->paginate(10);
        return view('admin.twoDResults.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sessions = TwoDSession::all();
        return view('admin.twoDResults.create', compact('sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'result' => 'required',
            'two_d_session_id' => 'required',
        ]);
        TwoDResult::create($request->all());
        return redirect()->back()->with('success', 'Result created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sessions = TwoDSession::all();
        $result = TwoDResult::find($id);
        if(!$result)
        {
            return redirect()->route('admin.twoD-results.index')->with('error', 'Result not found.');
        }
        return view('admin.twoDResults.edit', compact('result', 'sessions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = TwoDResult::find($id);
        if(!$result)
        {
            return redirect()->route('admin.twoD-results.index')->with('error', 'Result not found.');
        }
        $request->validate([
            'result' => 'required',
            'two_d_session_id' => 'required',
        ]);
        $result->update($request->all());
        return redirect()->route('admin.twoD-results.index')->with('success', 'Result updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = TwoDResult::find($id);
        if(!$result)
        {
            return redirect()->route('admin.twoD-results.index')->with('error', 'Result not found.');
        }
        $result->delete();
        return redirect()->route('admin.twoD-results.index')->with('success', 'Result deleted successfully.');
    }


}
