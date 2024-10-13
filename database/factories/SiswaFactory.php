<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kela;
use App\Models\Siswa;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'foto' => $this->faker->word(),
            'nis' => $this->faker->word(),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->text(),
            'kelas_id' => Kela::factory(),
        ];
    }
}
