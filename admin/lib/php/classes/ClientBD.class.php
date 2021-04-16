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
            $_resultset->bindValue(':mdp', $mdp);//car password crypté en md5
            $_resultset->execute();
            $retour= $_resultset->fetchColumn(0);
            return $retour;
        }catch(PDOException $e){
            print "Echec ".$e->getMessage();
        }
    }
}

