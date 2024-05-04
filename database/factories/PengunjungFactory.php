<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengunjung>
 */
class PengunjungFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array {
    return [
      'kode' => fake()->unique()->ean8(),
      'no_ktp' => fake()->unique()->isbn13(),
      'nama' => fake()->name(),
      'alamat' => fake()->address(),
      'jenis_kelamin' => fake()->randomElement(['L', 'P']),
      'tgl_berkunjung' => fake()->dateTimeBetween('-1 years', 'now'),
    ];
  }
}
