<?php
namespace Database\Seeders;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    public function run()
    {
        Comment::create([
            'user_id' => 2,
            'shop_product_id' => 1,
            'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, explicabo distinctio! Aliquid, sint? Enim omnis veritatis cupiditate dolore magni debitis.',
            'rate' => 1.3,
        ]);

        Comment::create([
            'user_id' => 2,
            'shop_product_id' => 2,
            'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, explicabo distinctio! Aliquid, sint? Enim omnis veritatis cupiditate dolore magni debitis.',
            'rate' => 2.6,
        ]);

        Comment::create([
            'user_id' => 3,
            'shop_product_id' => 2,
            'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, explicabo distinctio! Aliquid, sint? Enim omnis veritatis cupiditate dolore magni debitis.',
            'rate' => 3.5,
        ]);

        Comment::create([
            'user_id' => 3,
            'shop_product_id' => 3,
            'comment' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, explicabo distinctio! Aliquid, sint? Enim omnis veritatis cupiditate dolore magni debitis.',
            'rate' => 4.1,
        ]);
    }
}
