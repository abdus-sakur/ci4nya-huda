<?php

namespace App\Database\Seeds;

use App\Models\CommentModel;
use Faker\Factory;
use CodeIgniter\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'user_id'   => 1,
                'blog_id'     => random_int(1, 50),
                'comment'   => $faker->text(25)
            ];
        }

        (new CommentModel())->insertBatch($data);
    }
}
