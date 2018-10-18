<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyingTransaction extends Model
{
    // Table Name
    protected $table = 'buyingtransaction';

    // Primary Key
    public $primaryKey = 'id';
}
