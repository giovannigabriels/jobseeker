<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class VacancyController extends Controller
{
    public function index(Request $request)
    {
        $query = Vacancy::query();

        // SORT
        if ($request->has('sort_name')) {
            $order = $request->input("sort_name");
            $query->orderBy("vacancy_name", $order);
        };             

         // FILTER
        if ($request->has('search')) {
            $query->where('vacancy_name', 'LIKE', '%' . $request->input('search'). '%');
        };

        if ($request->has('min_age')) {
            $query->where('min_age', '>=', $request->input('min_age'));
        };

        if ($request->has('max_age')) {
            $query->where('max_age', '<=', $request->input('max_age'));
        };


        $vacancies = $query->get();
        return response()->json($vacancies);
    }
}
