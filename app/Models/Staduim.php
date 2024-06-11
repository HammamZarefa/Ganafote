<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staduim extends Model  {

use SoftDeletes, Auditable, HasFactory;

public $table = 'staduims';

protected $dates = [
'created_at',
    'updated_at',
    'deleted_at',
];

protected $fillable = [
'name',
    'address',
    'city',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected function serializeDate(DateTimeInterface $date)
{
    



return $date->format('Y-m-d H:i:s');
    
}
public function stadiumMatches()
{
    



return $this->hasMany(Match::class, 'stadium_id', 'id');
    
}

}