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
    $model = new \App\Models\UserModel();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user) {
        // Debug output (remove after fixing)
        echo "<pre>";
        echo "Entered Email: " . $email . "\n";
        echo "Entered Password: " . $password . "\n";
        echo "Stored Hash: " . $user['password'] . "\n";
        echo "Verify: " . (password_verify($password, $user['password']) ? '✔ Match' : '✘ No Match');
        echo "</pre>";
        exit;

        if (password_verify($password, $user['password'])) {
            $sessionData = [
                'id'        => $user['id'],
                'name'      => $user['name'],
                'email'     => $user['email'],
                'role'      => $user['role'],
                'isLoggedIn' => true,
            ];
            $session->set($sessionData);

            // Role-based redirect
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

    //Shows the forgot password form.
        public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    //Handles email submission and sends reset link with token
    public function handleForgotPassword()
{
    $email = $this->request->getPost('email');
    $model = new UserModel();
    $user = $model->where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email not found.');
    }

    // Generate a secure token
    $token = bin2hex(random_bytes(32));
    $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Store token in DB
    $model->update($user['id'], [
        'reset_token' => $token,
        'token_expires' => $expires
    ]);

    // Build reset link
    $link = base_url("reset-password/$token");

    // TODO: Send email - for now, just show it on screen
    return redirect()->to('/forgot-password')->with('message', "Reset link: <a href='$link'>$link</a>");
}

//Show reset form if token is valid.
public function resetPassword($token)
{
    $model = new UserModel();
    $user = $model->where('reset_token', $token)
                  ->where('token_expires >=', date('Y-m-d H:i:s'))
                  ->first();

    if (!$user) {
        return redirect()->to('/login')->with('error', 'Invalid or expired token.');
    }

    return view('auth/reset_password', ['token' => $token]);
}

//Save new password in DB and clear token
public function saveNewPassword($token)
{
    $model = new UserModel();
    $user = $model->where('reset_token', $token)
                  ->where('token_expires >=', date('Y-m-d H:i:s'))
                  ->first();

    if (!$user) {
        return redirect()->to('/login')->with('error', 'Invalid or expired token.');
    }

    $rules = ['password' => 'required|min_length[4]'];
    if (!$this->validate($rules)) {
        return view('auth/reset_password', [
            'token' => $token,
            'validation' => $this->validator
        ]);
    }

    $model->update($user['id'], [
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'reset_token' => null,
        'token_expires' => null
    ]);

    return redirect()->to('/login')->with('success', 'Password reset successful. Please log in.');
}

public function createAdmin()
{
    $model = new \App\Models\UserModel();

    $data = [
        'name'     => 'Super Admin',
        'email'    => 'admin@urms.com',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
        'role'     => 'admin',
        'created_at' => date('Y-m-d H:i:s'),
    ];

    // Check if already exists
    if (!$model->where('email', 'admin@urms.com')->first()) {
        $model->save($data);
        return "✅ Admin user created. Email: admin@urms.com | Password: admin123";
    }

    return "ℹ️ Admin user already exists.";
}



}
