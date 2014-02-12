<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>
            <?php include_slot('title', 'BackOffice LavageAyoub') ?>
        </title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body style="padding-top: 80px;">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div id="header">
                    <p class="logo"><a href="<?php echo url_for('@homepage') ?>"></a></p>
                </div>
                <div class="navbar-header">
                    <a href="<?php echo url_for('@homepage') ?>" class="navbar-brand">Lavage Ayoub</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo url_for('@homepage') ?>">Accueil</a>
                        </li>
                        <li>
                            <a href="<?php echo url_for('@suiviVoitures') ?>">Suivi</a>
                        </li>
                        <li>
                            <!--<a href="../help/">Facturation</a>-->
                        </li>
                        <li>
                            <a href="<?php echo url_for('@administrationpage') ?>">Administration</a>
                        </li>
                        <li>
                            <!--<a href="<?php // echo url_for('@logVoitures')    ?>">Log</a>-->
                        </li>
                        <li>
                            <a href="<?php echo url_for('accueil/alerts') ?>">Alerts!</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li style="color: #fff;">Version 0.1.4</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <!--col-xs-6 col-sm-3-->
            <div class="col-md-2" style="margin-left: 6%; width: 14%;">
                <div class="well">
                    <a href="<?php echo url_for('client/new') ?>" class="btn btn-primary" style="padding: 3px; margin-bottom: 5px;width: 100%;" ><i class="icon-plus-sign icon-white"></i><p class="logoClient" ></p>Nouveau Client</a>
                    <a href="<?php echo url_for('voiture/newVoiture') ?>" class="btn btn-primary" style="padding: 3px;margin-bottom: 5px;width: 100%;"><i class="icon-plus-sign icon-white"></i><p class="logoVoiture" ></p>Nouvelle Voiture</a>
                    <a href="<?php echo url_for('tapis/newTapis') ?>" class="btn btn-primary" style="padding: 3px;margin-bottom: 5px;width: 100%;"><i class="icon-plus-sign icon-white"></i><p class="logoTapis" ></p>Nouvelle Tapis</a>
                    <a href="<?php echo url_for('facture/listeFacture') ?>" class="btn btn-primary" style="padding: 3px;margin-bottom: 5px;width: 100%;"><i class="icon-plus-sign icon-white"></i><p class="logoFacture" ></p>Gection Factures</a>
                    <a href="<?php echo url_for('ticket/imprimerTicket') ?>" class="btn btn-primary" style="padding: 3px;margin-bottom: 5px;width: 100%;"><i class="icon-plus-sign icon-white"></i><p class="logoPrint" ></p>Imprimer Ticket</a>
                    <a href="<?php echo url_for('objectifs/newObjectif') ?>" class="btn btn-primary" style="padding: 3px;margin-bottom: 5px;width: 100%;"><i class="icon-plus-sign icon-white"></i><p class="logoObjectif" ></p>Gestion Objectifs</a>
                    <a href="<?php echo url_for('depenses/newDepenses') ?>" class="btn btn-primary" style="padding: 3px;margin-bottom: 5px;width: 100%;"><i class="icon-plus-sign icon-white"></i><p class="logoDepences" ></p>Gestion Dépences</a>
                </div>
            </div>
            <div class="col-xs-6 col-sm-8">
                <?php echo $sf_content ?>
            </div>
            <div class="clearfix"></div>
            <div id="footer" style="background-color: #f5f5f5; height: 40px; text-align: center;">
                <div class="container" >
                    <p class="muted credit" style="margin-top: 8px;">Tous droits réservés. Copyright © 2013 <small>--by Kamguir--</small></p>
                </div>
            </div>
        </div>
    </body>
</html>
