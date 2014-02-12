<div class="container" >
    <?php
    use_helper("getObjectif");
    ?>
    <div class="bs-docs-section">
        <div class="col-lg-7" >
            <div class="bs-example">
                <p>
                </p>
            </div>
            <div class="bsa well" style="margin-top: -10px;">
                <table class="table" style="margin-bottom: 2px;">
                    <thead>
                        <tr>
                            <th>Tableau des Statésiques par :</th>
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
                            <td><span class="badge"><?php echo $montanTotalJour - $depensesTotalJour ?></span></td>
                            <td><span class="badge"><?php echo $montanTotalSemaine - $depensesSemaine ?></span></td>
                            <td><span class="badge"><?php echo $montanTotalMois - $depensesMois ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-4 span2" style=" width: 14%;">
                <div class="well">
                    <button class="btn btn-large btn-block btn-primary" type="button" id="opener">Voitures + lavées</button>
                    <button class="btn btn-large btn-block btn-primary" type="button">Block level button</button>
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
                $("#opener").click(function() {
                    $("#dialog").dialog('option', 'title', 'Pie chart 1');
                    $("#dialog").dialog("open");
                });
            });
        </script>

        <div class="col-lg-9" >
            <!--Highcharts - Basic column-->
            <div class="panel panel-success" >
                <div class="panel-heading">
                    <h3 class="panel-title">Statéstiques année ( <strong><?php echo date('Y'); ?></strong> )</h3>
                </div>

                <div class="panel-body" style="padding: 0px;">
                    <div id="resultat_filtre" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>


        <!--Highcharts - Pie chart-->
        <div class="panel panel-success" style="width: 40%;" id="dialog" title="Basic dialog">
            <div class="panel-heading">
                <h3 class="panel-title">Voiture les plus lavées, <?php echo date('Y'); ?></h3>
            </div>
            <div class="panel-body">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </div>

    <!--http://demo.tutorialzine.com/2013/01/charts-jquery-ajax/-->
</div>

<!--Highcharts - Basic column-->
<script>

    $(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'resultat_filtre',
                type: 'column'
            },
            title: {
                text: 'Nombre de voitures par mois'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aôut', 'September', 'October', 'November', 'December'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'indicateurs',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' '
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -20,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Objectif Fixe (nbr)',
                    data: [<?php echo $objectifsFixes->getObjectifFixByDate('01') ?>, <?php echo $objectifsFixes->getObjectifFixByDate('02') ?>, <?php echo $objectifsFixes->getObjectifFixByDate('03') ?>
                        , <?php echo $objectifsFixes->getObjectifFixByDate('04') ?>, <?php echo $objectifsFixes->getObjectifFixByDate('05') ?>,<?php echo $objectifsFixes->getObjectifFixByDate('06') ?>
                        , <?php echo $objectifsFixes->getObjectifFixByDate('07') ?>, <?php echo $objectifsFixes->getObjectifFixByDate('08') ?>,<?php echo $objectifsFixes->getObjectifFixByDate('09') ?>
                        , <?php echo $objectifsFixes->getObjectifFixByDate('10') ?>, <?php echo $objectifsFixes->getObjectifFixByDate('11') ?>,<?php echo $objectifsFixes->getObjectifFixByDate('12') ?>]
                }, {
                    name: 'Objectif Réalisé (nbr)',
                    data: [<?php echo $objectifsFixes->getObjectifRealiseByDate('01') ?>, <?php echo $objectifsFixes->getObjectifRealiseByDate('02') ?>, <?php echo $objectifsFixes->getObjectifRealiseByDate('03') ?>
                        , <?php echo $objectifsFixes->getObjectifRealiseByDate('04') ?>, <?php echo $objectifsFixes->getObjectifRealiseByDate('05') ?>,<?php echo $objectifsFixes->getObjectifRealiseByDate('06') ?>
                        , <?php echo $objectifsFixes->getObjectifRealiseByDate('07') ?>, <?php echo $objectifsFixes->getObjectifRealiseByDate('08') ?>,<?php echo $objectifsFixes->getObjectifRealiseByDate('09') ?>
                        , <?php echo $objectifsFixes->getObjectifRealiseByDate('10') ?>, <?php echo $objectifsFixes->getObjectifRealiseByDate('11') ?>,<?php echo $objectifsFixes->getObjectifRealiseByDate('12') ?>]
                }, {
                    name: 'Montant Dépenses (dh)',
                    data: [<?php echo getMontantDepenses('01'); ?>, <?php echo getMontantDepenses('02'); ?>, <?php echo getMontantDepenses('03'); ?>
                        , <?php echo getMontantDepenses('04'); ?>, <?php echo getMontantDepenses('05'); ?>,<?php echo getMontantDepenses('06'); ?>
                        , <?php echo getMontantDepenses('07'); ?>, <?php echo getMontantDepenses('08'); ?>,<?php echo getMontantDepenses('09'); ?>
                        , <?php echo getMontantDepenses('10'); ?>, <?php echo getMontantDepenses('11'); ?>,<?php echo getMontantDepenses('12'); ?>]
                }, {
                    name: 'Chiffre d\'affaire (dh)',
                    data: [<?php echo $tblFactures->getMontantReglement('01'); ?>, <?php echo $tblFactures->getMontantReglement('02'); ?>, <?php echo $tblFactures->getMontantReglement('03'); ?>
                        , <?php echo $tblFactures->getMontantReglement('04'); ?>, <?php echo $tblFactures->getMontantReglement('05'); ?>,<?php echo $tblFactures->getMontantReglement('06'); ?>
                        , <?php echo $tblFactures->getMontantReglement('07'); ?>, <?php echo $tblFactures->getMontantReglement('08'); ?>,<?php echo $tblFactures->getMontantReglement('09'); ?>
                        , <?php echo $tblFactures->getMontantReglement('10'); ?>, <?php echo $tblFactures->getMontantReglement('11'); ?>,<?php echo $tblFactures->getMontantReglement('12'); ?>]

                }
            ]
        });
    });


</script>

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

</script>