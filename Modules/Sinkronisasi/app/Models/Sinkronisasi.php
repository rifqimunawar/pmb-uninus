<?php

namespace Modules\Sinkronisasi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Sinkronisasi\Database\Factories\SinkronisasiFactory;

class Sinkronisasi extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   */
  protected $guarded = [];
}
