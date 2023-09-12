<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';

    protected $fillable = [
        'vacancy_id',
        'vacancy_name',
        'min_age',
        'max_age',
        'requirement_gender',
        'expired_date',
    ];

    public function candidateApplies()
    {
        return $this->hasMany(CandidateApply::class, 'vacancy_id', 'vacancy_id');
    }

    public static function getAllVacancies()
    {
        return self::all();
    }
}
