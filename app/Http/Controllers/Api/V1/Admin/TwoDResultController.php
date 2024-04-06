<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TwoDResult;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class TwoDResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HttpResponses;
    public function index()
    {
        $result = TwoDResult::latest()->paginate(10);
        return $this->success($result);
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
            'result' => 'required|integer',
            'two_d_session_id' => 'required|numeric'
        ]);

        $result = TwoDResult::create($request->all());
        return $this->success($result, "2D Result created successfully.");
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
        $result = TwoDResult::find($id);
        if(!$result){
            return $this->error("2D Result not found.", 404);
        }
        $request->validate([
            'result' => 'required|integer',
            'two_d_session_id' => 'required|numeric'
        ]);

        $result->update($request->all());
        return $this->success($result, "2D Result updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = TwoDResult::find($id);
        if(!$result){
            return $this->error("2D Result not found.", 404);
        }
        $result->delete();
        return $this->success($result, "2D Result deleted successfully.");
    }
}
