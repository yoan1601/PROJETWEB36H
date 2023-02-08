<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class ClientModel extends CI_Model {

        public function getMyObjetInterval($idutilisateur, $min, $max){

            $object = array();

            $sql = "SELECT * FROM objet where idutilisateur = %d and id not in (select idobjet from suppression)
                        and prix >= %d and prix <= %d";

            $sql = sprintf($sql, $idutilisateur, $min, $max);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $obj['id'] = $row['id'];
                $obj['idutilisateur'] = $row['idutilisateur'];
                $obj['descri'] = $row['descri'];
                $obj['prix'] = $row['prix'];
                $img = $this->getImageById($row['idimage']);
                $obj['image'] = $img['descri'];
                $object [] = $obj;
            }

            return $object;
        }

        public function isInObjet($idObj, $lObj) {
            foreach($lObj as $obj) {
                if($idObj == $obj['id']) {
                    return 1;
                }
            }
            return 0;
        }

        public function ajoutObjet($idutilisateur, $descri, $prix, $idimage, $idcategorie){
            $sql = "INSERT INTO objet VALUES (null, %d, %s, %d, %s)";

            $sql = sprintf($sql, $idutilisateur, $this->db->escape($descri), $prix, $this->db->escape($idimage));
            
            $this->db->query($sql);

            $allObjet = $this->getAllObjets();

            $thisObj = $allObjet[count($allObjet) - 1];

            $sql = "INSERT into categorieobjet values (null, %d, %d)";

            $sql = sprintf($sql, $idcategorie, $thisObj['id']);

            $this->db->query($sql);
        }

        public function getAllObjets () {

            $object = array();
    
            $sql = "SELECT * FROM objet order by id" ;
    
            $query = $this->db->query($sql);
    
            foreach($query->result_array() as $row) {
                $object [] = $row;
            }
    
            return $object;
    
        }

        public function getAllImages () {

            $object = array();
    
            $sql = "SELECT * FROM image" ;
    
            $query = $this->db->query($sql);
    
            foreach($query->result_array() as $row) {
                $object [] = $row;
            }
    
            return $object;
    
        }

        public function getOthersObjetsByCategory($idutilisateur, $idcategorie){

            $object = array();

            $sql = "SELECT * FROM objet 
                    join categorieobjet on categorieobjet.idobjet = objet.id 
                    where idutilisateur != %d and objet.id not in (select idobjet from suppression) and idcategorie = %d";

            $sql = sprintf($sql, $idutilisateur, $idcategorie);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $obj['id'] = $row['id'];
                $obj['idutilisateur'] = $row['idutilisateur'];
                $obj['descri'] = $row['descri'];
                $obj['prix'] = $row['prix'];
                $img = $this->getImageById($row['idimage']);
                $obj['image'] = $img['descri'];
                $object [] = $obj;
            }

            return $object;
        }

        public function getCategorie () {

            $category = array();

            $sql = "SELECT * FROM categorie";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $category [] = $row;
            }

            return $category;

        }

        
        public function recherche ($mot, $idcategorie) {

            $object = array();

            $sql = "SELECT objet.* FROM objet 
                    join categorieobjet on categorieobjet.idobjet=objet.id 
                    where categorieobjet.idcategorie=%d and objet.descri like '%s%s%s'" ;

            $sql= sprintf($sql, $idcategorie, '%', $mot, '%');

            //echo $sql;

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $obj['id'] = $row['id'];
                $obj['idutilisateur'] = $row['idutilisateur'];
                $obj['descri'] = $row['descri'];
                $obj['prix'] = $row['prix'];
                $img = $this->getImageById($row['idimage']);
                $obj['image'] = $img['descri'];
                $object [] = $obj;
            }

            return $object;
        }

        public function historiqueEchange() {

            $object = array();

            $sql = "SELECT nom, descri, accepte.dateheure FROM accepte
                    join proposition on proposition.id=accepte.idproposition
                    join objet on objet.id=proposition.idobjetdemandeur
                    or objet.id=proposition.idmonobjet
                    join utilisateur on objet.idutilisateur=utilisateur.id";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $object [] = $row;
            }

            return $object;
        }

        public function getPropositions($idutilisateur) {

            $proposition = array();

            // $sql = "SELECT obj.idutilisateur envoyeur, p.* 
            // FROM proposition p
            // JOIN objet o ON o.id = p.idobjetdemandeur
            // JOIN objet obj ON obj.id = p.idmonobjet
            // JOIN utilisateur u ON u.id IN (
            //     select ob.idutilisateur 
            //     from objet ob 
            //     JOIN proposition p ON ob.id = p.idobjetdemandeur
            // ) 
            // where u.id = %d and p.id NOT IN (select idproposition from refus) and p.id NOT IN (select idproposition from accepte)";

            $sql = "SELECT obj.idutilisateur envoyeur, p.* 
            FROM proposition p
            JOIN objet obj ON obj.id = p.idmonobjet
            JOIN objet obj2 ON obj2.id = p.idobjetdemandeur
            JOIN utilisateur u ON u.id = obj.idutilisateur 
            JOIN utilisateur u2 ON u2.id = obj2.idutilisateur 
            where u.id != %d and u2.id = %d and p.id NOT IN (select idproposition from refus) and p.id NOT IN (select idproposition from accepte)";

            $sql = sprintf($sql, $idutilisateur,$idutilisateur);

            // echo $sql;

            $query = $this->db->query($sql);

            $ligne = array();

            foreach($query->result_array() as $row) {
                
                $user = $this->getUtilisateurById($row['envoyeur']);
                $objetDemandeur = $this->getObjetById($row['idobjetdemandeur']);
                $monobjet = $this->getObjetById($row['idmonobjet']);
                $dateHeure = $row['dateheure'];

                $ligne['id'] = $row['id'];
                $ligne['utilisateur'] = $user;
                $ligne['objetDemandeur'] = $objetDemandeur;
                $ligne['monobjet'] = $monobjet;
                $ligne['dateHeure'] = $dateHeure;

                $proposition [] = $ligne;
            }

            return $proposition;
        }

        public function accepte ($idProposition) {
            $sql = "INSERT into accepte values (null, %d ,current_timestamp)";

            $sql = sprintf($sql, $idProposition);

            $this->db->query($sql);

            $proposition = $this->getPropositionById($idProposition);

            //echange
            $this->updateUtilisateurObjet($proposition['objetDemandeur']['idutilisateur'], $proposition['monobjet']['id']);
            $this->updateUtilisateurObjet($proposition['monobjet']['idutilisateur'], $proposition['objetDemandeur']['id']);
        }

        public function refus ($idProposition) {
            $sql = "INSERT into refus values (null, %d ,current_timestamp)";

            $sql = sprintf($sql, $idProposition);
            
            $this->db->query($sql);
        }

        public function getPropositionById($id) {

            $sql = "SELECT * from proposition where id = %d";

            $sql = sprintf($sql, $id);
            
            $query = $this->db->query($sql);

            $row = $query->row_array();

            $rep = array();

            $rep['id'] = $row['id'];

            $idObjetDemandeur = $row['idobjetdemandeur'];
            $objetDemandeur = $this->getObjetById($idObjetDemandeur);
            $idMonObjet = $row['idmonobjet'];
            $monobjet = $this->getObjetById($idMonObjet);

            $rep['objetDemandeur'] = $objetDemandeur;
            $rep['monobjet'] = $monobjet;

            $rep['dateheure'] = $row['dateheure'];

            return $rep;
        }

        public function getUtilisateurById($id) {

            $sql = "SELECT * from utilisateur where id = %d";

            $sql = sprintf($sql, $id);
            
            $query = $this->db->query($sql);

            $row = $query->row_array();

            return $row;
        }

        public function updateUtilisateurObjet($idutilisateur, $idObjet) {

            $sql = "UPDATE objet set idutilisateur = %d where id = %d";

            $sql = sprintf($sql, $idutilisateur, $idObjet);
            
            $this->db->query($sql);

        }

        public function updateObjet($idObjet, $descri, $prix, $idimage) {

            $sql = "UPDATE objet set descri = %s, prix = %d, idimage = %d where id = %d";

            $sql = sprintf($sql, $this->db->escape($descri), $prix, $idimage, $idObjet);
            
            $this->db->query($sql);

        }

        public function deleteObjet($idObjet) {

            $sql = "INSERT into suppression values (null,%d)";

            $sql = sprintf($sql, $idObjet);
            
            $this->db->query($sql);

        }

        public function insertProposition($idObjetDemandeur, $idMonObjet) {
            $sql = "INSERT into proposition values (null, %d, %d, current_timestamp)";

            $sql = sprintf($sql, $idObjetDemandeur, $idMonObjet);
            
            $this->db->query($sql);
        }

        public function getMyObjets($idutilisateur){

            $object = array();

            $sql = "SELECT * FROM objet where idutilisateur = %d and id not in (select idobjet from suppression)";

            $sql = sprintf($sql, $idutilisateur);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $obj['id'] = $row['id'];
                $obj['idutilisateur'] = $row['idutilisateur'];
                $obj['descri'] = $row['descri'];
                $obj['prix'] = $row['prix'];
                $img = $this->getImageById($row['idimage']);
                $obj['image'] = $img['descri'];
                $object [] = $obj;
            }

            return $object;
        }

        public function getObjetById($idObjet){

            $sql = "SELECT * FROM objet where id = %d ";

            $sql = sprintf($sql, $idObjet);

            $query = $this->db->query($sql);

            $row = $query->row_array();

            $obj['id'] = $row['id'];
            $obj['idutilisateur'] = $row['idutilisateur'];
            $obj['descri'] = $row['descri'];
            $obj['prix'] = $row['prix'];
            $img = $this->getImageById($row['idimage']);
            $obj['image'] = $img['descri'];

            return $obj;
        }

        public function getOthersObjets($idutilisateur){

            $object = array();

            $sql = "SELECT * FROM objet where idutilisateur != %d and id not in (select idobjet from suppression)";

            $sql = sprintf($sql, $idutilisateur);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $obj['id'] = $row['id'];
                $obj['idutilisateur'] = $row['idutilisateur'];
                $obj['descri'] = $row['descri'];
                $obj['prix'] = $row['prix'];
                $img = $this->getImageById($row['idimage']);
                $obj['image'] = $img['descri'];
                $object [] = $obj;
            }

            return $object;
        }

        public function getImageByName($img) {

            $sql = "SELECT * FROM image where descri like '%s%s%s' ";

            $sql = sprintf($sql, '%',$img, '%');
            
            //echo $sql;

            $query = $this->db->query($sql);

            $object = array();

            foreach($query->result_array() as $row) {
                $object [] = $row;
            }

            return $object[0];
        }

        public function getImageById($idImg){

            $sql = "SELECT * FROM image where id = %d ";

            $sql = sprintf($sql, $idImg);

            $query = $this->db->query($sql);

            $row = $query->row_array();

            return $row;
        }

    }

?>