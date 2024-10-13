<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Absensi;
use App\Models\Kela;

class AbsensiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Absensi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->date(),
            'kelas_id' => Kela::factory(),
        ];
    }
}
