<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ordergoods extends Model
{
  protected $table = 'order_goods';
 protected $guarded = [];
 protected $primaryKey = "order_shop_id";

//  protected $fillable = ['attr_name','attr_values'];
 public $timestamps = false;
}
