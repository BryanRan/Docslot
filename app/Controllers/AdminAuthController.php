<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admins;

class AdminAuthController extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $model = new Admins();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admin = $model->where('email', $email)->first();

        if ($admin && password_verify($password, $admin['mot_de_passe'])) {
            $session->set([
                'admin_id'    => $admin['id'],
                'admin_email' => $admin['email'],
                'is_admin'    => true,
            ]);
            return redirect()->to(base_url('admin/dashboard'));
        }

        return redirect()->back()->with('error', 'Identifiants incorrects.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'));
    }
}