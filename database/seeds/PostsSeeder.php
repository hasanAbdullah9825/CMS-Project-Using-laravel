<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

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

        $author2=User::create([

            'name'=>'jhon doe',
          'email'=>'jhon@gmail.com',
          'password'=>Hash::make('password'),
        ]);

        $author3=User::create([

            'name'=>'jhen doe',
          'email'=>'jhen@gmail.com',
          'password'=>Hash::make('password'),
        ]);

        $author4=User::create([

            'name'=>'modoris',
          'email'=>'modoris@gmail.com',
          'password'=>Hash::make('password'),
        ]);




        $post1=$author2->posts()->create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aspernatur exercitationem molestiae earum ea a harum beatae cum magni explicabo.",
            'content'=>"The standard Lorem Ipsum passage, used since the 1500s
            \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"
            
            Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC
            \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"
            
            1914 translation by H. Rackham",
            'image'=>'posts/2.jpg',
            'category_id'=>$category1->id
        ]);

        $post2=$author3->posts()->create([
            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aspernatur exercitationem molestiae earum ea a harum beatae cum magni explicabo.",
            'content'=>"The standard Lorem Ipsum passage, used since the 1500s
            \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"
            
            Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC
            \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"
            
            1914 translation by H. Rackham",
            'image'=>'posts/3.jpg',
            'category_id'=>$category2->id
        ]);

        $post3=$author4->posts()->create([
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy',
            'content'=>'he 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem',
            'image'=>'posts/4.jpg',
            'category_id'=>$category3->id
        ]);

        $post4=$author2->posts()->create([
            'title'=>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem, quo!",
            'description'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aspernatur exercitationem molestiae earum ea a harum beatae cum magni explicabo.",
            'content'=>"The standard Lorem Ipsum passage, used since the 1500s
            \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"
            
            Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC
            \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"
            
            1914 translation by H. Rackham",
            'image'=>'posts/6.jpg',
            'category_id'=>$category4->id
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag3->id,$tag2->id]);
        $post3->tags()->attach([$tag1->id,$tag2->id]);
        $post4->tags()->attach([$tag1->id,$tag2->id]);
        
        
    }
}
