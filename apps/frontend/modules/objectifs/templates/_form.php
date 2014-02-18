<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('objectifs/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_objectif='.$form->getObject()->getIdObjectif() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table style="width: 100%;">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="btn btn-info" href="<?php echo url_for('objectifs/index') ?>">Retour list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<a class="btn btn-danger" <?php echo link_to('Supprimer', 'objectifs/delete?id_objectif='.$form->getObject()->getIdObjectif(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></a>
          <?php endif; ?>
          <input class="btn btn-info" type="submit" value="Enregistrer" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['objectif_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['objectif_date']->renderError() ?>
          <?php echo $form['objectif_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['objectif_fixe']->renderLabel() ?></th>
        <td>
          <?php echo $form['objectif_fixe']->renderError() ?>
          <?php echo $form['objectif_fixe'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['objectif_realise']->renderLabel() ?></th>
        <td>
          <?php echo $form['objectif_realise']->renderError() ?>
          <?php echo $form['objectif_realise'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>