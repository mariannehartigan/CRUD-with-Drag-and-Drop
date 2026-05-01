<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    public function definition(): array
    {
      $todos = [
        'Make dinner',
        'Walk the dog',
        'Walk the cat',
        'Rebuild the CN Tower',
        'Take out garbage',
        'Do taxes',
        'Get exhaust leak fixed on car',
        'Exercise',
        'Make a basket',
        'Touch grass',
        'Organize junk drawer',
        'Clean out fridge',
        'Get gas',
        'Pay bills',
        'Fix extension cord that only works “if you hold it”',
        'Do dishes',
        'Go to Mars',
        'Locate mystery smell',
        'Fix curtain that kids pulled out of the wall',
        'Renew license',
        'Check mail',
        'Get groceries',
        'Make a statue out of poop',
        'Build a house',
        'Make a Tik Tok',
        'Get air from Planet Druidia',
        'Do Sociology paper',
        'Rob the bank',
        'Lose 10 pounds',
        'Eat healthy',
        'Fix the world',
        'Apply for university',
        'Save Princess Vespa',
        'Assemble furniture',
        'Swim with dolphins',
      ];

      return [
        'description' => fake()->unique()->randomElement($todos),
        'completed' => fake()->Boolean(),
        'category_id' => fake()->numberBetween(1, 3),
      ];
    }
}
