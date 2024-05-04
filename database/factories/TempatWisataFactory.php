<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TempatWisata>
 */
class TempatWisataFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array {
    return [
      'kode' => fake()->unique()->ean8(),
      'nama' => fake()->name(),
      'tahun_buka' => fake()->year(),
      'harga_tiket' => fake()->numberBetween(100000, 5000000),
      'jam_buka' => fake()->time('H:i'),
      'jam_tutup' => fake()->time('H:i'),
    ];
  }
}
