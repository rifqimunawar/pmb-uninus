<?php

namespace Modules\Kegiatan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Kegiatan\Database\Factories\KegiatanFactory;

class Kegiatan extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
}
