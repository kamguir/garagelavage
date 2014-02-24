<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="formId" action="<?php echo url_for('tapis/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?num_tapis='.$form->getObject()->getNumTapis() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
          <td colspan="2"><div class="clear">&nbsp</div>
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="btn btn-info" href="<?php echo url_for('tapis/index') ?>">Retour list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<a class="btn btn-danger" <?php echo link_to('Supprimer', 'tapis/delete?num_tapis='.$form->getObject()->getNumTapis(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></a>
          <?php endif; ?>
          <input class="btn btn-info" id="valider" type="submit" value="Enregistrer" />
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
        <th><?php echo $form['prix_mettre_carre']->renderLabel() ?></th>
        <td>
          <?php echo $form['prix_mettre_carre']->renderError() ?>
          <?php echo $form['prix_mettre_carre'] ?>
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

<script type="text/javascript">
    $(document).ready(function(){
        
        $('#valider').hide();
        
 //gestion affichage boutton
       $('#formId').find('input').keypress(function(){
           $('#valider').show();
       }).change(function(){
           $('#valider').show();
       });
    });
</script>