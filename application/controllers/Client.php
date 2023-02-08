<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function index($idUser)
	{
		$this->listeMyObjets($idUser);
	}
    
    public function getListByInterval ($idutilisateur, $prix, $pourcentage) {

        $min = $prix * ( 1 - $pourcentage/100);
        $max = $prix * ( 1 + $pourcentage/100);

        $allMyObjets = $this->Client->getMyObjetInterval($idutilisateur, $min, $max);

        $data['allMyObjets'] = $allMyObjets;

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $this->load->view('pages/pageClient/gestionObjets', $data);
    }

    public function recherche0 () {
        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $this->load->view('pages/pageClient/recherche', $data);
    }

    public function ajout0 () {
        $allCategorie = $this->Client->getCategorie();

        $allImage = $this->Client->getAllImages();

        $data['allCategorie'] = $allCategorie;

        $data['allImage'] = $allImage;

        $this->load->view('pages/pageClient/ajoutObjet', $data);
    }

    public function ajoutObjet() { 

        $idUser = $this->input->post('idUser');
        $descri = $this->input->post('descri');
        $img = $this->input->post('idImage');
        $prix = $this->input->post('prix');
        $idCategorie = $this->input->post('idCategorie');

        //$image = $this->Client->getImageByName($img);

        $this->Client->ajoutObjet($idUser, $descri, $prix, $img, $idCategorie);

        $this->listeMyObjets($idUser);

    }

    public function listeOtherObjetsByCategory($monId, $idcategory) {

        $OtherObjets = $this->Client->getOthersObjetsByCategory($monId, $idcategory);

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $data['OtherObjets'] = $OtherObjets;

        $this->load->view('pages/pageClient/listeOtherObjets', $data);

    }

    public function listeOtherObjets($monId) {

        $OtherObjets = $this->Client->getOthersObjets($monId);

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $data['OtherObjets'] = $OtherObjets;

        $this->load->view('pages/pageClient/listeOtherObjets', $data);

    }

    public function searchBy() {
                
        $mot = $this->input->get('mot');
        $idCategorie = $this->input->get('idCategorie');

        $result = $this->Client->recherche($mot, $idCategorie);

        $data['OtherObjets'] = $result;
        
        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;
        
        $this->load->view('pages/pageClient/listeOtherObjets', $data);

    }

    public function historique() {

        $historique = $this->Client->historiqueEchange();

        $data['historique'] = $historique;

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;
        
        $this->load->view('pages/pageClient/historique', $data);

    }

    public function interet() {
        $user = $this->session->utilisateur;
        $objetDemandeur = $this->input->post('idObjetDemandeur');
        $data['objetDemandeur'] = $objetDemandeur;

        $allMyObjets = $this->Client->getMyObjets($user['id']);
        $data['allMyObjets'] = $allMyObjets;

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $this->load->view('pages/pageClient/choixMonObjet', $data);
    }

    public function deconnexion() {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function accepte ($idProposition) {

        $this->Client->accepte($idProposition);

        $this->listeProposition();
        
    }

    public function refus ($idProposition) {

        $this->Client->refus($idProposition);

        $this->listeProposition();

    }

    // public function listeOtherObjets($monId) {

    //     $OtherObjets = $this->Client->getOthersObjets($monId);

    //     $data['OtherObjets'] = $OtherObjets;

    //     $this->load->view('pages/pageClient/listeOtherObjets', $data);

    // }

    public function listeProposition() {

        $user = $this->session->utilisateur;

        $allPropositions = $this->Client->getPropositions($user['id']);
        

        $data = array();

        $data['allPropositions'] = $allPropositions;

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $this->load->view('pages/pageClient/listeProposition', $data);

    }

    public function insertProposition() {

        $idObjetDemandeur = $this->input->post('idObjetDemandeur');
        $idMonObjet = $this->input->post('idMonObjet');

        $this->Client->insertProposition($idObjetDemandeur, $idMonObjet);

        $user = $this->session->utilisateur;

        $this->listeMyObjets($user['id']);

    }

    public function fiche($idObjet) {

        $obj = $this->Client->getObjetById($idObjet);

        $data = array();

        $data['objet'] = $obj;

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $this->load->view('pages/pageClient/ficheObjet', $data);

    }

    public function deleteObjet($idObjet) {

        $obj = $this->Client->getObjetById($idObjet);

        $this->Client->deleteObjet($idObjet);

        $this->listeMyObjets($obj['idutilisateur']);

    }

    public function update0($idObjet) { 

        $obj = $this->Client->getObjetById($idObjet);

        $data['objet'] = $obj;

        $allImage = $this->Client->getAllImages();

        $data['allImage'] = $allImage;

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $this->load->view('pages/pageClient/modifierObjet', $data);
    }

    public function updateObjet() { 

        $idObjet = $this->input->post('idObj');
        $descri = $this->input->post('descri');
        $prix = $this->input->post('prix');
        $img = $this->input->post('img');
        $img = $this->Client->getImageByName($img);

        $this->Client->updateObjet($idObjet, $descri, $prix, $img['id']);

        $obj = $this->Client->getObjetById($idObjet);

        $this->listeMyObjets($obj['idutilisateur']);

    }
    
    public function listeMyObjets($idUser) {

        $allMyObjets = $this->Client->getMyObjets($idUser);

        $data['allMyObjets'] = $allMyObjets;

        $allCategorie = $this->Client->getCategorie();

        $data['allCategorie'] = $allCategorie;

        $this->load->view('pages/pageClient/gestionObjets', $data);

    }


}