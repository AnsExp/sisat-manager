<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [Gender::MALE->value, Gender::FEMALE->value];
        for ($i = 0; $i < 1000; $i++) {
            $position = Position::inRandomOrder()->first();
            $gender = fake()->randomElement($genders);
            Employee::create([
                'first_name' => fake()->firstName($gender),
                'second_first_name' => fake()->optional()->firstName($gender),
                'last_name' => fake()->lastName($gender),
                'second_last_name' => fake()->optional()->lastName($gender),
                'gender' => $gender,
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'id_card' => fake()->numerify('##########'),
                'position_id' => $position->id,
                'workspace_id' => $position->workspace->id,
                'company_id' => $position->workspace->company->id,
            ]);
        }
    }
}
