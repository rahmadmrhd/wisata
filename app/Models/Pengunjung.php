<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model {
  use HasFactory;
  protected $guarded = ['id'];
  public static function generateKode() {
    $last = Pengunjung::orderBy('id', 'desc')->first();
    if ($last == null) {
      return 'P0001';
    }
    return 'P' . sprintf('%04s', $last->id + 1);
  }
}
