<?php use_helper('I18N', 'Date') ?>
<?php include_partial('adminRefTypeLavage/assets') ?>

<div id="sf_admin_container" style="margin-left: 2%;" class="col-lg-6 well">
  <h1><?php echo __('Modifier Type Lavage ', array(), 'messages') ?></h1>

  <?php include_partial('adminRefTypeLavage/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('adminRefTypeLavage/form_header', array('refTypeLavage' => $refTypeLavage, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('adminRefTypeLavage/form', array('refTypeLavage' => $refTypeLavage, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adminRefTypeLavage/form_footer', array('refTypeLavage' => $refTypeLavage, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
