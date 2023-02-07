<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class ClientModel extends CI_Model {

        public function getPropositions($idutilisateur) {

            $proposition = array();

            $sql = "SELECT obj.idutilisateur envoyeur, p.* 
            FROM proposition p
            JOIN objet o ON o.id = p.idobjetdemandeur
            JOIN objet obj ON obj.id = p.idmonobjet
            JOIN utilisateur u ON u.id = (
                select o.idutilisateur 
                from objet o 
                JOIN proposition p ON o.id = p.idobjetdemandeur
            ) 
            where u.id = %d and p.id NOT IN (select idproposition from refus) and p.id NOT IN (select idproposition from accepte)";

            $sql = sprintf($sql, $idutilisateur);

            $query = $this->db->query($sql);

            $ligne = array();

            foreach($query->result_array() as $row) {
                
                $user = $this->getUtilisateurById($row['envoyeur']);
                $objetDemandeur = $this->getObjetById($row['idobjetdemandeur']);
                $monobjet = $this->getObjetById($row['idmonobjet']);
                $dateHeure = $row['dateheure'];

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
        }

        public function refus ($idProposition) {
            $sql = "INSERT into refus values (null, %d ,current_timestamp)";

            $sql = sprintf($sql, $idProposition);
            
            $this->db->query($sql);
        }

        public function getUtilisateurById($id) {

            $sql = "SELECT * from utilisateur where id = %d";

            $sql = sprintf($sql, $id);
            
            $query = $this->db->query($sql);

            $row = $query->row_array();

            return $row;
        }

        public function updateObjet($idObjet, $descri, $prix, $idimage) {

            $sql = "UPDATE objet set descri = '%s', prix = %d, idimage = %d where id = %d";

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
                $object [] = $row;
            }

            return $object;
        }

        public function ajoutObjet($idutilisateur, $descri, $prix, $idimage){
            $sql = "INSERT INTO objet VALUES (null, %d, '%s', %d, '%s')";

            $sql = sprintf($sql, $idutilisateur, $this->db->escape($descri), $prix, $this->db->escape($idimage));
            
            $this->db->query($sql);
        }

        public function getObjetById($idObjet){

            $sql = "SELECT * FROM objet where id = %d ";

            $sql = sprintf($sql, $idObjet);

            $query = $this->db->query($sql);

            $row = $query->row_array();

            return $row;
        }

        public function getOthersObjets($idutilisateur){

            $object = array();

            $sql = "SELECT * FROM objet where idutilisateur != %d and id not in (select idobjet from suppression)";

            $sql = sprintf($sql, $idutilisateur);

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $object [] = $row;
            }

            return $object;
        }

    }

?>