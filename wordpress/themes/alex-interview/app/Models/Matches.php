<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matches extends BaseModel
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'competition_id',
        'home_team_id',
        'away_team_id',
        'status_id',
        'match_time',
        'home_scores',
        'away_scores'
    ];

    protected $casts = [
        'home_scores' => 'array',
        'away_scores' => 'array'
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
}
