<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('pages/login');
	}

    public function insertNewUser($nom,$mdp) {

        $this->Login->insertUtilisateur($nom,$mdp);

        $this->checkLogin($nom, $mdp);

    }
    
    public function checkLogin($nom, $mdp) {

        $rep = $this->Login->verifyLogin($nom, $mdp);

        if($rep == 0) { // erreur
            redirect('pages/login');
        }

        // sinon
        $isAdmin = $rep['isadmin'];

        $this->session->set_userdata('utilisateur', $rep);

        if($isAdmin == '0') { //simple user
            $this->load->view('pages/client/acceuil');
        }

        else { // admin
            $this->load->view('pages/admin/acceuil');
        }
    }
}
