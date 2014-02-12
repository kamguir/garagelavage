<?php



/**
 * This class defines the structure of the 'ref_motorisation' table.
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
class RefMotorisationTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RefMotorisationTableMap';

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
		$this->setName('ref_motorisation');
		$this->setPhpName('RefMotorisation');
		$this->setClassname('RefMotorisation');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID_MOTORISATION', 'IdMotorisation', 'INTEGER', true, null, null);
		$this->addColumn('MOTORISATION', 'Motorisation', 'VARCHAR', false, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('TblVoiture', 'TblVoiture', RelationMap::ONE_TO_MANY, array('id_motorisation' => 'id_motorisation', ), null, null, 'TblVoitures');
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

} // RefMotorisationTableMap
