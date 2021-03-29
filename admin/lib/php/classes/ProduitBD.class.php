<?php

class ProduitBD extends Produit
{
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans l'index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie l'index
        $this->_db = $cnx;
    }

    public function getProduit()
    {
        $query = "select * from produit";
        //$_resultset = $this->_db->query($query);
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Produit($d);

        }
        //var_dump($_data);
        return $_data;
        //$_data = $_resultset->fetchAll();
    }
    public function getAllProduit(){
        $query = "select * from vue_produits order by id";
        //$_resultset = $this->_db->query($query);
        $_resultset = $this->_db->prepare($query);
        $_resultset ->execute();
        while ($d = $_resultset->fetch()){
            $_data[] = new Produit($d);

        }
        var_dump($_data);
        return $_data;
        //$_data = $_resultset->fetchAll();

    }

    public function getProduits ($id_cat){
        try{
            $query="select * from vue_produits where id= :id";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue('id_cat',$id_cat);
            $_resultset->execute();

            while ($d=$_resultset->fetch()){
                $_data[] = new Produit($d);
            }
            return $_data;

        }catch (PDOException $e){
            print "echec de  la requete ".$e->getMessage();

        }
    }
}

