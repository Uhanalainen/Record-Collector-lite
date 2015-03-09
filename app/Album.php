<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

	protected $fillable = [
        'name'
    ];

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function format()
    {
        return $this->belongsTo('App\Format');
    }

    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }

}
