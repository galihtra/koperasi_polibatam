<?php 

namespace Database\Factories;

use App\Models\Simpanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimpananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Simpanan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $jenisSimpanan = ['wajib', 'sukarela', 'lainnya'];
        return [
            'jumlah' => $this->faker->numberBetween(100000, 1000000),
            'tanggal' => $this->faker->date(),
            'keterangan' => $this->faker->sentence,
            'jenis_simpanan' => $this->faker->randomElement($jenisSimpanan),
        ];
    }
}
