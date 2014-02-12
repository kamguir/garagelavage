<div class="bs-docs-example" style="margin-left: 2%;">
    <h1>List des Clients</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id client</th>
                <th>Cin</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Situation</th>
                <th>Age</th>
                <th>Num tel</th>
                <th>Adresse</th>
                <th>Fonction</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pager as $tblClient): /* var $tblClient TblClient  */ ?>
                <tr> 
                    <td><a href="<?php echo url_for('client/edit?id_client=' . $tblClient->getIdClient()) ?>"><?php echo $tblClient->getIdClient() ?></a></td>
                    <td><?php echo $tblClient->getCinClient() ?></td>
                    <td><?php echo $tblClient->getNomClient() ?></td>
                    <td><?php echo $tblClient->getPrenomClient() ?></td>
                    <td><?php echo $tblClient->getRefSituation()->getSituation() ?></td>
                    <td><?php echo $tblClient->getAgeClient() ?></td>
                    <td><?php echo $tblClient->getNumTel() ?></td>
                    <td><?php echo $tblClient->getAdresseClient() ?></td>
                    <td><?php echo $tblClient->getFonctionClient() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination pagination-right">
            <ul>
                <li><?php echo link_to('&laquo;', 'client/index?page=' . $pager->getFirstPage()) ?></li>
                <li><?php echo link_to('&lt;', 'client/index?page=' . $pager->getPreviousPage()) ?></li>
                <?php $links = $pager->getLinks(); ?>
                <?php foreach ($pager->getLinks() as $page): ?>
                    <li> <?php if ($page == $pager->getPage()): ?>
                            <a href="#">
                                <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'client/index?page=' . $page); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($page != $pager->getPage()): ?>
                            <?php echo link_to($page, 'client/index?page=' . $page); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach ?>
                <li> <?php echo link_to('&gt;', 'client/index?page=' . $pager->getNextPage()) ?></li>
                <li><?php echo link_to('&raquo;', 'ticket/index?page=' . $pager->getLastPage()) ?></li>
            </ul>
        </div>
    <?php endif ?> 

</div>

<div>
    <h3 class="page-header">Actions</h3>
    <div>
        <a href="<?php echo url_for('client/new') ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Ajouter Client</a> 
        <a href="<?php echo url_for('client/index') ?>" class="btn btn-primary"><i class="icon-list icon-white"></i>Liste des Client</a> 
    </div></br>
</div>