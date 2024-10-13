<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\TahunAjaran;

class KelasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'tahun_ajaran_id' => TahunAjaran::factory(),
            'wali_kelas_id' => Guru::factory(),
        ];
    }
}
