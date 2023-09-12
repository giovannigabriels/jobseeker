<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
       
        $data = $request->all();
        $vacancies = new Vacancy();
        $validator = $vacancies->validate($data);
      
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $vacancy_name = $request->vacancy_name;
        $min_age = $request->min_age;
        $max_age = $request->max_age;
        $requirement_gender = $request->requirement_gender;
        $expired_date = $request->expired_date;
        $vacancies = Vacancy::create([
            'vacancy_name' => $vacancy_name,
            'min_age' => $min_age,
            'max_age' => $max_age,
            'requirement_gender' => $requirement_gender,
            'expired_date' => $expired_date
        ]);
        return response()->json($vacancies, 201);
    }

    public function destroy(Request $request, $vacancy_id)
    {
        $vacancy = Vacancy::find($vacancy_id);

        if (!$vacancy) {
            return response()->json(['message' => 'Vacancy not found'], 404);
        }

        $vacancy->delete();

        return response()->json(['message' => 'Vacancy deleted'], 200);
    }

    public function update(Request $request, $vacancy_id)
    {
        $vacancy = Vacancy::find($vacancy_id);

        if (!$vacancy) {
            return response()->json(['message' => 'Vacancy not found'], 404);
        }


        $validator = Validator::make($request->all(), [
            'vacancy_name' => 'required|string',
            'min_age' => 'required|integer',
            'max_age' => 'required|integer',
            'requirement_gender' => 'required|string',
            'expired_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }


        $vacancy->update([
            'vacancy_name' => $request->vacancy_name,
            'min_age' => $request->min_age,
            'max_age' => $request->max_age,
            'requirement_gender' => $request->requirement_gender,
            'expired_date' => $request->expired_date,
        ]);

        return response()->json(['message' => 'Vacancy updated successfully'], 200);
    }

}
