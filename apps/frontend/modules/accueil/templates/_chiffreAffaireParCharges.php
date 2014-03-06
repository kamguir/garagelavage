<div class="col-lg-12" >
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
                }
            ]
        });
    });


</script>