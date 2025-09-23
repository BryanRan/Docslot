<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MedecinsModel;

class MedecinsController extends BaseController
{
    protected $medecinModel;

    public function __construct()
    {
        $this->medecinModel = new MedecinsModel();
    }

    // 📋 Liste des médecins
    public function index()
    {
        $data['medecins'] = $this->medecinModel->findAll();
        return view('admin/medecins/index', $data);
    }

    // ➕ Formulaire d'ajout
    public function create()
    {
        return view('admin/medecins/create');
    }

    // 💾 Enregistrement d'un nouveau médecin
    public function store()
    {
        $this->medecinModel->save([
            'nom'        => $this->request->getPost('nom'),
            'prenom'     => $this->request->getPost('prenom'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'specialite' => $this->request->getPost('specialite'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to(base_url('admin/medecins/index'))->with('success', 'Médecin ajouté avec succès.');
    }

    // ✏️ Formulaire d'édition
    public function edit($id)
    {
        $data['medecin'] = $this->medecinModel->find($id);
        return view('admin/medecins/edit', $data);
    }

    // 🔄 Mise à jour
    public function update($id)
    {
        $this->medecinModel->update($id, [
            'nom'        => $this->request->getPost('nom'),
            'prenom'     => $this->request->getPost('prenom'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'specialite' => $this->request->getPost('specialite'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to(base_url('admin/medecins/index'))->with('success', 'Médecin modifié avec succès.');
    }

    // ❌ Suppression
    public function delete($id)
    {
        $this->medecinModel->delete($id);
        return redirect()->to(base_url('admin/medecins/index'))->with('success', 'Médecin supprimé avec succès.');
    }
}
