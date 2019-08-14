<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $connection = 'mysql';
    protected $table ='orders';
    protected $primaryKey='id';

    public $timestamps = True;

    public function items() {
        return $this->hasMany('App\Order_items', 'order_id', 'id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
