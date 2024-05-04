<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use App\Models\TempatWisata;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   */
  public function run(): void {
    User::factory()->create([
      'name' => 'Admin',
      'username' => 'admin',
      'password' => Hash::make('admin'),
    ]);

    Pengunjung::factory(50)->create();
    TempatWisata::factory(50)->create();
  }
}
