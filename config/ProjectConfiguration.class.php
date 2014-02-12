<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    public function setup() {
        sfConfig::set('sf_phing_path', sfConfig::get('sf_root_dir') . '/lib/vendor/phing');
        sfConfig::set('sf_propel_path', sfConfig::get('sf_root_dir') . '/lib/vendor/propel');
        sfConfig::set('sf_propel_generator_path', sfConfig::get('sf_root_dir') . '/lib/vendor/propel/generator/lib');
        $this->enablePlugins(array('sfPropelORMPlugin','orcaWidgetPlugin', 'sfFormExtraPlugin'));
    }

}
