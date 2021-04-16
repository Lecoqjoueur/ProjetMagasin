<?php
include ('./lib/php/verifier_connexion.php');
if(isset($_GET['ajouter']))
{
    if($_GET['Nom']=="" OR $_GET['Cat']=="" OR $_GET['prix']=="" OR $_GET['descr']=="" OR $_GET['N°Produit']<0){
        $erreur="Erreur dans l'encodage !!!!";
    }
    else{
            $query="insert into produit(id_prod,nom,categorie,description,prix,image);
       values(".$_GET['N°Produit'].",'".$_GET['Nom']."','".$_GET['Cat']."','".$_GET['descr']."','".$_GET['prix']."','".$_GET['image']."')";

    }
}
if(isset($_SESSION['admin'])){
    print "<br/>Bienvenue dans la gestion des produits";
    ?>
    </br>
<h1>Ajouter un produit</h1>
<p>1** = Ordinateur</p>
<p>2** = Smartphone</p>
<p>3** = Console</p>
<?php if(isset($erreur)) print "<span class=\"rouge\">".$erreur."</span>"; ?>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" >
<table>
<tr>
  <td><label for="N°Produit">Numéro du Produit :</label></td>
  <td><input type="number" id="N°Produit"  name="N°Produit" />
  </td>
</tr>
<tr>
  <td><label for="Nom">Nom Produit :</label></td>
  <td><input type="text"id="Nom"  name="Nom" />
  </td>
</tr>
<tr>
 <!-- <td><label for="Cat">Catégorie :</label></td>
  <td><input type="text" id="Cat" name="Cat" />
  </td>-->
  <td>Catégorie : </td>
  <td>
  <select name="Cat">
	<option value="pc">Ordinateur</option>
	<option value="smartphone">Smartphone</option>
	<option value="console">Console</option>
  </select>
  </td>
</tr>
<tr>
  <td><label for="prix">Prix :</label></td>
  <td><input type="number"id="prix"  name="prix" />
  </td>
</tr>
<tr>
<td>Déscription</td>
<td><textarea rows="10" cols="45" name="descr" id="descr"></textarea></td>
</tr>
<tr>
        <td>Description</td>
    <td><input type="file" name="photo" id="photo"></td>
</tr>
<tr>
<td><input type="submit" name="ajouter" value="ajouter"/></td>
<td><input type="reset" name="annuler" value="Annuler"/></td>
</tr>
</table>
</form>

<?php
}
?>

