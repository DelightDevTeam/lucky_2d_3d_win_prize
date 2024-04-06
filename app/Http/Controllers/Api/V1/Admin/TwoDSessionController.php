<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TwoDSession;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class TwoDSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HttpResponses;
    public function index()
    {
        $sessions = TwoDSession::all();
        return $this->success($sessions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $session = TwoDSession::create($request->all());
        return $this->success($session, "2D Session created successfully");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
    
        $session = TwoDSession::findOrFail($id);

        $session->update([
            'name' => $request->input('name')
        ]);
    
        return $this->success($session, "2D Session updated successfully");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $session = TwoDSession::findOrFail($id);
        if(!$session)
        {
            return $this->error("2D Session not found", 404);
        }
        $session->delete();
        return $this->success([], "2D Session deleted successfully");
    }
}
