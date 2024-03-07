<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'acc_holder_name_1' => $this->faker->name,
            'acc_holder_cif_1' => $this->faker->randomNumber(6),
            'acc_holder_name_2' => $this->faker->name,
            'acc_holder_cif_2' => $this->faker->randomNumber(6),
            'account_number' => $this->faker->bankAccountNumber,
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'mobile' => $this->faker->phoneNumber,
            'open_date' => $this->faker->date,
            'years' => $this->faker->numberBetween(1, 10),
            'matu_date' => $this->faker->date,
            'family_id' => $this->faker->randomNumber(6),
            'payment_reciver_name' => $this->faker->name,
            'payment_type' => $this->faker->randomElement(['cash', 'sb']),
            'payment_date' => $this->faker->date,
            'address' => $this->faker->address,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
