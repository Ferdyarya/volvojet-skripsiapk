<?php

namespace Database\Factories;

use App\Models\Salesmaster;
use Illuminate\Database\Eloquent\Factories\Factory;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{
    protected $model = Salesmaster::class;
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
