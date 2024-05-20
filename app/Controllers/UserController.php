<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $m_user;
    public function __construct()
    {
        $this->m_user = new UserModel();
    }

    public function login()
    {
        return view('auth/login', [
            'title' => "Login Page"
        ]);
    }

    public function prosesLogin()
    {
        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('password') ?? '';
        $getUser    = $this->m_user->where('username', $username)->first();
        if ($getUser) {
            $verify_password = password_verify($password, $getUser['password']);
            if ($verify_password) {
                $session = [
                    'user_id' => $getUser['id'],
                    'fullname' => $getUser['username'],
                    'email' => $getUser['email'],
                    'isLogin' => true,
                ];
                session()->set($session);
                return redirect()->to(base_url());
            }
            return redirect()->to(base_url('login'))->with('alert_error', 'Username or password is wrong');
        }
        return redirect()->to(base_url('login'))->with('alert_error', 'Username or password is wrong');
    }

    public function logout()
    {
        session()->set('');
        session()->destroy();

        return redirect()->to(base_url('login'))->with('alert_error', 'Silahkan login untuk melanjutkan');
    }
}
