<?php

class ThemeBD extends Theme{
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans l'index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx){ //$cnx envoyé depuis la page qui instancie l'index
        $this->_db= $cnx;
    }

    public function getTheme(){
        $query = "select * from bp_theme";
        $_resultset = $this->_db->query($query);
        $_data = $_resultset->fetchAll();
        var_dump($_data);
    }



}