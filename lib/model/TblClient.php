<?php

/**
 * Skeleton subclass for representing a row from the 'tbl_client' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 10/12/13 18:14:04
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class TblClient extends BaseTblClient {

    public function __toString() {
        return $this->getNomClient() . ' ' . $this->getPrenomClient();
    }

}

// TblClient