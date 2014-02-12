<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('client/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_client=' . $form->getObject()->getIdClient() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    &nbsp;<a href="<?php echo url_for('client/index') ?>">Back to list</a>
                    <?php if (!$form->getObject()->isNew()): ?>
                        &nbsp;<?php echo link_to('Delete', 'client/delete?id_client=' . $form->getObject()->getIdClient(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                    <?php endif; ?>
                    <input type="submit" value="Save" />
                </td>
            </tr>
        </tfoot>
        <tbody>
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
        </tbody>
    </table>
</form>
