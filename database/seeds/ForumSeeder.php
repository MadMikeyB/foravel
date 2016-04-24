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
 		factory(App\Forum::class, 10)->create();
 		factory(App\Thread::class, 100)->create();
 		factory(App\ForumPost::class, 1500)->create();
    }
}
