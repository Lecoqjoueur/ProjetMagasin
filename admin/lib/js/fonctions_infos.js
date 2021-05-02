$(document).ready(function (){

    $('#submit_ids').click(function(){
        //alert("suppression");
        var ref = $(id_com).val();
        //alert(ref);
        if(ref != '') {
            var parametre = "ref=" + ref;
            //alert(parametre);
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/ajaxDeleteCommande.php',
                success: function(data) {
                    console.log(data);
                }
            });
        }
    });
    $('#reference').blur(function(){
        var ref = $(this).val();
        if(ref != ''){
            var parametre="ref="+ref;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/ajaxRechercheProduit.php',
                success: function(data){
                    console.log(data);
                    $('#nom').val(data[0].nom);
                    if($('#nom').val()!='') {
                        $('#inserer').hide();
                        $('#editer').show();
                    }
                    else{
                        $('#editer').hide();
                        $('#inserer').show();
                    }
                    $('#categorie').val(data[0].categorie);
                    $('#description').val(data[0].description);
                    $('#prix').val(data[0].prix);
                    $('#id_prod').val(data[0].id_prod);

                }
            });
            $('#reference').click(function (){
                $('#reference').val('');
                $('#nom').val('');
            })
        }
    });

    $('span[id]').click(function (){
        //text() : recuperer le contenu quand ce n'est pas un champ de formulaire
        //val() :contenu d'un champ de formulaire
        //recuperation du contenu d'origine
        var valeur1 =$.trim($(this).text());
        //récuperation des attributs name et id de la zone cliquée
        var ident = $(this).attr("id");//valeur de l'id
        var name = $(this).attr("name");//champ a modifier

        //alert("ident = "+ident+" et name = "+name);

        $(this).blur(function (){
            var valeur2 =$.trim($(this).text());
            //alert("valeur 1 : "+valeur1+" valeur 2 : "+valeur2);
            if(valeur1 !=valeur2){
                //ecriture des parametres de l'URL
                var parametre ='champ='+name+'&id='+ident+'&nouveau='+valeur2;
                //alert(parametre);
                $.ajax({
                    type:  'GET',
                    data: parametre,
                    datatype: 'text',
                    url: './lib/php/ajax/ajaxUpdateProduit.php',
                    success: function (data){
                        console.log(data);
                    }
                });
            }
        });

    });





    $('#submit_id').remove();
    $('#submit_id').remove();

    $('#id').blur(function(){
        //on relève la valeur entrée dans l'input
        var id = $(this).val(); //val() : uniquement pour les inputs
        //alert("id : "+id);
        var parametre = "id_produit="+id;
        $.ajax({
            type: 'GET',
            data: parametre, //ce qui est envoyé à ajaxProduitDetail
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxDetailProduit.php',
            success: function(data) { //data : ce qui est reçu de ajaxProduitDetail
                //console.log(data);
                $('#id_prod').html("<br>"+data[0].nom+"<br>"+data[0].description);
                $('#photo').html('<img src="admin/images/'+data[0].image+'" alt="Illustration">');

            }
        });
    });
    $('#choix_produit').change(function (){
        //recuperer la valeur de l'attribut name (pour le php)
        var attribut = $(this).attr('name');
        //alert("id_produit : "+attribut);
        var id=$(this).val();
        var parametre = "id_produit="+id;
        //alert("id_produit : "+id);
        $.ajax({
            type: 'GET',
            data: parametre, //ce qui est envoyé à ajaxProduitDetail
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxDetailProduit.php',
            success: function(data) { //data : ce qui est reçu de ajaxProduitDetail
                //console.log(data);
                $('#id_prod').html("<br>"+data[0].nom+"<br>"+data[0].description);
                $('#photo').html('<img src="admin/images/'+data[0].image+'" alt="Illustration">');

            }
        });

    });

    $('#bordure').css('border','solid 3px #000F');
    $('#bordure').css('margin','10px 800px 100px 10px');

    });

