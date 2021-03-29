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

    public function getClient()
    {
        $query = "select * from client";
        //$_resultset = $this->_db->query($query);
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Client($d);

        }
        //var_dump($_data);
        return $_data;
        //$_data = $_resultset->fetchAll();
    }
}

