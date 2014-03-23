<div class="bs-docs-example" style="margin-left: 2%;">
    <h1>List des Objectifs</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <!--<th>Id objectif</th>-->
                <th>Date Objectif</th>
                <th>Objectif fixé</th>
                <th>Objectif realisé</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pager->getResults() as $tblObjectif): /* @var $tblObjectif TblObjectif */?>
                <tr>
                    <!--<td><a href="<?php echo url_for('objectifs/edit?id_objectif=' . $tblObjectif->getIdObjectif()) ?>"><?php echo $tblObjectif->getIdObjectif() ?></a></td>-->
                    <td><a href="<?php echo url_for('objectifs/edit?id_objectif=' . $tblObjectif->getIdObjectif()) ?>"><?php echo $tblObjectif->getObjectifDate() ?></a></td>
                    <td><?php echo $tblObjectif->getObjectifFixe() ?></td>
                    <td><?php echo $tblObjectif->getObjectifRealise() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination pagination-right">
            <ul>
                <li><?php echo link_to('&laquo;', 'objectifs/index?page=' . $pager->getFirstPage()) ?></li>
                <li><?php echo link_to('&lt;', 'objectifs/index?page=' . $pager->getPreviousPage()) ?></li>
                <?php $links = $pager->getLinks(); ?>
                <?php foreach ($pager->getLinks() as $page): ?>
                    <li> <?php if ($page == $pager->getPage()): ?>
                            <a href="#">
                                <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'objectifs/index?page=' . $page); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($page != $pager->getPage()): ?>
                            <?php echo link_to($page, 'objectifs/index?page=' . $page); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach ?>
                <li> <?php echo link_to('&gt;', 'objectifs/index?page=' . $pager->getNextPage()) ?></li>
                <li><?php echo link_to('&raquo;', 'objectifs/index?page=' . $pager->getLastPage()) ?></li>
            </ul>
        </div>
    <?php endif ?> 
</div>

<div>
    <h3 class="page-header">Actions</h3>
    <div>
        <a href="<?php echo url_for('objectifs/newObjectif') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Objectif</a> 
        <a href="<?php echo url_for('objectifs/index') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Objectifs</a> 
    </div></br>
</div>