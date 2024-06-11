<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model  {

use SoftDeletes, Auditable, HasFactory;

public $table = 'competitions';

public static $searchable = [
'name',
];

protected $dates = [
'created_at',
    'updated_at',
    'deleted_at',
];

protected $fillable = [
'name',
    'description',
    'organized_by',
    'status',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected function serializeDate(DateTimeInterface $date)
{
    



return $date->format('Y-m-d H:i:s');
    
}
public function competitionCategoryCompetitions()
{
    



return $this->hasMany(CategoryCompetition::class, 'competition_id', 'id');
    
}
public function competitionCompetitionTeams()
{
    



return $this->hasMany(CompetitionTeam::class, 'competition_id', 'id');
    
}
public function competetionMatches()
{
    



return $this->hasMany(Match::class, 'competetion_id', 'id');
    
}

}