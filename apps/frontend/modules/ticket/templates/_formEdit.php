<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('ticket/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_ticket=' . $form->getObject()->getIdTicket() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    &nbsp;<a href="<?php echo url_for('ticket/index') ?>">Back to list</a>
                    <?php if (!$form->getObject()->isNew()): ?>
                        &nbsp;<?php echo link_to('Delete', 'ticket/delete?id_ticket=' . $form->getObject()->getIdTicket(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                    <?php endif; ?>
                    <input type="submit" value="Save" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th><?php // echo $form['id_facture']->renderLabel()  ?></th>
                <td>
                    <?php // echo $form['id_facture']->renderError() ?>
                    <?php // echo $form['id_facture'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['date_entree_garage']->renderLabel() ?></th>
                <td>
                    <?php echo $form['date_entree_garage']->renderError() ?>
                    <?php echo $form['date_entree_garage'] ?>
                </td>
            </tr>
            <tr id="datetimepicker">
                <th><?php echo $form['date_sortie_garage']->renderLabel() ?></th>
                <td>
                    <?php echo $form['date_sortie_garage']->renderError() ?>
                    <?php echo $form['date_sortie_garage'] ?>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<script type="text/javascript">

    $('#datetimepicker').datetimepicker();
    $('#datetimepicker').on('changeDate', function(e) {
        $('#realdate').val(moment(e.date).format());
    });
</script>