<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>
            <?php include_slot('title', 'BackOffice Gestion Lavage') ?>
        </title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body style="padding-top: 5%;">
        <!--changer la langues--> 
        <?php // include_component('language', 'language') ?>

        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div id="header" >
                    <!--<p class="logo"><a href="<?php echo url_for('@homepage') ?>"></a></p>-->
                </div>
                <div class="navbar-header">
                    <a href="<?php echo url_for('@homepage') ?>" class="navbar-brand" style="font: lobster,Oswald,Arial,Serif;"><?php echo TblParamPortailPeer::getValueByName('NOM_PROJET'); ?></a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav" style="margin-left: 5%;">
                        <li>
                            <a href="<?php echo url_for('@homepage') ?>">Accueil</a>
                        </li>
                        <li>
                            <a href="<?php echo url_for('@suiviVoitures') ?>">Voitures</a>
                        </li>
                        <li>
                            <a href="<?php echo url_for('@listeFactures') ?>">Factures</a>
                        </li>
                        <li>
                            <a href="<?php echo url_for('@administrationpage') ?>">Administration</a>
                        </li>
                        <li>
                            <a href="<?php echo url_for('accueil/alerts') ?>">Alerts!</a>
                        </li>
                        <li>
                            <a href="<?php echo url_for('auth/logout') ?>" class="label-danger">Se deconnecter</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li style="color: #fff;">Version <?php echo TblParamPortailPeer::getValueByName('VERSION') ?></li>
<!--                        <li style="color: #fff;">Version <?php // echo $sf_user->getAttribute('fonction'); ?></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" >
            <div class="row">
                <!--col-xs-6 col-sm-3-->
                <div class="col-xs-6 col-md-2 well" >
                    <!--<div class="btn-group-vertical well" style="margin-left: 4%; width: 14%; position: fixed;" >-->
                    <a href="<?php echo url_for('facture/new') ?>" class="btn btn-primary leftBar" <i class="icon-plus-sign icon-white"></i><p class="logoFacture" ></p>Gection Factures</a>
                    <a href="<?php echo url_for('voiture/newVoiture') ?>" class="btn btn-primary leftBar" <i class="icon-plus-sign icon-white"></i><p class="logoVoiture" ></p>Nouvelle Voiture</a>
                    <a href="<?php echo url_for('tapis/newTapis') ?>" class="btn btn-primary leftBar" <i class="icon-plus-sign icon-white"></i><p class="logoTapis" ></p>Nouveau Tapis</a>
                    <a href="<?php echo url_for('client/new') ?>" class="btn btn-primary leftBar"<i class="icon-plus-sign icon-white"></i><p class="logoClient" ></p>Nouveau Client</a>
                    <!--<a href="<?php echo url_for('ticket/imprimerTicket') ?>" class="btn btn-primary leftBar" <i class="icon-plus-sign icon-white"></i><p class="logoPrint" ></p>Imprimer Ticket</a>-->
                    <a href="<?php echo url_for('objectifs/newObjectif') ?>" class="btn btn-primary leftBar" <i class="icon-plus-sign icon-white"></i><p class="logoObjectif" ></p>Gestion Objectifs</a>
                    <a href="<?php echo url_for('depenses/newDepenses') ?>" class="btn btn-primary leftBar" <i class="icon-plus-sign icon-white"></i><p class="logoDepences" ></p>Gestion Dépences</a>
                </div>
                <div class="col-xs-12 col-md-9">
                    <?php echo $sf_content ?>
                </div>
            </div> 
        </div>

        <div class="clearfix"></div>
        <div id="footer" style="background-color: #f5f5f5; height: 40px; text-align: center;">
            <div class="container" >
                <p class="muted credit" style="margin-top: 8px;">Tous droits réservés. Copyright © 2013 <small>--by Kamguir--</small></p>
            </div>
        </div>
    </body>
</html>
<style type="text/css">
    .leftBar {
        padding: 2px;
        margin-bottom: 5px;
        width: 100%;
    }
</style>