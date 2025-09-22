<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use App\Models\Users;

class ProfileController extends BaseController
{
    public function profile()
    {
        // On récupère l'ID de l'utilisateur depuis la session.
        $userId = session()->get('user_id'); 
        
        // Si l'ID n'existe pas, l'utilisateur n'est pas connecté.
        if (!$userId) {
            return redirect()->to(base_url('auth/login'));
        }
        
        // On utilise l'ID pour récupérer toutes les données de l'utilisateur depuis la base de données.
        $userModel = new Users();
        $user = $userModel->find($userId);

        // Assurez-vous d'avoir une méthode pour récupérer les informations du contact d'urgence.
        // Pour l'instant, on utilise des données statiques pour l'exemple.
        $emergencyContact = [
            'nom_du_contact' => 'Marie Dupont',
            'telephone_du_contact' => '+33 6 12 34 56 78'
        ];
        
        return view('patient/profile', [
            'title' => 'Mon profil',
            'user'  => $user,
            'emergencyContact' => $emergencyContact,
            'activePage' => 'profile'
        ]);
    }
    
    public function settings()
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to(base_url('auth/login'));
        }

        $userModel = new Users();
        $user = $userModel->find($userId);

        return view('patient/settings', [
            'title' => 'Paramètres du compte',
            'user'  => $user,
            'activePage' => 'settings'
        ]);
    }
    
    public function changePassword()
    {
        // On vérifie que la requête est de type POST
        if ($this->request->getMethod() !== 'post') {
            return redirect()->back();
        }

        $session = session();
        $userId = $session->get('user_id');
        $userModel = new Users();
        
        // Sécurité : Vérifiez que l'utilisateur est bien connecté avant de continuer.
        if (!$userId) {
            return redirect()->to(base_url('auth/login'));
        }

        // Validation des données du formulaire
        $rules = [
            'new_password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $newPassword = $this->request->getPost('new_password');

        // Hachage du mot de passe avant de le sauvegarder
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Mise à jour du mot de passe dans la base de données
        $userModel->update($userId, ['mot_de_passe' => $hashedPassword]);

        // Redirection avec un message de succès
        return redirect()->to(base_url('patient/settings'))->with('success', 'Votre mot de passe a été mis à jour avec succès.');
    }

    public function deleteAccount()
    {
        $session = session();
        $userId = $session->get('user_id');
        
        // Sécurité : Vérifiez que l'utilisateur est bien connecté avant de continuer.
        if (!$userId) {
            return redirect()->to(base_url('auth/login'));
        }

        $userModel = new Users();

        // Vérifier que l'utilisateur existe
        $user = $userModel->find($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur introuvable.');
        }

        // Supprimer l'utilisateur physiquement (pas de soft delete)
        $userModel->delete($userId, true); // true = suppression physique

        // Détruire la session pour déconnecter l'utilisateur
        $session->destroy();

        // Redirection vers la page de connexion
        return redirect()->to(base_url('auth/login'))->with('message', 'Votre compte a été supprimé.');
    }
}
