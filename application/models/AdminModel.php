<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class AdminModel extends CI_Model {

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
            
            $this->db->query($sql);

        }

        public function getObjetSansCategorie () {

            $object = array();

            $sql = "SELECT * FROM objet where id not in (select idobjet from categorieobjet)";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                $object [] = $row;
            }

            return $object;

        }

    }

?>