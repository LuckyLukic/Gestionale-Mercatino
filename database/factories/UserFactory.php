<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {

        $addressId = Address::inRandomOrder()->value('id');

        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'address_id' => $addressId
            ,
        ];
    }



    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            // Create 2 to 5 random items for the user
            $numItems = rand(2, 5);
            ItemFactory::new()->count($numItems)->create(['user_id' => $user->id]);



        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
