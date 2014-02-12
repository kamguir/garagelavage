<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('depenses/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_depenses='.$form->getObject()->getIdDepenses() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<table style="width: 100%;">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('depenses/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'depenses/delete?id_depenses='.$form->getObject()->getIdDepenses(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['date_depenses']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_depenses']->renderError() ?>
          <?php echo $form['date_depenses'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_ref_depenses']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_ref_depenses']->renderError() ?>
          <?php echo $form['id_ref_depenses'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['montant_depenses']->renderLabel() ?></th>
        <td>
          <?php echo $form['montant_depenses']->renderError() ?>
          <?php echo $form['montant_depenses'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etat_payement']->renderLabel() ?></th>
        <td>
          <?php echo $form['etat_payement']->renderError() ?>
          <?php echo $form['etat_payement'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
