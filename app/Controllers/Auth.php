<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    /**
     * Show login form
     */
    public function login()
    {
        helper(['form']);
        return view('auth/login');
    }

    /**
     * Handle login form submission
     */
    public function loginAuth()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id'        => $user['id'],
                    'name'      => $user['name'],
                    'email'     => $user['email'],
                    'role'      => $user['role'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);

                // ✅ Redirect based on role
                switch ($user['role']) {
                    case 'admin':
                        return redirect()->to('/admin/dashboard');
                    case 'faculty':
                        return redirect()->to('/faculty/dashboard');
                    case 'student':
                        return redirect()->to('/student/dashboard');
                    default:
                        $session->setFlashdata('error', 'Invalid role assigned.');
                        return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('error', 'Invalid password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Email not found');
            return redirect()->to('/login');
        }
    }

    /**
     * Show registration form
     */
    public function register()
    {
        helper(['form']);
        return view('auth/register');
    }

    /**
     * Handle registration
     */
    public function registerSave()
    {
        helper(['form']);
        $rules = [
            'name'     => 'required',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]',
            'role'     => 'required|in_list[admin,faculty,student]'
        ];

        if (!$this->validate($rules)) {
            return view('auth/register', [
                'validation' => $this->validator
            ]);
        }

        $model = new UserModel();
        $model->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role')
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful. You can now log in.');
    }

    /**
     * Logout and destroy session
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
