<?php

use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		// factory(App\Forum::class, 10)->create();
 		factory(App\Thread::class, 1000)->create();
 		factory(App\ForumPost::class, 15000)->create();
    }
}
