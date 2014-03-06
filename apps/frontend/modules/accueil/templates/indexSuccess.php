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
                            <td>Nbr Voiture :</td>
                            <td><span class="badge"><?php echo $nbrVoitures->getNbrVoituresParDate(date('d')); ?></span></td>
                            <td><span class="badge"><?php echo $nbrVoitures->getNbrVoituresParWeek(); ?></span></td>
                            <td><span class="badge"><?php echo $nbrVoitures->getNbrVoituresParDate(date('m')); ?></span></td>
                        </tr>
                        <tr>
                            <td>Nbr Tapies :</td>
                            <td><span class="badge"><?php echo $tblTapis->getNbrTapisParDate(date('d')); ?></span></td>
                            <td><span class="badge"><?php echo $tblTapis->getNbrTapisParWeek(); ?></span></td>
                            <td><span class="badge"><?php echo $tblTapis->getNbrTapisParDate(date('m')); ?></span></td>
                        </tr>
                        <tr>
                            <td>montant Total (DH) :</td>
                            <td><span class="badge"><?php echo $montanTotalJour = $tblFactures->getMontantTotalParDate(date('d')) + $tblTapis->getMontantTotalTapisParDate(date('d')); ?></span></td>
                            <td><span class="badge"><?php echo $montanTotalSemaine = $tblFactures->getMontantTotalParWeek(); ?></span></td>
                            <td><span class="badge"><?php echo $montanTotalMois = $tblFactures->getMontantTotalParDate(date('m')) + $tblTapis->getMontantTotalTapisParDate(date('m')); ?></span></td>
                        </tr>
                        <tr>
                            <td>Dépenses Total (DH) :</td>
                            <td><span class="badge"><?php echo $depensesTotalJour = $tblFactures->getDepensesTotalParDate(date('d')); ?></span></td>
                            <td><span class="badge"><?php echo $depensesSemaine = $tblFactures->getDepensesTotalParWeek(); ?></span></td>
                            <td><span class="badge"><?php echo $depensesMois = $tblFactures->getDepensesTotalParDate(date('m')); ?></span></td>
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
                    <button class="btn btn-large btn-block btn-primary" type="button">Block level button</button>
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
        <div class="panel panel-success" style="width: 40%;" id="dialog" title="Basic dialog">
            <div class="panel-heading">
                <h3 class="panel-title">Voiture les plus lavées, <?php echo date('Y'); ?></h3>
            </div>
            <div class="panel-body">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
        <!--Highcharts - Column chart-->
        <div class="panel panel-success" style="width: 40%;" id="dialog2" title="Basic dialog2">
            <div class="panel-heading">
                <h3 class="panel-title">Statestiques des Employés, <?php echo date('Y'); ?></h3>
            </div>
            <div class="panel-body">
                <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
                <?php include_partial("chiffreAffaireParCharges", array('objectifsFixes' => $objectifsFixes)); ?>
            </div>

            <div class="tab-pane" id="ObjectifFixRealise">
                <?php include_partial("objectifFixRealise", array('tblFactures' => $tblFactures)); ?>
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
                        ["<?php echo $tblClients[0]->getNomClient() . ' ' . $tblClients[0]->getPrenomClient(); ?>",
<?php echo $tblFactures->getNrbVoituresparEmploye($tblClients[0]->getIdClient()); ?>
                        ],
                        ["<?php echo $tblClients[1]->getNomClient() . ' ' . $tblClients[1]->getPrenomClient(); ?>",
<?php echo $tblFactures->getNrbVoituresparEmploye($tblClients[1]->getIdClient()); ?>]
                    ]
                }]
        });
    });

</script>