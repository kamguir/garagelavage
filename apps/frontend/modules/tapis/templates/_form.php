<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('tapis/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?num_tapis='.$form->getObject()->getNumTapis() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('tapis/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'tapis/delete?num_tapis='.$form->getObject()->getNumTapis(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['taille_tapis']->renderLabel() ?></th>
        <td>
          <?php echo $form['taille_tapis']->renderError() ?>
          <?php echo $form['taille_tapis'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['montant_lavage_tapis']->renderLabel() ?></th>
        <td>
          <?php echo $form['montant_lavage_tapis']->renderError() ?>
          <?php echo $form['montant_lavage_tapis'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_lavage_tapis']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_lavage_tapis']->renderError() ?>
          <?php echo $form['date_lavage_tapis'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
