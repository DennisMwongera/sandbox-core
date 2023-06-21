<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the programmes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programme::all();

        return response()->json(['programmes' => $programmes]);
    }

    /**
     * Store a newly created programme in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'lead_program_officer' => 'required',
            'support_department' => 'required',
            'status' => 'required',
        ]);

        $programme = Programme::create($request->all());

        return response()->json(['programme' => $programme], 201);
    }

    /**
     * Display the specified programme.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        return response()->json(['programme' => $programme]);
    }

    /**
     * Update the specified programme in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme $programme)
    {
        $request->validate([
            'title' => 'required',
            'lead_program_officer' => 'required',
            'support_department' => 'required',
            'status' => 'required',
        ]);

        $programme->update($request->all());

        return response()->json(['programme' => $programme]);
    }

    /**
     * Remove the specified programme from storage.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();

        return response()->json(['message' => 'Programme deleted']);
    }
}
