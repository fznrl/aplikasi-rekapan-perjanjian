<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perjanjian>
 */
class PerjanjianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uraian' => $this->faker->paragraph(),
            'no_pks' => mt_rand(),
            'mulai' => $this->faker->dateTimeThisDecade(),
            'berakhir' => $this->faker->dateTimeThisDecade(),
            // 'sisa_waktu' => 123,
            'wilayah' => $this->faker->word(),
            'kegiatan' => $this->faker->sentence(),
            'keterangan' => $this->faker->paragraph(),
            'category_id' => mt_rand(1,6)
        ];
    }
}
