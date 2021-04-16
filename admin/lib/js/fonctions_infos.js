

$(document).ready(function (){

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

    $('#bordure').css('border','solid 1px #000F');
    });

