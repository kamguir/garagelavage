<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orcaValidatorTreeDate
 *
 * @author james
 */
class orcaValidatorTreeDate extends sfValidatorPropelChoice
{
     /**
   * @see sfValidatorBase
   */
  protected function doClean($value)
  {
    if(isset( $value['cb']))
        $value['cb'] =  parent::doClean($value['cb']);
    
    
    foreach ($value['date'] as $module_id=>&$date)
    {
        if(in_array($module_id, $value['cb']))
        {
            $v = new sfValidatorDate(array('required'=>false));
            $date = $v->clean($date);
        }
        else
        {
            $date = null;
        }
        
    }

    return $value;
  }

  /**
   * Returns the column to use for comparison.
   *
   * The primary key is used by default.
   *
   * @return string The column name
   */
  protected function getColumn()
  {
    if ($this->getOption('column'))
    {
      $columnName = $this->getOption('column');
      $from = BasePeer::TYPE_FIELDNAME;
    }
    else
    {
      $map = call_user_func(array(constant($this->getOption('model').'::PEER'), 'getTableMap'));
      foreach ($map->getColumns() as $column)
      {
        if ($column->isPrimaryKey())
        {
          $columnName = $column->getPhpName();
          break;
        }
      }
      $from = BasePeer::TYPE_PHPNAME;
    }

    return call_user_func(array(constant($this->getOption('model').'::PEER'), 'translateFieldName'), $columnName, $from, BasePeer::TYPE_COLNAME);
  }
}

?>
