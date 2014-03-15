<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form id="modifFacture" action="<?php echo url_for('facture/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_facture=' . $form->getObject()->getIdFacture() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    &nbsp;<a class="btn btn-info" href="<?php echo url_for('facture/listeFacture') ?>">Retour list</a>
                    <?php if (!$form->getObject()->isNew()): ?>
                        &nbsp;<a class="btn btn-danger" <?php echo link_to('Supprimer', 'facture/delete?id_facture=' . $form->getObject()->getIdFacture(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></a>
                    <?php endif; ?>
                    <input class="btn btn-info" type="submit" value="Enregistrer" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr dir="rtl" lang="ar">
                <th><?php echo $form['id_voiture']->renderLabel() ?></th>
                <td>
                    <p dir='rtl' lang='ar'>
                        <?php echo $form['id_voiture']->renderError() ?>
                        <?php echo $form['id_voiture'] ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_employe']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_employe']->renderError() ?>
                    <?php echo $form['id_employe'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['prix_lavage']->renderLabel() ?></th>
                <td>
                    <?php echo $form['prix_lavage']->renderError() ?>
                    <?php echo $form['prix_lavage'] ?>
                </td>
            <tr>
                <td>
                </td>
                <td style="float: right;">
                    <span id="result"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['lnk_type_lavage_facture_list']->renderLabel() ?></th>
                <td>
                    <?php echo $form['lnk_type_lavage_facture_list']->renderError() ?>
                    <?php echo $form['lnk_type_lavage_facture_list'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['date_reglement']->renderLabel() ?></th>
                <td>
                    <?php echo $form['date_reglement']->renderError() ?>
                    <?php echo $form['date_reglement'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['etat']->renderLabel() ?></th>
                <td>
                    <?php echo $form['etat']->renderError() ?>
                    <?php echo $form['etat'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['commentaire_reglement']->renderLabel() ?></th>
                <td>
                    <?php echo $form['commentaire_reglement']->renderError() ?>
                    <?php echo $form['commentaire_reglement'] ?>
                </td>
            </tr>
            <tr>
                <td><div class="clear">&nbsp</div>
                </td>
            </tr>
        </tbody>
    </table>
</form>
