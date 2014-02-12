<?php



/**
 * This class defines the structure of the 'tbl_tapis' table.
 *
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 01/09/14 10:18:29
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class TblTapisTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TblTapisTableMap';

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
		$this->setName('tbl_tapis');
		$this->setPhpName('TblTapis');
		$this->setClassname('TblTapis');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('NUM_TAPIS', 'NumTapis', 'INTEGER', true, null, null);
		$this->addColumn('TAILLE_TAPIS', 'TailleTapis', 'INTEGER', false, null, null);
		$this->addColumn('PRIX_METTRE_CARRE', 'PrixMettreCarre', 'DOUBLE', false, null, 15);
		$this->addColumn('MONTANT_LAVAGE_TAPIS', 'MontantLavageTapis', 'DOUBLE', false, null, null);
		$this->addColumn('DATE_LAVAGE_TAPIS', 'DateLavageTapis', 'TIMESTAMP', false, null, null);
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

} // TblTapisTableMap
