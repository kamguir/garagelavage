<div class="container" >  
    <div class="col-lg-6">
        <div class="well">
            <h1>Nouvelle Facture</h1>
            <?php include_partial('form', array('form' => $form)) ?>
        </div>
    </div>
</div>
<div id="divFormMotif" style="visibility: hidden;" ></div>

<div>
    <h3 class="page-header">Actions</h3>
    <div>
        <a href="<?php echo url_for('facture/new') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Facture</a> 
        <a href="<?php echo url_for('facture/listeFacture') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Factures</a> 
    </div></br>
</div>
<script>
    $(function() {
        $("#tbl_facture_prix_lavage").attr('value', 00);

// select tous les id qui  commence par tbl_voiture_libelleRefTypeLavage_                     
        $("[id^=tbl_facture_lnk_type_lavage_facture_list]").change(function() {
//    var total  = parseFloat($('#tbl_facture_prix_lavage').val());
//                                if (this.checked) {
            var idTypeLavage = $(this).val();
            $('#divFormMotif').load("<?php echo url_for("facture/checkTypeLavage?idTypeLavage=") ?>" + idTypeLavage, function(data) {
                if (data)
                {
                    old_val = $("#tbl_facture_prix_lavage").val();
                    if ($("[id^=tbl_facture_lnk_type_lavage_facture_list_" + idTypeLavage + "]").is(':checked')) {
                        var resultat = Number(data) + Number(old_val);
                        $("#tbl_facture_prix_lavage").attr('value', resultat);
                    }
                    else
                    {
                        var resultat2 = Number(old_val) - Number(data);
                        $("#tbl_facture_prix_lavage").attr('value', resultat2);
                    }
                }
                else
                {
                    alert('Attention ,le Type Lavage n\'existe pas .');
                }
            });
        });
        $("#bouton_enregistrer").live("click", function() {
//                                    $("#bouton_enregistrer").text('Traitement en cours...');
            var valeurs = [];
            $("input[type='checkbox']:checked").each(function() {

                valeurs.push($(this).parent().parent().attr("id").substring(4));
            });
            if (valeurs.length < 1)
            {
                alert("Attention, Merci de sélectionner un Type Lavage.");
                $('#header').notif({title: "Attention", content: "Merci de sélectionner un Site.", timeout: 6000, cls: "warning"});
            }
            else
            {
                modifFacture.submit();
            }
        });
        
        $("#tbl_facture_prix_lavage").live({
            click: function() {
                var obj = $(this);
                $('#result').css("color", 'red');
                $('#result').css('font-weight', 'bold');
                $('#result').text('Montant Modifié:' + obj.val());
            },
//            mouseover: function() {
//                var obj = $(this);
//                $('#result').css("color", 'red');
//                $('#result').css('font-weight', 'bold');
//                $('#result').text('Montant Modifié:' + obj.val());
//            },
//            mouseout: function() {
//                var obj = $(this);
//                $('#result').css("color", 'red');
//                $('#result').css('font-weight', 'bold');
//                $('#result').text('Montant Modifié:' + obj.val());
//            }
        });
    });
</script>