<?php

/**
 * Skeleton subclass for performing query and update operations on the 'tbl_user' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 03/04/14 18:40:53
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class TblUserQuery extends BaseTblUserQuery {

    /**
     * @return UserQuery
     */
    public function filterByProfileCdv() {
        return $this->useLnkUserProfilQuery()
                        ->filterByProfilId(RefProfilPeer::CDV)
                        ->endUse();
    }

    public function findOneByAuthentification($login, $password) {
        return $this->filterByUserLogin($login)
                        ->filterByUserPassword($password)
                        ->findOne();
    }

}

// TblUserQuery
