<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    protected $connection = 'mysql';
    protected $table ='order_items';
    protected $primaryKey='id';

    public $timestamps = True;
}
