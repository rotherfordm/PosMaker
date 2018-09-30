<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointOfSale extends Model
{
    // Table Name
    protected $table = 'points_of_sale';

    // Primary Key
    public $primaryKey = 'id';

    // TimeStamps
    public $timestamps = true;
    
    public function user(){
        return $this->belongsTo('App\PointOfSale');
    }
}
