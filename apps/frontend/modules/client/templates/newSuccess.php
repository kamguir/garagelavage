<div class="container" >  
    <div class="col-lg-6">
        <div class="well">
            <form action="<?php echo url_for('client/new'); ?>" method="post" id="modifDemande" class="bs-example form-horizontal" >
                <fieldset>
                    <?php echo $form->renderHiddenFields(); ?>
                    <?php echo $form->renderGlobalErrors(); ?>
                    <legend>Nouveau Client</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="inputPassword" class="col-lg-2 control-label"><?php echo $form['nom_client']->renderLabel(); ?></label>
                                <div class="col-lg-10">
                                    <?php echo $form['nom_client']->renderError(); ?>
                                    <?php echo $form['nom_client']->render(); ?>
                                </div> 
                            </td>
                            <td>
                                <label for="textArea" class="col-lg-2 control-label"><?php echo $form['prenom_client']->renderLabel(); ?></label>
                                <div class="col-lg-10">
                                    <?php echo $form['prenom_client']->renderError(); ?>
                                    <?php echo $form['prenom_client']->render(); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="inputEmail" class="col-lg-2 control-label"><?php echo $form['cin_client']->renderLabel(); ?></label>
                                <div class="col-lg-10">
                                    <?php echo $form['cin_client']->renderError(); ?>
                                    <?php echo $form['cin_client']->render(); ?>
                                </div>
                            </td>
                            <td>
                                <label for="textArea" class="col-lg-2 control-label"><?php echo $form['situation']->renderLabel(); ?></label>
                                <div class="col-lg-10" style="width: 50%;">
                                    <?php echo $form['situation']->renderError(); ?>
                                    <?php echo $form['situation']->render(); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="textArea" class="col-lg-2 control-label"><?php echo $form['age_client']->renderLabel(); ?></label>
                                <div class="col-lg-10">
                                    <?php echo $form['age_client']->renderError(); ?>
                                    <?php echo $form['age_client']->render(); ?>
                                </div>
                            </td>
                            <td>
                                <label for="textArea" class="col-lg-2 control-label"><?php echo $form['num_tel']->renderLabel(); ?></label>
                                <div class="col-lg-10" >
                                    <?php echo $form['num_tel']->renderError(); ?>
                                    <?php echo $form['num_tel']->render(); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="textArea" class="col-lg-2 control-label"><?php echo $form['adresse_client']->renderLabel(); ?></label>
                                <div class="col-lg-10">
                                    <?php echo $form['adresse_client']->renderError(); ?>
                                    <?php echo $form['adresse_client']->render(); ?>
                                </div>
                            </td>
                            <td>
                                <label for="textArea" class="col-lg-2 control-label"><?php echo $form['fonction_client']->renderLabel(); ?></label>
                                <div class="col-lg-10">
                                    <?php echo $form['fonction_client']->renderError(); ?>
                                    <?php echo $form['fonction_client']->render(); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></br>
                            </td>
                        </tr>
                    </table>
                    <div class="col-lg-10 col-lg-offset-2">
                        <input class="btn btn-default" type="button" name="cancel" value="Annuler" onClick="window.location = '<?php echo url_for('client/index'); ?>';" />
                        <button type="submit" class="btn btn-primary">Enregistrer</button> 
                    </div>
                </fieldset>
            </form>
        </div>
        <div>
            <h3 class="page-header">Actions</h3>
            <div>
                <a href="<?php echo url_for('client/new') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Client</a> 
                <a href="<?php echo url_for('client/index') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Client</a> 
            </div></br>
        </div>
    </div>
</div>

<script>
                            $(function() {
//    définir masque pour les input
                                $("#age_client").mask("99");
                            });
</script>