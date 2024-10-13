<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Absensi;
use App\Models\AbsensiDetail;
use App\Models\Siswa;

class AbsensiDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AbsensiDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'absensi_id' => Absensi::factory(),
            'siswa_id' => Siswa::factory(),
            'hadir' => $this->faker->randomElement(["true","false"]),
            'alfa' => $this->faker->randomElement(["true","false"]),
            'sakit' => $this->faker->randomElement(["true","false"]),
            'izin' => $this->faker->randomElement(["true","false"]),
            'keterangan' => $this->faker->word(),
        ];
    }
}
