<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bulllentin extends Model
{
  protected $table = 'ecs_bulletin';
 protected $guarded = [];
 protected $primaryKey = "bulletin_id";

//  protected $fillable = ['attr_name','attr_values'];
 public $timestamps = false;
}
