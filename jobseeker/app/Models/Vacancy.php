<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $primaryKey = 'vacancy_id';

    protected $fillable = [
        'vacancy_name',
        'min_age',
        'max_age',
        'requirement_gender',
        'expired_date',
    ];

  

    protected $rules = [
        'vacancy_name' => 'unique:vacancies',
    ];

    public function validate(array $data)
    {
        return Validator::make($data, $this->rules);
    }

    public function candidateApplies()
    {
        return $this->hasMany(CandidateApply::class, 'vacancy_id', 'vacancy_id');
    }

    public static function getAllVacancies()
    {
        return self::all();
    }
}
