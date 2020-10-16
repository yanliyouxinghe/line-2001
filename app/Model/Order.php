<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'order_info';
 protected $guarded = [];
 protected $primaryKey = "order_id";

//  protected $fillable = ['attr_name','attr_values'];
 public $timestamps = false;
}
