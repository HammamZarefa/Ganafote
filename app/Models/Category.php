<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model  {

use SoftDeletes, Auditable, HasFactory;

public $table = 'categories';

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
    'number_of_players_in_match',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected function serializeDate(DateTimeInterface $date)
{
    



return $date->format('Y-m-d H:i:s');
    
}
public function categoryMatches()
{
    



return $this->hasMany(Match::class, 'category_id', 'id');
    
}

}