<?php

namespace App\Database\Seeds;

use App\Models\BlogModel;
use Faker\Factory;
use CodeIgniter\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'user_id'   => 1,
                'title'     => $faker->text(20),
                'description'   => $faker->paragraph(10)
            ];
        }

        (new BlogModel())->insertBatch($data);
    }
}
