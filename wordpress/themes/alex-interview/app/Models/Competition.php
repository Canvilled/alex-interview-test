<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends BaseModel
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'logo'
    ];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function Matcheses()
    {
        return $this->hasMany(Matches::class);
    }
}
