<div class="bs-docs-example" style="margin-left: 2%;">
        <div class="col-lg-6 well"><legend>Modifier Ticket N°:(<?php // echo $idTicket; ?>)</legend>
            <?php echo $form->renderHiddenFields(); ?>
            <?php echo $form->renderGlobalErrors(); ?>
            <table>
                        <tbody>
                            <tr>
                                <td>
                                    <label style="margin-right: 57px;"><?php echo $form['id_facture']->renderLabel(); ?></label>
                                </td>
                                <td>
                                    <?php echo $form['id_facture']->renderError(); ?>
                                    <?php echo $form['id_facture']->render(); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            <div id="form_NumTicket">
                <?php include_partial('formEdit', array('form' => $form)) ?>
            </div>
        </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Mise à jour du type de document
        $('#tbl_ticket_id_facture').change(function() {
            var id_facture = $('#tbl_ticket_id_facture').val();
            $('#form_NumTicket').load("<?php echo url_for("ticket/ticketfrmEdit") ?>", {id_facture: id_facture})
        });
    })
            ;
</script>