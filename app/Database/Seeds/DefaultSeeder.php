<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DefaultSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('BlogSeeder');
        $this->call('CommentSeeder');
    }
}
