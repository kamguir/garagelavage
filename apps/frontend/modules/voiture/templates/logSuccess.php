<div class="bs-docs-example" style="margin-left: 2%;">
    
    <?php // var_dump($pager);die;  ?>
     <?php if ($pager->haveToPaginate()): ?>
        <div class="pagination pagination-right">
            <ul>
                <li><?php echo link_to('&laquo;', 'voiture/log?page=' . $pager->getFirstPage()) ?></li>
                <li><?php echo link_to('&lt;', 'voiture/log?page=' . $pager->getPreviousPage()) ?></li>
                <?php $links = $pager->getLinks(); ?>
                <?php foreach ($pager->getLinks() as $page): ?>
                    <li> <?php if ($page == $pager->getPage()): ?>
                            <a href="#">
                                <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'voiture/log?page=' . $page); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($page != $pager->getPage()): ?>
                            <?php echo link_to($page, 'voiture/log?page=' . $page); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach ?>
                <li> <?php echo link_to('&gt;', 'voiture/log?page=' . $pager->getNextPage()) ?></li>
                <li><?php echo link_to('&raquo;', 'voiture/log?page=' . $pager->getLastPage()) ?></li>
            </ul>
        </div>
    <?php endif ?> 
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Client</th>
                <th>Immat</th>
                <th>Marque</th>
                <th>Couleur</th>
                <th>Type Lavage</th>
                <th>Montant Reglement</th>
                <th>Date Entrée</th>
                <th>Date Sortie</th> 
                <th>Etat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($myData as $data): /* @var $data TblVoiture */ ?>

                <tr>
                    <td><a href="<?php echo url_for('voiture/edit?id_voiture=' . $data->getIdVoiture()) ?>"><?php echo $data->getTblClient()->getNomClient() . ' ' . $data->getTblClient()->getPrenomClient(); ?></a></td>
                    <!--<td></td>-->
                    <td><?php echo $data->getImmatriculation() ?></td>
                    <td><?php echo $data->getRefMarque()->getMarqueLibelle(); ?></td>
                    <td><div class="cercle" style="background-color:#<?php echo $data->getCouleur() ?>">&nbsp</div></td>
                    <?php foreach ($data->getTblFactures() as $TblFacture):/* @var $TblFacture TblFacture */ ?>
                        <!--libelle lavage-->     
                        <td>
                            <?php foreach ($TblFacture->getLnkTypeLavageFacturesJoinRefTypeLavage() as $lnkFacture):/* @var $lnkFacture LnkTypeLavageFacture */ ?>
                    <li>
                        <?php echo $lnkFacture->getRefTypeLavage()->getLibelle(); ?>
                    </li></br>
                <?php endforeach; ?>
                </td>
                <!--montant Lavage-->
                <td> 
                    <?php foreach ($TblFacture->getLnkTypeLavageFacturesJoinRefTypeLavage() as $lnkFacture):/* @var $lnkFacture LnkTypeLavageFacture */ ?>
                    <li>
                        <?php echo $lnkFacture->getRefTypeLavage()->getMontantLavage(); ?>
                    </li></br>
                <?php endforeach; ?>
                </td>
                 <?php // if($TblFacture->getTblTickets()): ?>
                
                <?php foreach ($TblFacture->getTblTickets() as $TblTicket):/* @var $TblTicket TblTicket */ ?>
                    <?php if(!$TblTicket): ?>
                        <td><?php echo $TblTicket->getDateEntreeGarage();?></td>
                        <td><?php echo $TblTicket->getDateSortieGarage(); ?></td>
                    <?php else:?>
                        <?php // var_dump($TblTicket);die; ?>
                        <td>karim</td>
                        <td>karim</td>
                    <?php endif;?>
                <?php endforeach; ?>
                  
                        
                <td><?php if ($TblFacture->getEtat() == 1) { ?>
                        <img src="/images/ok.png">
                    <?php } elseif ($TblFacture->getEtat() == 0) { ?>
                        <img src="/images/ko.png">
                    <?php } ?>
                </td>
            <?php endforeach; ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>