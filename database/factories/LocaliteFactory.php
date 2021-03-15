<?php
/*
File name       : LocaliteFactory.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : factory for localite table

Author          :Tesfazghi  robiel
*/

namespace Database\Factories;

use App\Models\Localite;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocaliteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Localite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    /* create fake localite */
    public function definition()
    {
        return [
            'npa' => $this->faker->unique->numberBetween($min=1000,$max=9999),
            'nom' => $this->faker->unique->city,
        ];
    }
}
