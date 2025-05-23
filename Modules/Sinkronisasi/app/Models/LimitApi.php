<?php

namespace Modules\Sinkronisasi\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Sinkronisasi\Database\Factories\LimitApiFactory;

class LimitApi extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   */
  protected $guarded = [];

  public function users()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
