<?php



/**
 * This class defines the structure of the 'tbl_employeur' table.
 *
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 01/09/14 10:18:28
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class TblEmployeurTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TblEmployeurTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('tbl_employeur');
		$this->setPhpName('TblEmployeur');
		$this->setClassname('TblEmployeur');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_EMPLOYEUR', 'IdEmployeur', 'INTEGER', true, null, null);
		$this->addColumn('NOM_EMPLOYEUR', 'NomEmployeur', 'VARCHAR', false, 50, null);
		$this->addColumn('PRENOM_EMPLOYEUR', 'PrenomEmployeur', 'VARCHAR', false, 50, null);
		$this->addColumn('NOM_SOCIETE', 'NomSociete', 'VARCHAR', false, 30, null);
		$this->addColumn('NUM_TELEPHONE_EMPLOYEUR', 'NumTelephoneEmployeur', 'VARCHAR', false, 20, null);
		$this->addColumn('ADRESSE_SOCIETE', 'AdresseSociete', 'VARCHAR', false, 100, null);
		$this->addColumn('VILLE_SOCIETE', 'VilleSociete', 'VARCHAR', false, 50, null);
		$this->addColumn('ADRESSE_EMAIL', 'AdresseEmail', 'VARCHAR', false, 50, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // TblEmployeurTableMap