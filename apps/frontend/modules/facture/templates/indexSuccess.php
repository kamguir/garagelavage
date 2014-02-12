<div class="bs-docs-example" style="margin-left: 2%;">
<h1>List des Factures</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Id facture</th>
      <th>Id voiture</th>
      <th>Immatruculation</th>
      <th>Id type lavage</th>
      <th>Prix lavage</th>
      <th>Commentaire reglement</th>
      <th>Date reglement</th>
      <th>Etat</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tblFactures as $tblFacture): /* @var $tblFacture TblFacture */?>
    <tr>
      <td><a href="<?php echo url_for('facture/edit?id_facture='.$tblFacture->getIdFacture()) ?>"><?php echo $tblFacture->getIdFacture() ?></a></td>
      <td><?php echo $tblFacture->getIdVoiture() ?></td>
      <td><?php echo $tblFacture->getTblVoiture()->getImmatriculation() ?></td>
      <td><?php foreach ($tblFacture->getLnkTypeLavageFactures() as $lnkTypeLavage): /* @var $lnkTypeLavage LnkTypeLavageFacture */?>
      <li><?php echo $lnkTypeLavage->getRefTypeLavage()->getLibelle(); ?></li></br>
      <?php endforeach; ?></td>
      <td><?php echo $tblFacture->getPrixLavage() ?></td>
      <td><?php echo $tblFacture->getCommentaireReglement() ?></td>
      <td><?php echo $tblFacture->getDateReglement() ?></td>
      <td><?php echo $tblFacture->getEtat() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('facture/new') ?>">New</a>
</div>