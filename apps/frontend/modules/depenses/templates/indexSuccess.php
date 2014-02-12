<div class="bs-docs-example" style="margin-left: 2%;">
    <h1>List des Dépenses</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id depenses</th>
                <th>Date depenses</th>
                <th>Type depenses</th>
                <th>Montant depenses</th>
                <th>Etat payement</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pager as $tblDepenses): /* @var $tblDepenses TblDepenses */ ?>
                <tr>
                    <td><a href="<?php echo url_for('depenses/edit?id_depenses=' . $tblDepenses->getIdDepenses()) ?>"><?php echo $tblDepenses->getIdDepenses() ?></a></td>
                    <td><?php echo $tblDepenses->getDateDepenses() ?></td>
                    <td><?php echo $tblDepenses->getRefDepenses()->getLibelleDepenses() ?></td>
                    <td><?php echo $tblDepenses->getMontantDepenses() ?></td>
                    <td>
                        <?php if ($tblDepenses->getEtatPayement() == 1) { ?>
                            <img src="/images/ok.png">
                        <?php } elseif ($tblDepenses->getEtatPayement() == 0) { ?>
                            <img src="/images/ko.png">
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination pagination-right">
            <ul>
                <li><?php echo link_to('&laquo;', 'depenses/index?page=' . $pager->getFirstPage()) ?></li>
                <li><?php echo link_to('&lt;', 'depenses/index?page=' . $pager->getPreviousPage()) ?></li>
                <?php $links = $pager->getLinks(); ?>
                <?php foreach ($pager->getLinks() as $page): ?>
                    <li> <?php if ($page == $pager->getPage()): ?>
                            <a href="#">
                                <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'depenses/index?page=' . $page); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($page != $pager->getPage()): ?>
                            <?php echo link_to($page, 'depenses/index?page=' . $page); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach ?>
                <li> <?php echo link_to('&gt;', 'depenses/index?page=' . $pager->getNextPage()) ?></li>
                <li><?php echo link_to('&raquo;', 'depenses/index?page=' . $pager->getLastPage()) ?></li>
            </ul>
        </div>
    <?php endif ?> 
</div>

<div>
    <h3 class="page-header">Actions</h3>
    <div>
        <a href="<?php echo url_for('depenses/newDepenses') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Depense</a> 
        <a href="<?php echo url_for('depenses/index') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Depenses</a> 
    </div></br>
</div>