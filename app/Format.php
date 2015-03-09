<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model {

	protected $fillable = [
      'name'
    ];

    public function album()
    {
        return $this->hasMany('App\Album');
    }
}
