<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_model =  new UserModel();
        $user_model->insert([
            'username' => 'admin',
            'email' => 'huda@admin.io',
            'password' => password_hash('12345', PASSWORD_BCRYPT)
        ]);
    }
}
