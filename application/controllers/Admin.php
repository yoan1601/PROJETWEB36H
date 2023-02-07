<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->gestionCategorie();
	}	
    
    public function ajoutObjetDansCategorie($idCategorie, $idObj) {

        $this->Admin->ajoutCategorie($idCategorie, $idObj);

        $this->gestionCategorie();

    }

    public function gestionCategorie() {

        $allCategorie = $this->Admin->getCategorie();
        $allObjetSansCategorie = $this->Admin->getObjetSansCategorie();

        $data['allCategorie'] = $allCategorie;
        $data['allObjetSansCategorie'] = $allObjetSansCategorie;

        $this->load->view('pages/admin/gestionCategorie', $data);

    }

}
