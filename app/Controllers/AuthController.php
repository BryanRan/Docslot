<?php

namespace App\Controllers;
use App\Models\Users;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $request;
    protected $session;

    protected $helpers = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->session = service('session');
    }
}

class AuthController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function signup()
    {
        $method = $this->request->getMethod('true');
        if($method === "POST")
        {
            $data = $this->request->getPost();
            $rules = [
                'nom'              => 'required|max_length[100]|min_length[3]',
                'prenom'           => 'required|max_length[100]|min_length[3]',
                'email'            => 'required|valid_email|is_unique[users.email]',
                'phone'            => 'required|regex_match[/^[0-9]{8,15}$/]',
                'date_of_birth'    => 'required|valid_date',
                'gender'           => 'required|in_list[Homme,Femme,Autre]',
                'mot_de_passe'     => 'required|min_length[8]',
                'confirm_password' => 'required|matches[mot_de_passe]',
            ];

            if(!$this->validate($rules))
            {
                session()->setFlashdata('errors',$this->validator->getErrors());
                return redirect()->back()->withInput();
            }

            $data['mot_de_passe'] = password_hash($data['mot_de_passe'],PASSWORD_BCRYPT);

            $userModel = new Users();

            if (!$userModel->save($data))
            {
                session()->setFlashdata('errors', $userModel->errors());
                return redirect()->back()->withInput();
            }
            
            return redirect()->to(base_url('auth/login'));
        }
        return view('auth/signup');
    }

    public function login()
    {
        $method = $this->request->getMethod();
        if($method === "POST")
        {
            $data = $this->request->getPost();

            $rules = [
                'email' => 'required|valid_email',
                'mot_de_passe' => 'required|min_length[8]'
            ];

            if(!$this->validate($rules))
            {
                return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
            }

            $userModel = new Users();
            $user = $userModel->where('email',$data['email'])->first();
            
            if(!$user) {
                return redirect()->back()->withInput()->with('errors', ['email' => 'L\'email saisi n\'existe pas']);
            }

            $passwordCheck = password_verify($data['mot_de_passe'], $user->mot_de_passe);

            if(!$passwordCheck) {
                return redirect()->back()->withInput()->with('errors', ['mot_de_passe' => 'Le mot de passe saisi est incorrect']);
            }
            
            // Récupère l'utilisateur en tant que tableau
            $userData = $userModel->where('email', $data['email'])->asArray()->first();
            
            // Met à jour la session avec le tableau de données utilisateur
            session()->set([
                'user_id' => $userData['id'],
                'isLoggedIn' => true,
                'user' => $userData,
            ]);

            return redirect()->to(base_url('patient/dashboard'));
        }
        return view('auth/login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}
