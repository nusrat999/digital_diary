<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Diary;
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

        $user = User::factory()->create([
            'name' => 'nusrat',
            'email' => 'nusrat@example.com',
        ]);
        
        /*
        Diary::factory(6)->create([
            'user_id' => $user->id
        ]);
        */

        Diary::create([
            'user_id' => $user->id,
            'title' => 'Today\'s weather',
            'description' => 'The weather today is 21 degree celsius. The cold is numbing my fingers but I have to stay awake and study for the exams.'
        ]);

        Diary::create([
            'user_id' => $user->id,
            'title' => 'Nusrat\'s Metropolitan University life December 2022',
            'description' => 'All the exams are weighing me down. I can\'t wait for December 29th when I will be done with my exams. Only then, I can relax and enjoy the winter Pithas.'
        ]);
        
    }
}
