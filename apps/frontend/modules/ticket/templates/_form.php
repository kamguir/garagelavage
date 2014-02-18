<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('ticket/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_ticket='.$form->getObject()->getIdTicket() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="btn btn-info" href="<?php echo url_for('ticket/index') ?>">Retour list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<a class="btn btn-danger" <?php echo link_to('Supprimer', 'ticket/delete?id_ticket='.$form->getObject()->getIdTicket(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></a>
          <?php endif; ?>
          <input class="btn btn-info" type="submit" value="Enregistrer" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['id_facture']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_facture']->renderError() ?>
          <?php echo $form['id_facture'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_entree_garage']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_entree_garage']->renderError() ?>
          <?php echo $form['date_entree_garage'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_sortie_garage']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_sortie_garage']->renderError() ?>
          <?php echo $form['date_sortie_garage'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
