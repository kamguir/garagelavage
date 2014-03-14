<div class="containesdr"  >
    <?php
    use_helper("getObjectif");
    ?>
    <div class="bs-docs-section">
        <div class="col-xs-9" >
            <div class="bsa well">
                <table class="table" style="margin-bottom: 2px;">
                    <thead>
                        <tr>
                            <th>Tableau des Statésiques par : </th>
                            <th>jour (<?php echo date('d') ?>)</th>
                            <th>Semaine (<?php echo date('W') - 1 ?>)</th>
                            <th>Mois (<?php echo date('m') ?>)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php ($nbrVoitures) ? $nbrVoitureParJour = $nbrVoitures->getNbrVoituresParDate(date('d')) : $nbrVoitureParJour = 0; ?>
                            <?php ($nbrVoitures) ? $nbrVoitureParWeek = $nbrVoitures->getNbrVoituresParWeek() : $nbrVoitureParWeek = 0; ?>
                            <?php ($nbrVoitures) ? $nbrVoitureParMois = $nbrVoitures->getNbrVoituresParDate(date('m')) : $nbrVoitureParMois = 0; ?>
                            <td>Nbr Voiture :</td>
                            <td><span class="badge"><?php echo $nbrVoitureParJour; ?></span></td>
                            <td><span class="badge"><?php echo $nbrVoitureParWeek; ?></span></td>
                            <td><span class="badge"><?php echo $nbrVoitureParMois; ?></span></td>
                        </tr>
                        <tr>
                            <?php ($tblTapis) ? $nbrTapisParJour = $tblTapis->getNbrTapisParDate(date('d')) : $nbrTapisParJour = 0; ?>
                            <?php ($tblTapis) ? $nbrTapisParWeek = $tblTapis->getNbrTapisParWeek() : $nbrTapisParWeek = 0; ?>
                            <?php ($tblTapis) ? $nbrTapisParMois = $tblTapis->getNbrTapisParDate(date('m')) : $nbrTapisParMois = 0; ?>
                            <td>Nbr Tapies :</td>
                            <td><span class="badge"><?php echo $nbrTapisParJour; ?></span></td>
                            <td><span class="badge"><?php echo $nbrTapisParWeek; ?></span></td>
                            <td><span class="badge"><?php echo $nbrTapisParMois; ?></span></td>
                        </tr>
                        <tr>
                            <?php ($tblTapis) ? $montantTapisParJour = $tblTapis->getMontantTotalTapisParDate(date('d')) : $montantTapisParJour = 0; ?>
                            <?php ($tblTapis) ? $montantTapisParWeek = $tblTapis->getMontantTotalParWeek() : $montantTapisParWeek = 0; ?>
                            <?php ($tblTapis) ? $montantTapisParMois = $tblTapis->getMontantTotalTapisParDate(date('m')) : $montantTapisParMois = 0; ?>
                            <?php ($tblFactures) ? $montantTotalParJour = $tblFactures->getMontantTotalParDate(date('d')) : $montantTotalParJour = 0; ?>
                            <?php ($tblFactures) ? $montantTotalParWeek = $tblFactures->getMontantTotalParWeek() : $montantTotalParWeek = 0; ?>
                            <?php ($tblFactures) ? $montantTotalParMois = $tblFactures->getMontantTotalParDate(date('m')) : $montantTotalParMois = 0; ?>
                            <td>montant Total (DH) :</td>
                            <td><span class="badge"><?php echo $montanTotalJour = $montantTotalParJour + $montantTapisParJour; ?></span></td>
                            <td><span class="badge"><?php echo $montanTotalSemaine = $montantTotalParWeek + $montantTapisParWeek; ?></span></td>
                            <td><span class="badge"><?php echo $montanTotalMois = $montantTotalParMois + $montantTapisParMois; ?></span></td>
                        </tr>
                        <tr>
                            <?php ($tblFactures) ? $depensesTotalParJour = $tblFactures->getDepensesTotalParDate(date('d')) : $depensesTotalParJour = 0; ?>
                            <?php ($tblFactures) ? $depensesTotalParMois = $tblFactures->getDepensesTotalParDate(date('m')) : $depensesTotalParMois = 0; ?>
                            <?php ($tblFactures) ? $depensesTotalParWeek = $tblFactures->getDepensesTotalParWeek() : $depensesTotalParWeek = 0; ?>
                            <td>Dépenses Total (DH) :</td>
                            <td><span class="badge"><?php echo $depensesTotalJour = $depensesTotalParJour; ?></span></td>
                            <td><span class="badge"><?php echo $depensesSemaine = $depensesTotalParWeek; ?></span></td>
                            <td><span class="badge"><?php echo $depensesMois = $depensesTotalParMois; ?></span></td>
                        </tr>
                        <tr style="font-family: monospace;background-color: lightgrey;">
                            <td>GAIN NET :</td>
                            <?php
                            $gainParJour = $montanTotalJour - $depensesTotalJour;
                            $gainParSemaine = $montanTotalSemaine - $depensesSemaine;
                            $gainParMois = $montanTotalMois - $depensesMois;
                            ?>
                            <td style="">
                                <?php if ($gainParJour < 0): ?>
                                    <div class="logoWorning" ></div>
                                <?php endif; ?>
                                <span class="badge"><?php echo $gainParJour; ?></span>
                            </td>
                            <td>
                                <?php if ($gainParSemaine < 0): ?>
                                    <div class="logoWorning" ></div>
                                <?php endif; ?>
                                <span class="badge"><?php echo $gainParSemaine ?></span>
                            </td>
                            <td>
                                <?php if ($gainParMois < 0): ?>
                                    <div class="logoWorning" ></div>
                                <?php endif; ?>
                                <span class="badge"><?php echo $gainParMois ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-4 span2">
                <div class="well">
                    <button class="btn btn-large btn-block btn-primary" type="button" id="opener">Voitures + lavées</button>
                    <button class="btn btn-large btn-block btn-primary" type="button" id="StatEmployes">Stat Employés</button>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <script>
            $(function() {
                $("#dialog").dialog({
                    autoOpen: false,
                    width: 'auto',
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                });
                $("#dialog2").dialog({
                    autoOpen: false,
                    width: 'auto',
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                });
                $("#opener").click(function() {
                    $("#dialog").dialog('option', 'title', 'Pie chart 1');
                    $("#dialog").dialog("open");
                });
                $("#StatEmployes").click(function() {
                    $("#dialog2").dialog('option', 'title', 'Statestique Employés');
                    $("#dialog2").dialog("open");
                });
            });
        </script>

        <!--Highcharts - Pie chart-->
        <div class="panel panel-success" style="width: 60%;" id="dialog" title="Basic dialog">
            <div class="panel-heading">
                <h3 class="panel-title">Voiture les plus lavées, <?php echo date('Y'); ?></h3>
            </div>
            <div class="panel-body">
                <div id="container" style="min-width: 40%; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <!--Highcharts - Column chart-->
        <div class="panel panel-success" style="width: 40%;" id="dialog2" title="Basic dialog2">
            <div class="panel-heading">
                <h3 class="panel-title">Statestiques des Employés, <?php echo date('Y'); ?></h3>
            </div>
            <div class="panel-body">
                <div id="container2" style="min-width: 40%; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

    </div>

    <div class="clear"></div>
    <!---Début tabs pour les tableaux de Réporting----->
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#ChiffreAffaireParCharges" data-toggle="tab">CA / Charges</a></li>
            <li><a href="#ObjectifFixRealise" data-toggle="tab">Objectif Fix/Réalisé</a></li>
        </ul>
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="ChiffreAffaireParCharges">
                <?php include_partial("chiffreAffaireParCharges", array('tblFactures' => $tblFactures)); ?>
            </div>

            <div class="tab-pane" id="ObjectifFixRealise">
                <?php include_partial("objectifFixRealise", array('objectifsFixes' => $objectifsFixes)); ?>
            </div>
        </div>
    </div>
