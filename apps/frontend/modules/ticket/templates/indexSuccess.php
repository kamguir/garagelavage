<div class="bs-docs-example" style="margin-left: 2%;">
    <h1>List des Tickets</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id ticket</th>
                <th>Id facture</th>
                <th>Date entree garage</th>
                <th>Date sortie garage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pager as $tblTicket): /* @var $tblTicket TblTicket */ ?>
                <tr>
                    <td><a href="<?php echo url_for('ticket/edit?id_ticket=' . $tblTicket->getIdTicket()) ?>"><?php echo $tblTicket->getIdTicket() ?></a></td>
                    <td><?php echo $tblTicket->getIdFacture() ?></td>
                    <td><?php echo $tblTicket->getDateEntreeGarage() ?></td>
                    <td><?php echo $tblTicket->getDateSortieGarage() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <input class="btn btn-primary" type="button" name="New" value="New" onClick="window.location = '<?php echo url_for('ticket/imprimerTicket'); ?>';" /> 
    </br>
    <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination pagination-right">
            <ul>
                <li><?php echo link_to('&laquo;', 'ticket/index?page=' . $pager->getFirstPage()) ?></li>
                <li><?php echo link_to('&lt;', 'ticket/index?page=' . $pager->getPreviousPage()) ?></li>
                <?php $links = $pager->getLinks(); ?>
                <?php foreach ($pager->getLinks() as $page): ?>
                    <li> <?php if ($page == $pager->getPage()): ?>
                            <a href="#">
                                <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'ticket/index?page=' . $page); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($page != $pager->getPage()): ?>
                            <?php echo link_to($page, 'ticket/index?page=' . $page); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach ?>
                <li> <?php echo link_to('&gt;', 'ticket/index?page=' . $pager->getNextPage()) ?></li>
                <li><?php echo link_to('&raquo;', 'ticket/index?page=' . $pager->getLastPage()) ?></li>
            </ul>
        </div>
    <?php endif ?> 
    
</div>