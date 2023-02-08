<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->gestionCategorie();
	}

    public function supprimerCategorie($id) {
        $this->Admin->deleteCategorie($id);
        $this->gestionCategorie();
    }

    public function creerCategorie() {
        $descri = $this->input->post('descri');
        $this->Admin->creerCategorie($descri);
        $this->gestionCategorie();
    }

    public function creer0 () {
        $this->load->view('pages/pageAdmin/creerCategorie');
    }

    public function update0($id) { 

        $categorie = $this->Admin->getCategorieById($id);

        $data['categorie'] = $categorie;

        $this->load->view('pages/pageAdmin/modifierCategorie', $data);
    }

    public function modifierCategorie() {
        $descri = $this->input->post('descri');
        $idCategorie = $this->input->post('idCategorie');
        $this->Admin->updateCategorie ($idCategorie, $descri);
        $this->gestionCategorie();
    }
    
    public function deconnexion() {
        $this->session->sess_destroy();
        redirect('login');
    }
    
    public function ajoutObjetDansCategorie() {

        $idCategorie = $this->input->get('idCategorie');
        $idObj = $this->input->get('idObjet');

        $this->Admin->ajoutCategorie($idCategorie, $idObj);

        $this->gestionCategorie();

    }

    public function gestionCategorie() {

        $allCategorie = $this->Admin->getCategorie();
        $allObjetSansCategorie = $this->Admin->getObjetSansCategorie();

        $data['allCategorie'] = $allCategorie;
        $data['allObjetSansCategorie'] = $allObjetSansCategorie;

        $this->load->view('pages/pageAdmin/gestionCategorie', $data);

    }

}
