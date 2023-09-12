<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vacancy;
use App\Models\Candidate;

class CandidateApply extends Model
{
    protected $table = 'candidate_applies';

    protected $fillable = [
        'apply_id',
        'candidate_id',
        'vacancy_id',
        'apply_date',
    ];

    protected $with = [
        'candidate','vacancy',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'candidate_id');
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id', 'vacancy_id');
    }
    public static function getAllCandidateApplies()
    {
        return self::all();
    }
}
