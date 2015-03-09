<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {

	protected $fillable = [
        'price',
        'purchased_from'
    ];

    public function album()
    {
        return $this->hasMany('Album');
    }

}
