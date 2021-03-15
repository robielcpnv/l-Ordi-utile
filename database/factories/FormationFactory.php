<?php
/*
File name       : FormationFactory.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : factory for formation table

Author          :Tesfazghi  robiel
*/

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Formation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    /* create fake formation */
    public function definition()
    {
        return [
          'nom'=>$this->faker->unique->randomElement($role = array('Elève', 'Etudiant', 'Stagiaire', 'Apprenti')),
        ];
    }
}
