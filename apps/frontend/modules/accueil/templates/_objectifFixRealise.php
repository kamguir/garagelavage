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
<?php
// initialiser les variables de tbl_objectif si  vide
$tblObjectifsFixesByDate = array();
$tblObjectifsRealiseByDate = array();
for ($i = 1; $i <= 12; $i++) {
    if ($objectifsFixes) {
        $tblObjectifsFixesByDate[$i] = $objectifsFixes->getObjectifFixByDate($i);
        $tblObjectifsRealiseByDate[$i] = $objectifsFixes->getObjectifRealiseByDate($i);
    } else {
        $tblObjectifsFixesByDate[$i] = 0;
        $tblObjectifsRealiseByDate[$i] = 0;
    }
}

?>
<!--Highcharts - Basic column-->
<script>

    $(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'resultat_filtre',
                type: 'column'
            },
            title: {
                text: 'Objectif fix / Objectif Réalisé'
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
                    data: [<?php echo $tblObjectifsFixesByDate[1] ?>, <?php echo $tblObjectifsFixesByDate[2] ?>, <?php echo $tblObjectifsFixesByDate[3] ?>
                        , <?php echo $tblObjectifsFixesByDate[4] ?>, <?php echo $tblObjectifsFixesByDate[5] ?>,<?php echo $tblObjectifsFixesByDate[6] ?>
                        , <?php echo $tblObjectifsFixesByDate[7] ?>, <?php echo $tblObjectifsFixesByDate[8] ?>,<?php echo $tblObjectifsFixesByDate[9] ?>
                        , <?php echo $tblObjectifsFixesByDate[10] ?>, <?php echo $tblObjectifsFixesByDate[11] ?>,<?php echo $tblObjectifsFixesByDate[12] ?>]
                }, {
                    name: 'Objectif Réalisé (nbr)',
                    data: [<?php echo $tblObjectifsRealiseByDate[1] ?>, <?php echo $tblObjectifsRealiseByDate[2] ?>, <?php echo $tblObjectifsRealiseByDate[3] ?>
                        , <?php echo $tblObjectifsRealiseByDate[4] ?>, <?php echo $tblObjectifsRealiseByDate[5] ?>,<?php echo $tblObjectifsRealiseByDate[6] ?>
                        , <?php echo $tblObjectifsRealiseByDate[7] ?>, <?php echo $tblObjectifsRealiseByDate[8] ?>,<?php echo $tblObjectifsRealiseByDate[9] ?>
                        , <?php echo $tblObjectifsRealiseByDate[10] ?>, <?php echo $tblObjectifsRealiseByDate[11] ?>,<?php echo $tblObjectifsRealiseByDate[12] ?>]
                }
            ]
        });
    });


</script>