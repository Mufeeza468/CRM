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
            'Department_ID' => $request->input('Department_ID'),
            'TeamLead_ID' => $request->input('TeamLead_ID'),
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
            'Department_ID' => $request->Department_ID,
            'TeamLead_ID' => $request->TeamLead_ID,
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