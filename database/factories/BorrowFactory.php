<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reader;
use App\Models\Book;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reader_id' => Reader::inRandomOrder()->first()->id, // Lấy ngẫu nhiên id của reader
            'book_id' => Book::inRandomOrder()->first()->id, // Lấy ngẫu nhiên id của book
            'borrow_date' => fake()->date(), // Tạo ngày mượn giả
            'return_date' => fake()->date(), // Tạo ngày trả giả
            'status' => fake()->boolean(50), // 50% xác suất trả về 0 hoặc 1
        ];
    }
}
