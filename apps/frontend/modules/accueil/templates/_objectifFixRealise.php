<?php
use_helper("getObjectif");
?>
<div class="col-lg-12" >
    <!--Highcharts - Basic column-->
    <div class="panel panel-success" >
        <div class="panel-heading">
            <h3 class="panel-title">Statéstiques année ( <strong><?php echo date('Y'); ?></strong> )</h3>
        </div>
        <div class="panel-body" style="padding: 0px;">
            <div id="resultat_filtre2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
</div>

<!--Highcharts - Basic column-->
<script>

    $(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'resultat_filtre2',
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