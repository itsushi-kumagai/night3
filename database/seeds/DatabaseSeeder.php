<?php

use Illuminate\Database\Seeder;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory('App\User',50)->create();
        factory('App\Post',50)->create();
        factory('App\Profile',50)->create();
        factory('App\Category',3)->create();
        
        $posts = factory(App\Post::class)->create();

        factory(Comment::class, 30)->create([
            'post_id' => $posts->id
        ]);

        $comment = Comment::first();

        factory(Comment::class, 20)->create([
            'post_id' => $posts->id,
            'comment_id' => $comment->id,
        ]);

    }
}
