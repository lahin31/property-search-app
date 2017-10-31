<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'houseName', 'houseFor', 'housePrice', 'houseAddress', 'houseImage', 'houseDescription', 'houseBedrooms', 'houseBathrooms', 'houseArea'
    ];

    public function owner()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
