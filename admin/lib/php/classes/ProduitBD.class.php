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
    public function getProduitConsole()
    {
        $query = "select * from produit where categorie='console'";
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
    public function getProduitSmartphone()
    {
        $query = "select * from produit where categorie='smartphone'";
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
    public function getProduitPC()
    {
        $query = "select * from produit where categorie='pc'";
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
        $query = "select * from produit order by reference";
        //$_resultset = $this->_db->query($query);
        $_resultset = $this->_db->prepare($query);
        $_resultset ->execute();
        while ($d = $_resultset->fetch()){
            $_data[] = new Produit($d);

        }
        //var_dump($_data);
        return $_data;
        //$_data = $_resultset->fetchAll();

    }
    public function getAllProduit2(){
        $query = "select * from produit where id_prod not in (select id_prod from commande)";
        //$_resultset = $this->_db->query($query);
        $_resultset = $this->_db->prepare($query);
        $_resultset ->execute();
        while ($d = $_resultset->fetch()){
            $_data[] = new Produit($d);

        }
        //var_dump($_data);
        return $_data;
        //$_data = $_resultset->fetchAll();

    }

    public function DeleteProduit ($id_prod){
        try{
            $query="delete from produit where id_prod= :id_prod";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue('id_prod',$id_prod);
            $_resultset->execute();

            /*while ($d=$_resultset->fetch()){
                $_data[] = new Commande($d);
            }
            return $_data;*/

        }catch (PDOException $e){
            print "echec de  la requete ".$e->getMessage();

        }
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
    public function getProduitById($id_prod){
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
    public function getProduitByNom($nom){
        try {
            $this->_db->beginTransaction();
            $query = "select * from produit where nom = :nom";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $nom);
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
    public function getProduitByRef($ref){
        try {
            $this->_db->beginTransaction();
            $query = "select * from produit where reference = :ref";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':ref', $ref);
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
    public function updateProduit($champ,$id,$valeur){
        try{
            //appeler procedure embarquée
            $query ="update produit set ".$champ."='".$valeur."'where id_prod='".$id."'";
            $resultset = $this->_db->prepare($query);//transformer la requete!
            $resultset->execute();
        }catch (PDOException $e){
            print $e->getMessage();
        }
    }
    public function mise_a_jourProduit($id_prod,$nom,$prix,$description,$categorie,$reference){
        try{
            //$query="update produit set nom=:nom,image=:image,prix=:prix,description=:description,";
            $query="update produit set nom=:nom,prix=:prix,description=:description,";
            $query.="categorie=:categorie,reference=:reference where id_prod=:id_prod";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_prod', $id_prod);
            $_resultset->bindValue(':nom', $nom);
            //$_resultset->bindValue(':image', $image);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':categorie', $categorie);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function mise_a_jourProduit2($id_prod,$nom,$prix,$description,$categorie,$image,$reference){
        try{
            //$query="update produit set nom=:nom,image=:image,prix=:prix,description=:description,";
            $query="update produit set nom=:nom,prix=:prix,description=:description,";
            $query.="categorie=:categorie,image=:image,reference=:reference where id_prod=:id_prod";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_prod', $id_prod);
            $_resultset->bindValue(':nom', $nom);
            //$_resultset->bindValue(':image', $image);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':categorie', $categorie);
            $_resultset->bindValue(':image', $image);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function ajout_produit($nom,$categorie,$description,$prix,$image,$reference){
        try{
            $query="insert into produit (nom,categorie,description,prix,image,reference) values ";
            $query.="(:nom,:categorie,:description,:prix,:image,:reference)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nom', $nom);
            $_resultset->bindValue(':categorie', $categorie);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':image', $image);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

}

