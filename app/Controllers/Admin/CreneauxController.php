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
        $model = new \App\Models\CreneauxModel();

        $medecinId  = $this->request->getPost('medecin_id');
        $date       = $this->request->getPost('date');
        $heureDebut = $this->request->getPost('heure_debut');
        $heureFin   = $this->request->getPost('heure_fin');

        $aujourdhui = date('Y-m-d');
        $maxDate = date('Y-m-d', strtotime('+30 days'));
        if ($date < $aujourdhui || $date > $maxDate) {
            return redirect()->back()->with('error', '⚠ Date invalide : veuillez choisir une date entre aujourd\'hui et les 30 prochains jours.');
        }

        if (strtotime($heureFin) <= strtotime($heureDebut)) {
            return redirect()->back()->with('error', '⚠ Heure invalide : l’heure de fin doit être après l’heure de début.');
        }

        $existant = $model
            ->where('medecin_id', $medecinId)
            ->where('date', $date)
            ->where('heure_debut <', $heureFin)
            ->where('heure_fin >', $heureDebut)
            ->first();

        if ($existant) {
            return redirect()->back()->with('error', '⚠ Ce créneau est déjà pris ou en conflit avec un autre créneau du médecin.');
        }

        $model->save([
            'medecin_id'  => $medecinId,
            'date'        => $date,
            'heure_debut' => $heureDebut,
            'heure_fin'   => $heureFin,
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
