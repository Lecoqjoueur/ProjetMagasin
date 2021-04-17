<?php

class ClientBD extends Client
{
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans l'index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie l'index
        $this->_db = $cnx;
    }

    public function getClient($username, $mdp){
        try {
            $query = "select is_client(:username,:mdp) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':username', $username);
            $_resultset->bindValue(':mdp', $mdp);
            $_resultset->execute();
            $retour= $_resultset->fetchColumn(0);
            return $retour;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }
    }
    public function getClient2($username, $mdp){
        try {
            $query = "select * from client where username =:username and mdp =:mdp";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':username', $username);
            $_resultset->bindValue(':mdp', $mdp);
            $_resultset->execute();
            $_data[0] =$_resultset->fetch();
            //var_dump($_data[0]);
            return $_data;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }
    }
}

