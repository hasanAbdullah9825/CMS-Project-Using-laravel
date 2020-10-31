<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $category1=Category::create(['name'=>'News']);
        $category2=Category::create(['name'=>'Design']);
        $category3=Category::create(['name'=>'Product']);
        $category4=Category::create(['name'=>'Top']);


        $tag1=Tag::create(['name'=>'job']);
        $tag2=Tag::create(['name'=>'customer']);
        $tag3=Tag::create(['name'=>'offers']);


        $post1=Post::create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy',
            'content'=>'he 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem',
            'image'=>'posts/5.jpg',
            'category_id'=>$category1->id
        ]);

        $post2=Post::create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy',
            'content'=>'he 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem',
            'image'=>'posts/2.jpg',
            'category_id'=>$category2->id
        ]);

        $post3=Post::create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy',
            'content'=>'he 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem',
            'image'=>'posts/3.jpg',
            'category_id'=>$category3->id
        ]);

        $post4=Post::create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy',
            'content'=>'he 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem',
            'image'=>'posts/3.jpg',
            'category_id'=>$category4->id
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag3->id,$tag2->id]);
        $post3->tags()->attach([$tag1->id,$tag2->id]);
        $post4->tags()->attach([$tag1->id,$tag2->id]);
        
        
    }
}
