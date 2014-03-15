<div class="container" >
    <div class="bs-docs-section">
        <div class="col-lg-9">
            <?php
            $months = array(
                '01' => 'Janvier',
                '02' => 'Février',
                '03' => 'Mars',
                '04' => 'Avril',
                '05' => 'Mai',
                '06' => 'Juin',
                '07' => 'Juillet',
                '08' => 'Aôut',
                '09' => 'September',
                '10' => 'October',
                '11' => 'November',
                '12' => 'December'
            );
            if ($objectifsFixes) {
            foreach ($months as $key => $value) {
                
                    if ($objectifsFixes->getObjectifFixByDate($key) > $objectifsFixes->getObjectifRealiseByDate($key)) {
                        ?>
                        <div class="bs-example">
                            <div class="alert alert-dismissable alert-warning">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Warning! mois ( <?php echo $objectifsFixes->get_month_name($key); ?> )</strong>
                                <span>objectif non atteint !</span>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            if ($depensesNonPaye) {
            foreach ($depensesNonPaye as $key => $value) {
                ?>
                        <div class="bs-example">
                            <div class="alert alert-dismissable alert-warning">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Warning! Facture <?php echo $value->getLibelleDepenses(); ?> du ( <?php echo $value->getDateDepenses(); ?> ) non payée</strong>
                                <!--<span>objectif non atteint !</span>-->
                            </div>
                        </div>
            <?php
                }
            }
            else {
                    ?>
                    <div class = "bs-example">

                        <span>Le Système n'a detecté aucune Alerte :) </span>
                    </div>

                    <?php
                }
               ?>
        </div>
    </div>
</div>