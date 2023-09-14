<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Team;
use Illuminate\Support\Facades\Validator;



class TeamController extends Controller
{
    // index: Get a list of all teams.
    public function index()
    {
        $teams = Team::all();
        return response()->json(['data' => $teams]);
    }

    public function store(Request $request)
    {
        return Team::create([
            'name' => $request->input('name'),
            'department_id' => $request->input('department_id'),
            'teamlead_id' => $request->input('teamlead_id'),
        ]);

        //return response()->json(['message' => 'Team created successfully', 'data' => $team], 201);
    }


    // show: Get a specific team by ID.

    public function show($id)
    {
        // return $Team=Team::all();
        $team = Team::find($id);


        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }

        return response()->json(['data' => $team]);
    }

    public function update(Request $request)
    {
        $team = Team::find($request->id);

        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }

        $team->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'teamlead_id' => $request->teamlead_id,
        ]);
        return response()->json(['message' => 'Team updated successfully', 'data' => $team]);

    }


    // destroy: Delete a team.

    public function destroy($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }

        $team->delete();

        return response()->json(['message' => 'Team deleted successfully']);
    }
}