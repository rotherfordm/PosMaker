<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    // Table Name
    protected $table = 'attributes';

    // Primary Key
    public $primaryKey = 'id';

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
