<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class AdminModel extends CI_Model {

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