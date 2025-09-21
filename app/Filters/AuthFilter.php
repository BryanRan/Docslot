<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // On vérifie si l'utilisateur est connecté en regardant la variable de session 'isLoggedIn'.
        if (!session()->get('isLoggedIn')) {
            // Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion.
            // Le message flashdata sera affiché sur la page de connexion pour expliquer la redirection.
            return redirect()->to(base_url('auth/login'))->with('error', 'Erreur : veuillez vous connecter pour accéder à cette page.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Ne fait rien dans ce cas.
    }
}
