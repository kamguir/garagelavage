<div class="container">
    <div class="col-lg-6">
        <div class="well">
            <form action="<?php echo url_for('depenses/newDepenses'); ?>" method="post" id="modifDemande" class="bs-example form-horizontal" >
                <fieldset>
                    <?php echo $form->renderHiddenFields(); ?>
                    <?php echo $form->renderGlobalErrors(); ?>
                    <legend>Nouvelle Depense :</legend>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['date_depenses']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['date_depenses']->renderError(); ?>
                            <?php echo $form['date_depenses']->render(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['montant_depenses']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['montant_depenses']->renderError(); ?>
                            <?php echo $form['montant_depenses']->render(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['id_ref_depenses']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['id_ref_depenses']->renderError(); ?>
                            <?php echo $form['id_ref_depenses']->render(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['etat_payement']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['etat_payement']->renderError(); ?>
                            <?php echo $form['etat_payement']->render(); ?>
                        </div>
                    </div>
                    <div class="col-lg-7 col-lg-offset-2">
                        <input class="btn btn-default" type="button" name="cancel" value="Cancel" onClick="window.location = '<?php echo url_for('depenses/index'); ?>';" /> 
                        <button type="submit" class="btn btn-primary">Enregistrer</button> 
                    </div>
                </fieldset>
            </form>
        </div>    
        <div>
            <h3 class="page-header">Actions</h3>
            <div>
                <a href="<?php echo url_for('depenses/newDepenses') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Depense</a> 
                <a href="<?php echo url_for('depenses/index') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Depenses</a> 
            </div></br>
        </div>
    </div>
</div>

<script>
                            $(function() {
//attach keypress to input
                                $('#tbl_depenses_montant_depenses').keydown(function(event) {
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

                            });
</script>