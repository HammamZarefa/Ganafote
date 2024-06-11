<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Match extends Model  {

use SoftDeletes, Auditable, HasFactory;

public $table = 'matches';

 public const HAS_PENLTY_SELECT = [
'home' => 'Team Home',
    'away' => 'Team Away',
];

protected $dates = [
'start_date',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected $fillable = [
'team_home_id',
    'team_away_id',
    'category_id',
    'competetion_id',
    'stage_id',
    'status',
    'start_date',
    'start_time',
    'home_score',
    'away_score',
    'home_half_score',
    'away_half_score',
    'home_yellow_card',
    'away_yellow_card',
    'home_red_card',
    'away_red_card',
    'home_summery',
    'away_summery',
    'has_penlty',
    'end_time',
    'notes',
    'is_archived',
    'stadium_id',
    'collaborator_id',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected function serializeDate(DateTimeInterface $date)
{
    



return $date->format('Y-m-d H:i:s');
    
}
public function matchMatchEvents()
{
    



return $this->hasMany(MatchEvent::class, 'match_id', 'id');
    
}
public function matchPenlities()
{
    



return $this->hasMany(Penlity::class, 'match_id', 'id');
    
}
public function team_home()
{
    



return $this->belongsTo(Team::class, 'team_home_id');
    
}
public function team_away()
{
    



return $this->belongsTo(Team::class, 'team_away_id');
    
}
public function category()
{
    



return $this->belongsTo(Category::class, 'category_id');
    
}
public function competetion()
{
    



return $this->belongsTo(Competition::class, 'competetion_id');
    
}
public function stage()
{
    



return $this->belongsTo(Stage::class, 'stage_id');
    
}
public function getStartDateAttribute($value)
{
    



return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    
}
public function setStartDateAttribute($value)
{
    



$this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    
}
public function stadium()
{
    



return $this->belongsTo(Staduim::class, 'stadium_id');
    
}
public function collaborator()
{
    



return $this->belongsTo(Client::class, 'collaborator_id');
    
}

}