<?php


/**
 * Base class that represents a row from the 'tbl_tapis' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 01/09/14 10:18:29
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTblTapis extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'TblTapisPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        TblTapisPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the num_tapis field.
	 * @var        int
	 */
	protected $num_tapis;

	/**
	 * The value for the taille_tapis field.
	 * @var        int
	 */
	protected $taille_tapis;

	/**
	 * The value for the prix_mettre_carre field.
	 * Note: this column has a database default value of: 15
	 * @var        double
	 */
	protected $prix_mettre_carre;

	/**
	 * The value for the montant_lavage_tapis field.
	 * @var        double
	 */
	protected $montant_lavage_tapis;

	/**
	 * The value for the date_lavage_tapis field.
	 * @var        string
	 */
	protected $date_lavage_tapis;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->prix_mettre_carre = 15;
	}

	/**
	 * Initializes internal state of BaseTblTapis object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [num_tapis] column value.
	 * 
	 * @return     int
	 */
	public function getNumTapis()
	{
		return $this->num_tapis;
	}

	/**
	 * Get the [taille_tapis] column value.
	 * 
	 * @return     int
	 */
	public function getTailleTapis()
	{
		return $this->taille_tapis;
	}

	/**
	 * Get the [prix_mettre_carre] column value.
	 * 
	 * @return     double
	 */
	public function getPrixMettreCarre()
	{
		return $this->prix_mettre_carre;
	}

	/**
	 * Get the [montant_lavage_tapis] column value.
	 * 
	 * @return     double
	 */
	public function getMontantLavageTapis()
	{
		return $this->montant_lavage_tapis;
	}

	/**
	 * Get the [optionally formatted] temporal [date_lavage_tapis] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateLavageTapis($format = 'Y-m-d H:i:s')
	{
		if ($this->date_lavage_tapis === null) {
			return null;
		}


		if ($this->date_lavage_tapis === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_lavage_tapis);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_lavage_tapis, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [num_tapis] column.
	 * 
	 * @param      int $v new value
	 * @return     TblTapis The current object (for fluent API support)
	 */
	public function setNumTapis($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->num_tapis !== $v) {
			$this->num_tapis = $v;
			$this->modifiedColumns[] = TblTapisPeer::NUM_TAPIS;
		}

		return $this;
	} // setNumTapis()

	/**
	 * Set the value of [taille_tapis] column.
	 * 
	 * @param      int $v new value
	 * @return     TblTapis The current object (for fluent API support)
	 */
	public function setTailleTapis($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->taille_tapis !== $v) {
			$this->taille_tapis = $v;
			$this->modifiedColumns[] = TblTapisPeer::TAILLE_TAPIS;
		}

		return $this;
	} // setTailleTapis()

	/**
	 * Set the value of [prix_mettre_carre] column.
	 * 
	 * @param      double $v new value
	 * @return     TblTapis The current object (for fluent API support)
	 */
	public function setPrixMettreCarre($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->prix_mettre_carre !== $v) {
			$this->prix_mettre_carre = $v;
			$this->modifiedColumns[] = TblTapisPeer::PRIX_METTRE_CARRE;
		}

		return $this;
	} // setPrixMettreCarre()

	/**
	 * Set the value of [montant_lavage_tapis] column.
	 * 
	 * @param      double $v new value
	 * @return     TblTapis The current object (for fluent API support)
	 */
	public function setMontantLavageTapis($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->montant_lavage_tapis !== $v) {
			$this->montant_lavage_tapis = $v;
			$this->modifiedColumns[] = TblTapisPeer::MONTANT_LAVAGE_TAPIS;
		}

		return $this;
	} // setMontantLavageTapis()

	/**
	 * Sets the value of [date_lavage_tapis] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     TblTapis The current object (for fluent API support)
	 */
	public function setDateLavageTapis($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->date_lavage_tapis !== null || $dt !== null) {
			$currentDateAsString = ($this->date_lavage_tapis !== null && $tmpDt = new DateTime($this->date_lavage_tapis)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->date_lavage_tapis = $newDateAsString;
				$this->modifiedColumns[] = TblTapisPeer::DATE_LAVAGE_TAPIS;
			}
		} // if either are not null

		return $this;
	} // setDateLavageTapis()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->prix_mettre_carre !== 15) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->num_tapis = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->taille_tapis = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->prix_mettre_carre = ($row[$startcol + 2] !== null) ? (double) $row[$startcol + 2] : null;
			$this->montant_lavage_tapis = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
			$this->date_lavage_tapis = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = TblTapisPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating TblTapis object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TblTapisPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = TblTapisPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TblTapisPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = TblTapisQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseTblTapis:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseTblTapis:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TblTapisPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseTblTapis:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseTblTapis:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				TblTapisPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = TblTapisPeer::NUM_TAPIS;
		if (null !== $this->num_tapis) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . TblTapisPeer::NUM_TAPIS . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(TblTapisPeer::NUM_TAPIS)) {
			$modifiedColumns[':p' . $index++]  = '`NUM_TAPIS`';
		}
		if ($this->isColumnModified(TblTapisPeer::TAILLE_TAPIS)) {
			$modifiedColumns[':p' . $index++]  = '`TAILLE_TAPIS`';
		}
		if ($this->isColumnModified(TblTapisPeer::PRIX_METTRE_CARRE)) {
			$modifiedColumns[':p' . $index++]  = '`PRIX_METTRE_CARRE`';
		}
		if ($this->isColumnModified(TblTapisPeer::MONTANT_LAVAGE_TAPIS)) {
			$modifiedColumns[':p' . $index++]  = '`MONTANT_LAVAGE_TAPIS`';
		}
		if ($this->isColumnModified(TblTapisPeer::DATE_LAVAGE_TAPIS)) {
			$modifiedColumns[':p' . $index++]  = '`DATE_LAVAGE_TAPIS`';
		}

		$sql = sprintf(
			'INSERT INTO `tbl_tapis` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`NUM_TAPIS`':
						$stmt->bindValue($identifier, $this->num_tapis, PDO::PARAM_INT);
						break;
					case '`TAILLE_TAPIS`':
						$stmt->bindValue($identifier, $this->taille_tapis, PDO::PARAM_INT);
						break;
					case '`PRIX_METTRE_CARRE`':
						$stmt->bindValue($identifier, $this->prix_mettre_carre, PDO::PARAM_STR);
						break;
					case '`MONTANT_LAVAGE_TAPIS`':
						$stmt->bindValue($identifier, $this->montant_lavage_tapis, PDO::PARAM_STR);
						break;
					case '`DATE_LAVAGE_TAPIS`':
						$stmt->bindValue($identifier, $this->date_lavage_tapis, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setNumTapis($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = TblTapisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TblTapisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumTapis();
				break;
			case 1:
				return $this->getTailleTapis();
				break;
			case 2:
				return $this->getPrixMettreCarre();
				break;
			case 3:
				return $this->getMontantLavageTapis();
				break;
			case 4:
				return $this->getDateLavageTapis();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
	{
		if (isset($alreadyDumpedObjects['TblTapis'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['TblTapis'][$this->getPrimaryKey()] = true;
		$keys = TblTapisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumTapis(),
			$keys[1] => $this->getTailleTapis(),
			$keys[2] => $this->getPrixMettreCarre(),
			$keys[3] => $this->getMontantLavageTapis(),
			$keys[4] => $this->getDateLavageTapis(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TblTapisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumTapis($value);
				break;
			case 1:
				$this->setTailleTapis($value);
				break;
			case 2:
				$this->setPrixMettreCarre($value);
				break;
			case 3:
				$this->setMontantLavageTapis($value);
				break;
			case 4:
				$this->setDateLavageTapis($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TblTapisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumTapis($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTailleTapis($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrixMettreCarre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMontantLavageTapis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDateLavageTapis($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TblTapisPeer::DATABASE_NAME);

		if ($this->isColumnModified(TblTapisPeer::NUM_TAPIS)) $criteria->add(TblTapisPeer::NUM_TAPIS, $this->num_tapis);
		if ($this->isColumnModified(TblTapisPeer::TAILLE_TAPIS)) $criteria->add(TblTapisPeer::TAILLE_TAPIS, $this->taille_tapis);
		if ($this->isColumnModified(TblTapisPeer::PRIX_METTRE_CARRE)) $criteria->add(TblTapisPeer::PRIX_METTRE_CARRE, $this->prix_mettre_carre);
		if ($this->isColumnModified(TblTapisPeer::MONTANT_LAVAGE_TAPIS)) $criteria->add(TblTapisPeer::MONTANT_LAVAGE_TAPIS, $this->montant_lavage_tapis);
		if ($this->isColumnModified(TblTapisPeer::DATE_LAVAGE_TAPIS)) $criteria->add(TblTapisPeer::DATE_LAVAGE_TAPIS, $this->date_lavage_tapis);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TblTapisPeer::DATABASE_NAME);
		$criteria->add(TblTapisPeer::NUM_TAPIS, $this->num_tapis);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getNumTapis();
	}

	/**
	 * Generic method to set the primary key (num_tapis column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setNumTapis($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getNumTapis();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of TblTapis (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setTailleTapis($this->getTailleTapis());
		$copyObj->setPrixMettreCarre($this->getPrixMettreCarre());
		$copyObj->setMontantLavageTapis($this->getMontantLavageTapis());
		$copyObj->setDateLavageTapis($this->getDateLavageTapis());
		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setNumTapis(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     TblTapis Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     TblTapisPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TblTapisPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->num_tapis = null;
		$this->taille_tapis = null;
		$this->prix_mettre_carre = null;
		$this->montant_lavage_tapis = null;
		$this->date_lavage_tapis = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(TblTapisPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseTblTapis:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseTblTapis
