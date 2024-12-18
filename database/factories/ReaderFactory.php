<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader>
 */
class ReaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,             // Tạo tên khách hàng giả
            'birthday' => fake()->date,         // Tạo ngày sinh khách hàng giả
            'address' => fake()->address,       // Tạo địa chỉ khách hàng giả
            'phone' => fake()->phoneNumber,     // Tạo số điện thoại giả
        ];
    }
}
