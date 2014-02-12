<div class="container">  
    <div class="row" >
        <div class="col-lg-6 well" id="formTicketAImprimer" style="margin-left: 10% !important;margin-right: 5% !important;">
            <form action="<?php echo url_for('ticket/newTicket'); ?>" method="post" id="modifDemande" class="bs-example form-horizontal" style="float: left;">
                <fieldset>
                    <?php echo $form->renderHiddenFields(); ?>
                    <?php echo $form->renderGlobalErrors(); ?>
                    <legend><?php echo $infosEmployeur->getNomSociete() ?></legend>
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
                    <table id="form_NumTicket">
                        <tbody>
                            <tr>
                                <td>
                                    <?php include_partial('ticket/typeDoc', array('form' => $form)) ?>
                                </td>
                            </tr> 
                        </tbody>
                    </table>
                </fieldset>
            </form> 
            <div class="col-lg-5" style="float: right;"><br>
                <address>
                    <strong>Adresse :</strong><br>
                    <?php echo $infosEmployeur->getAdresseSociete() . ', ' . $infosEmployeur->getVilleSociete() ?><br>
                    <abbr title="Phone">Tel:</abbr> <?php echo $infosEmployeur->getNumTelephoneEmployeur() ?>
                </address>
                <address>
                    <strong><?php echo $infosEmployeur->getPrenomEmployeur() . ' ' . $infosEmployeur->getNomEmployeur() ?></strong><br>
                    <a href="mailto:#"><?php echo $infosEmployeur->getAdresseEmail() ?></a>
                </address>
            </div>
        </div>
        <div class="col-lg-10 col-lg-offset-2">
            <input class="btn btn-default" type="button" name="cancel" value="Cancel" onClick="window.location = '<?php echo url_for('ticket/index'); ?>';" /> 
            <button type="button" class="btn btn-primary" onclick="PrintElem('#formTicketAImprimer')">Imprimer</button> 
        </div>
    </div>

    <div class="bs-docs-example" style="width: 70%;">
        <h1>List des Tickets</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>facture N°</th>
                    <th>Immatriculation</th>
                    <th>Type lavage</th>
                    <th>Date entree garage</th>
                    <th>Date sortie garage</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pager->getResults() as $listTickets):/* @var $listTickets TblTicket */ ?>
                    <tr>
                        <td><?php echo $listTickets->getIdFacture() ?></a></td>
                        <td><?php echo $listTickets->getTblFacture()->getTblVoiture()->getImmatriculation() ?></a></td>
                        <?php foreach ($listTickets->getTblFacture()->getLnkTypeLavageFactures() as $value):/* @var $value LnkTypeLavageFacture */ ?>
                            <td><?php echo $value->getRefTypeLavage()->getLibelle() ?></a></td>  
                        <?php endforeach; ?>   
                        <td><?php echo $listTickets->getDateEntreeGarage() ?></a></td>
                        <td><?php echo $listTickets->getDateSortieGarage() ?></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if ($pager->haveToPaginate()): ?>
            <div class="pagination pagination-right">
                <ul>
                    <li><?php echo link_to('&laquo;', 'ticket/imprimerTicket?page=' . $pager->getFirstPage()) ?></li>
                    <li><?php echo link_to('&lt;', 'ticket/imprimerTicket?page=' . $pager->getPreviousPage()) ?></li>
                    <?php $links = $pager->getLinks(); ?>
                    <?php foreach ($pager->getLinks() as $page): ?>
                        <li> <?php if ($page == $pager->getPage()): ?>
                                <a href="#">
                                    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'ticket/imprimerTicket?page=' . $page); ?>
                                </a>
                            <?php endif; ?>
                            <?php if ($page != $pager->getPage()): ?>
                                <?php echo link_to($page, 'ticket/imprimerTicket?page=' . $page); ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach ?>
                    <li> <?php echo link_to('&gt;', 'ticket/imprimerTicket?page=' . $pager->getNextPage()) ?></li>
                    <li><?php echo link_to('&raquo;', 'ticket/imprimerTicket?page=' . $pager->getLastPage()) ?></li>
                </ul>
            </div>
        <?php endif ?> 
    </div>

</div>
<script type="text/javascript">
                $(document).ready(function() {

// que des numbers
    $('#tbl_ticket_id_facture').keydown(function(event) {
        // Allow special chars + arrows 
        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9
                || event.keyCode == 27 || event.keyCode == 13
                || (event.keyCode == 65 && event.ctrlKey === true)
                || (event.keyCode >= 35 && event.keyCode <= 39)) {
            return;
        } else {
            // If it's not a number stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                event.preventDefault();
            }
        }
    });
    
                    // Mise à jour du type de document
                    $('#tbl_ticket_id_facture').keyup(function() {
                        var id_facture = $('#tbl_ticket_id_facture').val();
                        $('#form_NumTicket').load("<?php echo url_for("ticket/reloadTypeDoc") ?>", {id_facture: id_facture})
                    });
                })
                        ;
</script>


<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('impressionTicket', '', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>