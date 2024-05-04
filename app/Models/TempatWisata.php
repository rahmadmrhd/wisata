<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model {
  use HasFactory;
  protected $guarded = ['id'];
  public static function generateKode() {
    $last = TempatWisata::orderBy('id', 'desc')->first();
    if ($last == null) {
      return 'TW0001';
    }
    return 'TW' . sprintf('%04s', $last->id + 1);
  }
}
