<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompetitionTeam extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'competition_teams';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'competition_id',
        'team_id',
        'category_id',
        'group',
        'play',
        'points',
        'goals',
        'goal_gainst',
        'win',
        'lose',
        'draw',
        'yellow_cards',
        'red_cards',
        'top_scorer_id',
        'top_scorer_goals',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function top_scorer()
    {
        return $this->belongsTo(Player::class, 'top_scorer_id');
    }
}
