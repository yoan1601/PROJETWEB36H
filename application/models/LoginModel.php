<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class LoginModel extends CI_Model {

        public function verifyLogin($nom, $pswd) {

            $customer = array();

            $sql = "select * from utilisateur";

            $query = $this->db->query($sql);

            foreach($query->result_array() as $row) {
                if($row['nom'] == $nom && $row['mdp'] == $pswd){
                    return $row;
                }
            }

            return 0;
        }

        public function insertUtilisateur($nom, $pswd) {

            $sql = "INSERT INTO UTILISATEUR VALUES (null, '%s', '%s', '0')";

            $sql = sprintf($sql, $this->db->escape($nom), $this->db->escape($pswd));
            
            $this->db->query($sql);

        }

    }
?>