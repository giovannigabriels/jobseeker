<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';

    protected $fillable = [
        'candidate_id',
        'full_name',
        'dob',
        'gender',
    ];

    public function candidateApplies()
    {
        return $this->hasMany(CandidateApply::class, 'candidate_id', 'candidate_id');
    }

    public static function getAllCandidates()
    {
        return self::all();
    }
}
