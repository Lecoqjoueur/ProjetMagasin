<?php

class CommandeBD extends Commande
{
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans l'index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie l'index
        $this->_db = $cnx;
    }

    public function getCommande()
    {
        $query = "select * from vue_commande";
        //$_resultset = $this->_db->query($query);
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Commande($d);

        }
        //var_dump($_data);
        return $_data;
        //$_data = $_resultset->fetchAll();
    }

    public function getCommandebyIDProd($id_prod)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from produit where id_prod = :id_prod";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_prod', $id_prod);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;
            //renvoyer un objet nécéssite adaptation dans ajax pour retour json
            // donc retourner objet simple, qui sera stocké dans un élément de tableau json

            $this->_db->commit();

        } catch(PDOException $e){
            print "Echec de la requête : ".$e->getMessage();
            $_db->rollback();
        }
    }

    public function DeleteCommande ($id_com){
        try{
            $query="delete from commande where id_com= :id_com";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue('id_com',$id_com);
            $_resultset->execute();

            /*while ($d=$_resultset->fetch()){
                $_data[] = new Commande($d);
            }
            return $_data;*/

        }catch (PDOException $e){
            print "echec de  la requete ".$e->getMessage();

        }
    }
    public function ajout_commande($id_prod,$quantite){
        try{
            $query="insert into commande (id_prod,quantite) values ";
            $query.="(:id_prod,:quantite)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_prod', $id_prod);
            $_resultset->bindValue(':quantite', $quantite);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

}

