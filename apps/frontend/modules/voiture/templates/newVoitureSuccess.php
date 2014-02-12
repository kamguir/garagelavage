<div class="container" >  
    <div class="col-lg-6">
        <div class="well">
            <form action="<?php echo url_for('voiture/newVoiture'); ?>" method="post" id="modifDemande" class="bs-example form-horizontal" >
                <fieldset>
                    <?php echo $form->renderHiddenFields(); ?>
                    <?php echo $form->renderGlobalErrors(); ?>
                    <legend>Nouvelle Voiture</legend>
                    <table style="margin-bottom: 1px;">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-lg-2 control-label"><?php echo $form['immatriculation']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php echo $form['immatriculation']->renderError(); ?>
                                        <?php echo $form['immatriculation']->render(); ?>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['id_client']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php echo $form['id_client']->renderError(); ?>
                                        <?php echo $form['id_client']->render(); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label"><?php echo $form['id_marque']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php echo $form['id_marque']->renderError(); ?>
                                        <?php echo $form['id_marque']->render(); ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label"><?php echo $form['id_motorisation']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php echo $form['id_motorisation']->renderError(); ?>
                                        <?php echo $form['id_motorisation']->render(); ?>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label"><?php echo $form['nbr_portes']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php echo $form['nbr_portes']->renderError(); ?>
                                        <?php echo $form['nbr_portes']->render(); ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label"><?php echo $form['modele']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php echo $form['modele']->renderError(); ?>
                                        <?php echo $form['modele']->render(); ?>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label"><?php echo $form['couleur']->renderLabel(); ?></label>
                                    <div class="col-lg-10" >
                                        <?php echo $form['couleur']->renderError(); ?>
                                        <?php echo $form['couleur']->render(); ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label"><?php echo $form['annee']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php echo $form['annee']->renderError(); ?>
                                        <?php echo $form['annee']->render(); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!--<tr>-->
<!--                            <td>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label"><?php // echo $form['date_reglement']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php // echo $form['date_reglement']->renderError(); ?>
                                        <?php // echo $form['date_reglement']->render(); ?>
                                        <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </td>-->
<!--                            <td>
                                <div class="form-group" >
                                    <label for="textArea" class="col-lg-2 control-label"><?php // echo $form['montant_lavage']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php // echo $form['montant_lavage']->renderError(); ?>
                                        <?php // echo $form['montant_lavage']->render(); ?>
                                    </div>
                                    <tr >
                                        <td>
                                        </td>
                                        <td style="float: right;">
                                            <span id="result"></span>
                                        </td>
                                    </tr>
                                </div>
                                </div>
                            </td>-->
                        <!--</tr>-->
<!--                        <tr>
                            <td>
                                <div class="form-group" >
                                    <label for="textArea" class="col-lg-2 control-label"><?php // echo $form['libelleRefTypeLavage']->renderLabel(); ?></label>
                                    <div class="col-lg-10">
                                        <?php // echo $form['libelleRefTypeLavage']->render(); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>-->
                    </table>

                    <div class="col-lg-10 col-lg-offset-2">
                        <input class="btn btn-default" type="button" name="cancel" value="Cancel" onClick="window.location = '<?php echo url_for('voiture/index'); ?>';" /> 
                        <button type="submit" class="btn btn-primary" id="bouton_enregistrer">Enregistrer</button> 
                    </div>
                </fieldset>
            </form>
        </div>
        <div>
            <h3 class="page-header">Actions</h3>
            <div>
                <a href="<?php echo url_for('voiture/newVoiture') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Voiture</a> 
                <a href="<?php echo url_for('voiture/index') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Voitures</a> 
            </div></br>
        </div>
    </div>

</div>
<?php
$listImmat = implode("','", $sf_data->getRaw('listImmatriculations'));
?>
<div id="divFormMotif" style="visibility: hidden;" ></div>
<script>
                            $(function() {
//    définir masque pour les input
                                var availableTags = ['<?php echo $listImmat ?>'];
                                $("#input").autocomplete({
                                    source: availableTags
                                });

                                $('#annee , #modele').keydown(function(event) {
                                    // Allow special chars + arrows 
                                    if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9
                                            || event.keyCode == 27 || event.keyCode == 13
                                            || (event.keyCode == 65 && event.ctrlKey === true)
                                            || (event.keyCode >= 35 && event.keyCode <= 39)) {
                                        return;
                                    } else {
                                        // If it's not a number stop the keypress
                                        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                                            event.preventDefault();
                                        }
                                    }
                                });

//                            });
// Calcul montant lavage 
                                $("#tbl_voiture_montant_lavage").attr('value', 00);
// select tous les id qui  commence par tbl_voiture_libelleRefTypeLavage_                     
//                                $("[id^=tbl_voiture_libelleRefTypeLavage]").change(function() {
////    var total  = parseFloat($('#tbl_voiture_montant_lavage').val());
////                                if (this.checked) {
//                                    var idTypeLavage = $(this).val();
//                                    $('#divFormMotif').load("<?php // echo url_for("voiture/checkTypeLavage?idTypeLavage=") ?>" + idTypeLavage, function(data) {
//                                        if (data)
//                                        {
//                                            old_val = $("#tbl_voiture_montant_lavage").val();
//                                            if ($("[id^=tbl_voiture_libelleRefTypeLavage_" + idTypeLavage + "]").is(':checked')) {
//                                                var resultat = Number(data) + Number(old_val);
//                                                $("#tbl_voiture_montant_lavage").attr('value', resultat);
//                                            }
//                                            else
//                                            {
//                                                var resultat2 = Number(old_val) - Number(data);
//                                                $("#tbl_voiture_montant_lavage").attr('value', resultat2);
//                                            }
//                                        }
//                                        else
//                                        {
//                                            alert('Attention ,le Type Lavage n\'existe pas .');
//                                        }
//                                    });
//                                });

//                                $("#bouton_enregistrer").live("click", function() {
////                                    $("#bouton_enregistrer").text('Traitement en cours...');
//                                    var valeurs = [];
//                                    $("input[type='checkbox']:checked").each(function() {
//
//                                        valeurs.push($(this).parent().parent().attr("id").substring(4));
//                                    });
//                                    if (valeurs.length < 1)
//                                    {
//                                        alert("Attention, Merci de sélectionner un Type Lavage.");
//                                        $('#header').notif({title: "Attention", content: "Merci de sélectionner un Site.", timeout: 6000, cls: "warning"});
//                                    }
//                                    else
//                                    {
//                                        modifDemande.submit();
//                                    }
//                                });
                            });
</script>

<script>

    $(document).ready(function() {
        $("#tbl_voiture_montant_lavage").live({
            click: function() {
                var obj = $(this);
                $('#result').css("color", 'red');
                $('#result').css('font-weight', 'bold');
                $('#result').text('Montant Modifié:' + obj.val());
            },
            mouseover: function() {
                var obj = $(this);
                $('#result').css("color", 'red');
                $('#result').css('font-weight', 'bold');
                $('#result').text('Montant Modifié:' + obj.val());
            },
            mouseout: function() {
                var obj = $(this);
                $('#result').css("color", 'red');
                $('#result').css('font-weight', 'bold');
                $('#result').text('Montant Modifié:' + obj.val());
            }
        });
    });
</script>