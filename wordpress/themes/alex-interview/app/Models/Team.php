<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends \App\Models\BaseModel
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'competition_id',
        'country_id',
        'name',
        'logo'
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function homeMatcheses()
    {
        return $this->hasMany(Matches::class, 'home_team_id');
    }

    public function awayMatcheses()
    {
        return $this->hasMany(Matches::class, 'away_team_id');
    }
}
