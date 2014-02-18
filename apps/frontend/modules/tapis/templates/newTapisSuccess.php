<div class="container" >  
    <div class="col-lg-6">
        <div class="well">
            <form action="<?php echo url_for('tapis/newTapis'); ?>" method="post" id="modifDemande" class="bs-example form-horizontal" >
                <fieldset>
                    <?php echo $form->renderHiddenFields(); ?>
                    <?php echo $form->renderGlobalErrors(); ?>
                    <legend>Nouveau Tapis</legend>
                    <div class="form-group" id="datetimepicker" > 
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['date_lavage_tapis']->renderLabel(); ?></label>
                        <div class="col-lg-10" >
                            <?php echo $form['date_lavage_tapis']->renderError(); ?>
                            <?php echo $form['date_lavage_tapis']->render(); ?>
<!--                                <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['taille_tapis']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['taille_tapis']->renderError(); ?>
                            <?php echo $form['taille_tapis']->render(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['prix_mettre_carre']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['prix_mettre_carre']->renderError(); ?>
                            <?php echo $form['prix_mettre_carre']->render(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['montant_lavage_tapis']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['montant_lavage_tapis']->renderError(); ?>
                            <?php echo $form['montant_lavage_tapis']->render(); ?>
                        </div>
                    </div>

                    <div class="col-lg-10 col-lg-offset-2">
                        <input class="btn btn-default" type="button" name="cancel" value="Annuler" onClick="window.location = '<?php echo url_for('tapis/index'); ?>';" /> 
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </fieldset>
            </form>


        </div>
        <div>
            <h3 class="page-header">Actions</h3>
            <div>
                <a href="<?php echo url_for('tapis/newTapis') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Tapis</a> 
                <a href="<?php echo url_for('tapis/index') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Tapis</a> 
            </div></br>
        </div>
    </div>
</div>
<script type="text/javascript">

                            $('#datetimepicker').datetimepicker();
                            $('#datetimepicker').on('changeDate', function(e) {
                                $('#realdate').val(moment(e.date).format());
                            });
</script>


<script>
    $(document).ready(function() {
// que des numbers
        $('#tailleTapis, #prixMettreCarre').keydown(function(event) {
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

        $("#tailleTapis, #prixMettreCarre").keyup(
                function() {
                    var amount = $('#tailleTapis').val();
                    var percentage = $('#prixMettreCarre').val();

                    var total = amount * percentage;

                    $('#montantLavageTapis').val(total.toFixed(2));
                    $('#montantLavageTapis').css("color", 'red');
                    $('#montantLavageTapis').css('font-weight', 'bold');
//                    $('#montantLavageTapis').attr('disabled','disabled');
                }
        );
    });

</script>