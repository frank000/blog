<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 //       \Illuminate\Support\Facades\DB::table('posts')->insert([
   //         'title' => 'primeira postagem',
    //        'description' => 'POstagem com teste seedes',
    //        'content' => 'Conteudo da postagem',
    //        'is_active' => 1,
    //        'slug' => 'primeira-postagem',
    //        'user_id' => 1
    //    ]);
    factory(Post::class, 30)->create();
        
    }
}
