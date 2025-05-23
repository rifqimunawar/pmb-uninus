<?php

namespace Modules\ReportUmum\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\ReportUmum\Database\Factories\ReportUmumFactory;

class ReportUmum extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   */
  protected $guarded = [];
}
