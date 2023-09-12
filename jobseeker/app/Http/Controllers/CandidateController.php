<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    protected $rules = [
        'full_name' => 'unique:candidates'
    ];

    public function index(Request $request)
    {
        $query = Candidate::query();

        // SORT
        if ($request->has('sort_name') && $request->input("sort_name") != null) {
            $order = $request->input("sort_name");
            $query->orderBy("full_name", $order);
        };
    
        // FILTER
        if ($request->has('search') && $request->has('search') != null) {
            $query->where('full_name', 'LIKE', '%' . $request->input('search') . '%');
        };
    
        if ($request->has('dob_start') && $request->input('dob_start') != null) {
            $query->where('dob', '>=', $request->input('dob_start'));
        };
    
        if ($request->has('dob_end') && $request->input('dob_end') != null) {
            $query->where('dob', '<=', $request->input('dob_end'));
        };
        
        if ($request->has('gender') && $request->input('gender') != null) {
            $query->where('gender', $request->input('gender'));
        };

        $candidates = $query->get();

        return response()->json($candidates);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $candidate = new Candidate();
        $validator = $candidate->validate($data);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $full_name = $request->full_name;
        $dob = $request->dob;
        $gender = $request->gender;
        $candidate = Candidate::create([
            'full_name' => $full_name,
            'dob' => $dob,
            'gender' => $gender
        ]);
        return response()->json($candidate, 201);
    }

    public function destroy(Request $request, $candidate_id)
    {
        $candidate = candidate::find($candidate_id);

        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        $candidate->delete();

        return response()->json(['message' => 'Candidate deleted'], 200);
    }

    public function update(Request $request, $candidate_id)
    {
        $candidate = Candidate::find($candidate_id);

        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'dob' => 'required',
            'gender' => 'required', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }


        $candidate->update([
            'full_name' => $request->full_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);

        return response()->json(['message' => 'Candidate updated successfully'], 200);
    }
}
