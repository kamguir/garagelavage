<tr>
    <td>
        <label><?php echo $form['id_ticket']->renderLabel(); ?></label>
    </td>
    <td>
        <?php echo $form['id_ticket']->renderError(); ?>
        <?php echo $form['id_ticket']->render(); ?>
    </td>
</tr>
<tr>
    <td>
        <label><?php echo $form['date_entree_garage']->renderLabel(); ?></label>
    </td>
    <td>
        <?php echo $form['date_entree_garage']->renderError(); ?>
        <?php echo $form['date_entree_garage']->render(); ?>
    </td>
</tr>
<tr>
    <td>
        <label><?php echo $form['date_sortie_garage']->renderLabel(); ?></label>
    </td>
    <td>
        <?php echo $form['date_sortie_garage']->renderError(); ?>
        <?php echo $form['date_sortie_garage']->render(); ?>
    </td>
</tr>
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