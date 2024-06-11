<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchEvent extends Model  {

use SoftDeletes, Auditable, HasFactory;

public $table = 'match_events';

protected $dates = [
'created_at',
    'updated_at',
    'deleted_at',
];

protected $fillable = [
'match_id',
    'event_type',
    'team_id',
    'player_id',
    'minute',
    'value',
    'status',
    'notes',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected function serializeDate(DateTimeInterface $date)
{
    



return $date->format('Y-m-d H:i:s');
    
}
public function match()
{
    



return $this->belongsTo(Match::class, 'match_id');
    
}
public function team()
{
    



return $this->belongsTo(Team::class, 'team_id');
    
}
public function player()
{
    



return $this->belongsTo(Player::class, 'player_id');
    
}

}