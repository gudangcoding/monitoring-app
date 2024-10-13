<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\TahunAjaran;

class NilaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nilai::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'siswa_id' => Siswa::factory(),
            'mata_pelajaran_id' => MataPelajaran::factory(),
            'nilai_tugas' => $this->faker->numberBetween(-10000, 10000),
            'nilai_uts' => $this->faker->numberBetween(-10000, 10000),
            'nilai_uas' => $this->faker->numberBetween(-10000, 10000),
            'tahun_ajaran_id' => TahunAjaran::factory(),
        ];
    }
}
