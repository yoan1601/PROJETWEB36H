<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class AdminModel extends CI_Model {

        public function getUtilisateurInscrit () {

            $object = array();

            $sql = "SELECT * FROM Utilisateur where isadmin='0'";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $object [] = $row;
            }

            return $object;

        }

        public function getEchange () {

            $object = array();

            $sql = "SELECT accepte.id as id, u.nom as nom1, o.descri as ob1, ut.nom as nom2, ob.descri as ob2 from accepte
                    join proposition p on p.id = accepte.idproposition
                    join objet o on o.id = p.idobjetdemandeur
                    join utilisateur u on u.id = o.idutilisateur
                    join objet ob on ob.id = p.idmonobjet
                    join utilisateur ut on ut.id = ob.idutilisateur" ;

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $object [] = $row;
            }

            return $object;

        }

        public function getAllObjets(){

            $object = array();

            $sql = "SELECT * FROM objet where id not in (select idobjet from suppression)";

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

        public function getAllObjetByCategory($idcategorie){

            $object = array();

            $sql = "SELECT * FROM objet 
                    join categorieobjet on categorieobjet.idobjet = objet.id 
                    where objet.id not in (select idobjet from suppression) and idcategorie = %d";

            $sql = sprintf($sql, $idcategorie);

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

        public function creerCategorie ($descri) {
            $sql = "insert into categorie values (null, %s)";

            $sql = sprintf($sql, $this->db->escape($descri));
            
            $this->db->query($sql);
        }

        public function getCategorieById($id) {

            $sql = "SELECT * from categorie where id = %d";

            $sql = sprintf($sql, $id);
            
            $query = $this->db->query($sql);

            $row = $query->row_array();

            return $row;
        }

        public function deleteCategorie ($idCategorie) {
            
            $sql = "DELETE FROM categorie where id = %d";

            $sql = sprintf($sql, $idCategorie);
            
            $this->db->query($sql);
        }

        public function updateCategorie ($idCategorie, $descri) {

            $sql = "UPDATE categorie set descri = %s where id = %d";

            $sql = sprintf($sql, $this->db->escape($descri), $idCategorie);
            
            $this->db->query($sql);
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
        
        public function ajoutCategorie($categ, $objet) {

            $sql = "INSERT INTO categorieobjet VALUES (null, %d, %d)";

            $sql = sprintf($sql, $categ, $objet);

            //echo($sql);
            
            $this->db->query($sql);

        }

        public function getObjetSansCategorie () {

            $object = array();

            $sql = "SELECT * FROM objet where id not in (select idobjet from categorieobjet)";

            $query = $this->db->query($sql);

            $obj = array();

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

        
        public function getImageById($idImg){

            $sql = "SELECT * FROM image where id = %d ";

            $sql = sprintf($sql, $idImg);

            $query = $this->db->query($sql);

            $row = $query->row_array();

            return $row;
        }
    }

?>