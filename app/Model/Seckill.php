<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seckill extends Model
{
		  protected $table = 'seckill';
		  protected $guarded = [];
		  protected $primaryKey = "seckill_id";
		  public $timestamps = false;
}
