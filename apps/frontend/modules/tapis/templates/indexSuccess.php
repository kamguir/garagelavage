<div class="container" style="width: 100%;">

    <h1>List tapis</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Num tapis</th>
                <th>Taille tapis</th>
                <th>Montant lavage tapis</th>
                <th>Date lavage tapis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pager as $tblTapis): ?>
                <tr>
                    <td><a href="<?php echo url_for('tapis/edit?num_tapis=' . $tblTapis->getNumTapis()) ?>"><?php echo $tblTapis->getNumTapis() ?></a></td>
                    <td><?php echo $tblTapis->getTailleTapis() ?></td>
                    <td><?php echo $tblTapis->getMontantLavageTapis() ?></td>
                    <td><?php echo $tblTapis->getDateLavageTapis() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination pagination-right">
            <ul>
                <li><?php echo link_to('&laquo;', 'tapis/index?page=' . $pager->getFirstPage()) ?></li>
                <li><?php echo link_to('&lt;', 'tapis/index?page=' . $pager->getPreviousPage()) ?></li>
                <?php $links = $pager->getLinks(); ?>
                <?php foreach ($pager->getLinks() as $page): ?>
                    <li> <?php if ($page == $pager->getPage()): ?>
                            <a href="#">
                                <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'tapis/index?page=' . $page); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($page != $pager->getPage()): ?>
                            <?php echo link_to($page, 'tapis/index?page=' . $page); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach ?>
                <li> <?php echo link_to('&gt;', 'tapis/index?page=' . $pager->getNextPage()) ?></li>
                <li><?php echo link_to('&raquo;', 'tapis/index?page=' . $pager->getLastPage()) ?></li>
            </ul>
        </div>
    <?php endif ?> 
</div>

<div>
    <h3 class="page-header">Actions</h3>
    <div>
        <a href="<?php echo url_for('tapis/newTapis') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Tapis</a> 
        <a href="<?php echo url_for('tapis/listeTapis') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Tapis</a> 
    </div></br>
</div>