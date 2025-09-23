<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CreneauxModel;
use App\Models\MedecinsModel;

class CreneauxController extends BaseController
{
    public function index()
    {
        $model = new CreneauxModel();
        $data['creneaux'] = $model
            ->select('creneaux.*, medecins.nom as medecin_nom')
            ->join('medecins', 'medecins.id = creneaux.medecin_id')
            ->findAll();

        return view('admin/creneaux/index', $data);
    }

    public function create()
    {
        $medecinModel = new MedecinsModel();
        $data['medecins'] = $medecinModel->findAll();

        return view('admin/creneaux/create', $data);
    }

    public function store()
    {
        $model = new CreneauxModel();

        $model->save([
            'medecin_id'  => $this->request->getPost('medecin_id'),
            'date'        => $this->request->getPost('date'),
            'heure_debut' => $this->request->getPost('heure_debut'),
            'heure_fin'   => $this->request->getPost('heure_fin'),
            'statut'      => 'disponible',
        ]);

        return redirect()->to(base_url('admin/creneaux/index'))
            ->with('success', 'Créneau ajouté avec succès.');
    }

    public function edit($id)
    {
        $model = new CreneauxModel();
        $medecinModel = new MedecinsModel();

        $data['creneau']  = $model->find($id);
        $data['medecins'] = $medecinModel->findAll();

        return view('admin/creneaux/edit', $data);
    }

    public function update($id)
    {
        $model = new CreneauxModel();

        $model->update($id, [
            'medecin_id'  => $this->request->getPost('medecin_id'),
            'date'        => $this->request->getPost('date'),
            'heure_debut' => $this->request->getPost('heure_debut'),
            'heure_fin'   => $this->request->getPost('heure_fin'),
            'statut'      => $this->request->getPost('statut'),
        ]);

        return redirect()->to(base_url('admin/creneaux/index'))
            ->with('success', 'Créneau modifié avec succès.');
    }

    public function delete($id)
    {
        $model = new CreneauxModel();
        $model->delete($id);

        return redirect()->to(base_url('admin/creneaux/index'))
            ->with('success', 'Créneau supprimé.');
    }
}
