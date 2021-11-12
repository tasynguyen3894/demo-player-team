<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'player';

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country_id',
        'team_id',
        'birthday',
        'status',
    ];

    /**
     * Get the country record associated with the player.
     */
    public function country() {
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }

     /**
     * Get the team record associated with the player.
     */
    public function team() {
        return $this->hasOne('App\Models\Team', 'id', 'team_id');
    }
}