<!--    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#tabs').tab();
        });
    </script>-->
    <!---Fin tabs pour les tableaux de Réporting----->

    <!--http://demo.tutorialzine.com/2013/01/charts-jquery-ajax/-->
</div>

<?php
// initialiser les variables de tbl_facture si  vide
$nbrVoitureParEmploye = array();
$nomPrenomClient = array();
foreach ($tblClients as $key => $value) {
    $nomPrenomClient[$key] = $value->getNomClient() . ' ,' . $value->getPrenomClient();
    if ($tblFactures) {
        $nbrVoitureParEmploye[$key] = $tblFactures->getNrbVoituresparEmploye($value->getIdClient());
    } else {
        $nbrVoitureParEmploye[$key] = 0;
    }
}
?>

<script>
    $(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                        ['audi', <?php echo getNbrVoiture(4) ?>],
                        {
                            name: 'renault',
                            y: <?php echo getNbrVoiture(48) ?>,
                            sliced: true,
                            selected: true
                        },
                        ['citroen', <?php echo getNbrVoiture(11) ?>],
                        ['fiat', <?php echo getNbrVoiture(16) ?>],
                        ['ford', <?php echo getNbrVoiture(17) ?>],
                        ['honda', <?php echo getNbrVoiture(19) ?>],
                        ['hyundai', <?php echo getNbrVoiture(20) ?>],
                        ['kia', <?php echo getNbrVoiture(25) ?>],
                        ['mercedes', <?php echo getNbrVoiture(37) ?>],
                        ['peugeot', <?php echo getNbrVoiture(44) ?>],
                        ['toyota', <?php echo getNbrVoiture(61) ?>]
                    ]
                }]
        });
    });
    $(function() {

        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container2',
                type: 'column',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                    type: 'column',
                    name: 'Browser share',
                    data: [
                        ["<?php echo $nomPrenomClient[0]; ?>",
<?php echo $nbrVoitureParEmploye[0]; ?>
                        ],
                        ["<?php echo $nomPrenomClient[1]; ?>",
<?php echo $nbrVoitureParEmploye[1]; ?>]
                    ]
                }]
        });
    });

</script>