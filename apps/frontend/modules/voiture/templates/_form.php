<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('voiture/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_voiture=' . $form->getObject()->getIdVoiture() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    &nbsp;<a class="btn btn-info" href="<?php echo url_for('voiture/index') ?>">Retour list</a>
                    <?php if (!$form->getObject()->isNew()): ?>
                        &nbsp;<a class="btn btn-danger" <?php echo link_to('Supprimer', 'voiture/delete?id_voiture=' . $form->getObject()->getIdVoiture(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></a>
                    <?php endif; ?>
                    <input class="btn btn-info" type="submit" value="Enregistrer" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th><?php echo $form['immatriculation']->renderLabel() ?></th>
                <td>
                    <?php echo $form['immatriculation']->renderError() ?>
                    <?php echo $form['immatriculation'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_client']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_client']->renderError() ?>
                    <?php echo $form['id_client'] ?>
                </td>
            </tr>
<!--            <tr>
                <th><?php // echo $form['date_reglement']->renderLabel() ?></th>
                <td>
                    <?php // echo $form['date_reglement']->renderError() ?>
                    <?php // echo $form['date_reglement'] ?>
                </td>
            </tr>-->
            <tr>
                <th><?php echo $form['id_marque']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_marque']->renderError() ?>
                    <?php echo $form['id_marque'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_motorisation']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_motorisation']->renderError() ?>
                    <?php echo $form['id_motorisation'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['couleur']->renderLabel() ?></th>
                <td>
                    <?php echo $form['couleur']->renderError() ?>
                    <?php echo $form['couleur'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['nbr_portes']->renderLabel() ?></th>
                <td>
                    <?php echo $form['nbr_portes']->renderError() ?>
                    <?php echo $form['nbr_portes'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['modele']->renderLabel() ?></th>
                <td>
                    <?php echo $form['modele']->renderError() ?>
                    <?php echo $form['modele'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['annee']->renderLabel() ?></th>
                <td>
                    <?php echo $form['annee']->renderError() ?>
                    <?php echo $form['annee'] ?>
                </td>
            </tr>
<!--            <tr>
                <th><?php // echo $form['montant_lavage']->renderLabel()  ?></th>
                <td>
                    <?php // echo $form['montant_lavage']->renderError() ?>
                    <?php // echo $form['montant_lavage'] ?>
                </td>
            </tr>-->
<!--            <tr>
                <th><?php // echo $form['libelleRefTypeLavage']->renderLabel()  ?></th>
                <td>
                    <?php // echo $form['libelleRefTypeLavage']->renderError() ?>
                    <?php // echo $form['libelleRefTypeLavage'] ?>
                </td>
            </tr>-->
        </tbody>
    </table>
</form>