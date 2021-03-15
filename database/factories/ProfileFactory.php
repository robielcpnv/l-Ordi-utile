<?php
/*
File name       : ProfileFactory.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : factory for profile table

Author          :Tesfazghi  robiel
*/

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
   /*  create fake profile 
    because it use email from user table you have to run it after factor user */
    public function definition()
    {
        return [
            'langue_id' => $this->faker->numberBetween($min=1,$max=100),
            'localite_id' => $this->faker->numberBetween($min=1,$max=100),
            'formation_id' => $this->faker->numberBetween($min=1,$max=4),
            'titre' => $this->faker->randomElement($role = array('Madame', 'Monsieur', 'Autre')),
            'date_de_naissance' => $this->faker->date,
            'adresse' => $this->faker->streetAddress,
            'telephone' => $this->faker->e164PhoneNumber,
            'email' =>
            DB::table('users')->where('id',$this->faker->unique->numberBetween($min=1,$max=100))->value('email'),
            'image' => 'uploads/GnVGSM1fPojERSZRVNW2Nd5z6LlQkGN4PxEr8Qdd.png',
            'remarque' => $this->faker->sentence,
            'confident_remarque' => $this->faker->sentence,
            'confident_remarque_direction' => $this->faker->sentence,
            'code_identifiant' => $this->faker->numberBetween($min=0000,$max=9000),
            'responsable_nom' => $this->faker->name,
            'responsable_prenom' => $this->faker->name,
            'responsable_telephone' => $this->faker->e164PhoneNumber,
            'responsable_email' => $this->faker->email,
        ];
    }
}
