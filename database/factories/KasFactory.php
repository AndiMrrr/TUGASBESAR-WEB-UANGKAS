<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kas>
 */
class KasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->dateTimeBetween('-1 month'),
            'keterangan' => $this->faker->sentence(4),
            'tipe' => $this->faker->randomElement(['pemasukan', 'pengeluaran']),
            'jumlah' => $this->faker->numberBetween(100000, 5000000),
        ];
    }

    /**
     * Indicate that the Kas is a pemasukan
     */
    public function pemasukan(): static
    {
        return $this->state(fn (array $attributes) => [
            'tipe' => 'pemasukan',
        ]);
    }

    /**
     * Indicate that the Kas is a pengeluaran
     */
    public function pengeluaran(): static
    {
        return $this->state(fn (array $attributes) => [
            'tipe' => 'pengeluaran',
        ]);
    }
}
