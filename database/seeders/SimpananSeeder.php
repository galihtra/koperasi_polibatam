<?php

namespace Database\Seeders;

use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Database\Seeder;

class SimpananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Simpanan::factory()->count(rand(1, 5))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}