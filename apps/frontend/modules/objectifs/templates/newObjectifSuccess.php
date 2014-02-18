<div class="container" >  
    <div class="col-lg-6">
        <div class="well">
            <form action="<?php echo url_for('objectifs/newObjectif'); ?>" method="post" id="modifDemande" class="bs-example form-horizontal" >
                <fieldset>
                    <?php echo $form->renderHiddenFields(); ?>
                    <?php echo $form->renderGlobalErrors(); ?>
                    <legend>Nouveau Objectif :</legend>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['objectif_date']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['objectif_date']->renderError(); ?>
                            <?php echo $form['objectif_date']->render(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['objectif_fixe']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['objectif_fixe']->renderError(); ?>
                            <?php echo $form['objectif_fixe']->render(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['objectif_realise']->renderLabel(); ?></label>
                        <div class="col-lg-10">
                            <?php echo $form['objectif_realise']->renderError(); ?>
                            <?php echo $form['objectif_realise']->render(); ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-offset-2">
                        <input class="btn btn-default" type="button" name="cancel" value="Annuler" onClick="window.location = '<?php echo url_for('objectifs/index'); ?>';" /> 
                        <button type="submit" class="btn btn-primary">Enregistrer</button> 
                    </div>
                </fieldset>
            </form>
        </div>
        <div>
            <h3 class="page-header">
                Actions
            </h3>
            <div>
                <a href="<?php echo url_for('objectifs/newObjectif') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter objectif</a> 
                <a href="<?php echo url_for('objectifs/index') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des objectifs</a> 

            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    //attach keypress to input
    $('#tbl_objectif_objectif_fixe , #tbl_objectif_objectif_realise').keydown(function(event) {
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