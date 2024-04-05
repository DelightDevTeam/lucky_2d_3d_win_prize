<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TwoDSession;
use Illuminate\Http\Request;

class TwoDSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = TwoDSession::all();
        return view('admin.twoDSessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.twoDSessions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        TwoDSession::create($request->all());
        return redirect()->route('admin.twoD-sessions.index')->with('success', 'Session created successfully.');
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
        $session = TwoDSession::find($id);
        if(!$session){
            return redirect()->route('admin.twoD-sessions.index')->with('error', 'Session Not Found!');
        }
        return view('admin.twoDsessions.edit', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $session = TwoDSession::find($id);
        if(!$session){
            return redirect()->route('admin.twoD-sessions.index')->with('error', 'Session Not Found!');
        }
        $request->validate([
            'name' => 'required',
        ]);
        $session->update($request->all());
        return redirect()->route('admin.twoD-sessions.index')->with('success', 'Session updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $session = TwoDSession::find($id);
        if(!$session){
            return redirect()->route('admin.twoD-sessions.index')->with('error', 'Session Not Found!');
        }
        $session->delete();
        return redirect()->route('admin.twoD-sessions.index')->with('success', 'Session deleted successfully.');
    }
}
