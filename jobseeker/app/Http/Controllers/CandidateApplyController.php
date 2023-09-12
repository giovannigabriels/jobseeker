<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidateApply;

class CandidateApplyController extends Controller
{
    public function index()
    {
        $candidateApplies = CandidateApply::getAllCandidateApplies();
        return response()->json($candidateApplies);
    }

    public function store(Request $request)
    {
        $candidateId = $request->candidate_id;
        $vacancyId = $request->vacancy_id;
        $candidateApply = CandidateApply::create([
            'candidate_id' => $candidateId,
            'vacancy_id' => $vacancyId,
            'apply_date' => now()
        ]);
        return response()->json($candidateApply, 201);
    }

  

}
