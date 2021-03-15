<?php
/*
File name       : LangueFactory.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : factory for langue table

Author          :Tesfazghi  robiel
*/

namespace Database\Factories;

use App\Models\Langue;
use Illuminate\Database\Eloquent\Factories\Factory;

class LangueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Langue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
   /*  create fake langue */
    public function definition()
    {
        return [
            'nom'=>$this->faker->unique->languageCode
        ];
    }
}
