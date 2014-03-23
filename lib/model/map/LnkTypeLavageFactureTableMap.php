<?php



/**
 * This class defines the structure of the 'lnk_type_lavage_facture' table.
 *
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 03/23/14 17:30:02
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class LnkTypeLavageFactureTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LnkTypeLavageFactureTableMap';

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
		$this->setName('lnk_type_lavage_facture');
		$this->setPhpName('LnkTypeLavageFacture');
		$this->setClassname('LnkTypeLavageFacture');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ID_TYPE_LAVAGE', 'IdTypeLavage', 'INTEGER' , 'ref_type_lavage', 'ID_TYPE_LAVAGE', true, null, null);
		$this->addForeignPrimaryKey('ID_FACTURE', 'IdFacture', 'INTEGER' , 'tbl_facture', 'ID_FACTURE', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('RefTypeLavage', 'RefTypeLavage', RelationMap::MANY_TO_ONE, array('id_type_lavage' => 'id_type_lavage', ), null, null);
		$this->addRelation('TblFacture', 'TblFacture', RelationMap::MANY_TO_ONE, array('id_facture' => 'id_facture', ), null, null);
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

} // LnkTypeLavageFactureTableMap
