<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users = User::all();

        // Create and attach 10 new followers to each user
        $users->each(function ($user) {
//            $followers = User::factory(10)->create();
//            $user->following($followers);

            // Create 10 new tweets for each user
            Tweet::factory(10)->create(['user_id' => $user->id]);
        });
    }
}
