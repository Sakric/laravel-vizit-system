<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => Str::random(10),
            'category_id' => 1,
            'body' => '',
            'thumbnail' => 'doctors/4hSUlcdOzwJww6l1OzclDLo0IwRu4eLiZih7drwJ.jpg'
        ];
    }
}
