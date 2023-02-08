<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('pages/login');
	}

    public function deconnexion() {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function inscription() {
        $this->load->view('pages/inscription');
    }

    public function insertNewUser($nom,$mdp) {

        $this->Login->insertUtilisateur($nom,$mdp);

        $this->checkLogin($nom, $mdp);

    }
    
    public function checkLogin() {

        $nom = $this->input->post('nom');
        $mdp = $this->input->post('mdp');

        $rep = $this->Login->verifyLogin($nom, $mdp);

        if($rep == 0) { // erreur
            redirect('pages/login');
        }

        // sinon
        $isAdmin = $rep['isadmin'];

        $this->session->set_userdata('utilisateur', $rep);

        if($isAdmin == '0') { //simple user
            redirect('client/listeMyObjets/'.$rep['id']);
            //$this->load->view('pages/client/acceuil');
        }

        else { // admin
        
            redirect('admin/gestionCategorie');
            // $this->load->view('pages/admin/gestionCategorie');
        }

    }
}
