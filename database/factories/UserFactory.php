<?php
/*
File name       : UserFactory.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : factory for user table

Author          :Tesfazghi  robiel
*/


namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    // generate fake user 
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'prenom' => $this->faker->name,
            'role'=> $this->faker->randomElement($role = array('Direction', 'Administration', 'Client', 'Operateur')),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
