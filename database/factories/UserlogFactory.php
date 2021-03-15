<?php
/*
File name       : UserlogFactors.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : factory for userlogs table

Author          :Tesfazghi  robiel
*/


namespace Database\Factories;

use App\Models\Userlog;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Userlog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    //generate fake userid and ip adress
    public function definition()
    {
        return [
            'user_id'=>$this->faker->unique->numberBetween($min=1,$max=100),
            'adresse_ip'=>$this->faker->ipv4
        ];
    }
}
