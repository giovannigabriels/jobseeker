<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CandidateApply;
use Illuminate\Support\Facades\Validator;


class Candidate extends Model
{
    protected $table = 'candidates';
    protected $primaryKey = 'candidate_id';

    protected $fillable = [
        'candidate_id',
        'full_name',
        'dob',
        'gender',
    ];

    protected $rules = [
        'full_name' => 'required|unique:candidates',
    ];

    protected $with = ['candidateApplies'];

    public function validate(array $data)
    {
        return Validator::make($data, $this->rules);
    }


    public function candidateApplies()
    {
        return $this->hasMany(CandidateApply::class, 'candidate_id');
    }

    public static function getAllCandidates()
    {
        return self::all();
    }
}
