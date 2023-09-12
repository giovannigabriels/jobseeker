<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $query = Candidate::query();

        // SORT
        if ($request->has('sort_name')) {
            $order = $request->input("sort_name");
            $query->orderBy("full_name", $order);
        };

        // FILTER
        if ($request->has('search')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('search'). '%');
        };

        if ($request->has('dob_start')) {
            $query->whereDate('dob', '>=', $request->input('dob_start'));
        };

        if ($request->has('dob_end')) {
            $query->whereDate('dob', '<=', $request->input('dob_end'));
        };
        
        if ($request->has('gender')) {
            $query->where('gender', $request->input('gender'));
        };

        $candidates = $query->get();
        return response()->json($candidates);
    }
}
