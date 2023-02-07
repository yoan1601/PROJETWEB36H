<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function index($idUser)
	{
		$this->listeMyObjets($idUser);
	}

    public function accepte ($idProposition) {

        $this->Client->accepte($idProposition);

        $this->listeProposition();
        
    }

    public function refus ($idProposition) {

        $this->Client->refus($idProposition);

        $this->listeProposition();

    }

    public function listeOtherObjets($idOtherUser) {

        $OtherObjets = $this->Client->getMyObjets($idOtherUser);

        $data['OtherObjets'] = $OtherObjets;

        $this->load->view('pages/client/listeOtherObjets', $data);

    }

    public function listeProposition() {

        $user = $this->session->utilisateur;

        $allPropositions = $this->Client->getPropositions($user['id']);

        $data = array();

        $data['allPropositions'] = $allPropositions;

        $this->load->view('pages/client/listeProposition', $data);

    }

    public function insertProposition($idObjetDemandeur, $idMonObjet) {

        $this->Client->insertProposition($idObjetDemandeur, $idMonObjet);

        $user = $this->session->utilisateur;

        $this->listeMyObjets($user['id']);

    }

    public function fiche($idObjet) {

        $obj = $this->Client->getObjetById($idObjet);

        $data = array();

        $data['objet'] = $obj;

        $this->load->view('pages/client/fiche', $data);

    }

    public function deleteObjet($idObjet) {

        $obj = $this->Client->getObjetById($idObjet);

        $this->Client->deleteObjet($idObjet);

        $this->listeMyObjets($obj['idutilisateur']);

    }

    public function updateObjet($idObjet, $descri, $prix, $idimage) { 

        $this->Client->updateObjet($idObjet, $descri, $prix, $idimage);

        $obj = $this->Client->getObjetById($idObjet);

        $this->listeMyObjets($obj['idutilisateur']);

    }
    
    public function ajoutObjet($idUser, $descri, $prix, $idImage) { 

        $this->Client->ajoutObjet($idUser, $descri, $prix, $idImage);

        $this->listeMyObjets($idUser);

    }
    
    public function listeMyObjets($idUser) {

        $allMyObjets = $this->Client->getMyObjets($idUser);

        $data['allMyObjets'] = $allMyObjets;

        $this->load->view('pages/client/listeMyObjets', $data);

    }


}