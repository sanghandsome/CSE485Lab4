<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>fake()->sentence,        // Tạo tên sách giả
            'author' => fake()->name,          // Tạo tên tác giả giả
            'category' => fake()->word,        // Tạo thể loại sách giả
            'year' => fake()->year,            // Tạo năm xuất bản giả
            'quantity' => fake()->numberBetween(1, 100), // Tạo số lượng sách giả
        ];
    }
}
