<?php


/**
 * Base class that represents a row from the 'tbl_employeur' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 03/23/14 17:30:03
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTblEmployeur extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'TblEmployeurPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        TblEmployeurPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id_employeur field.
	 * @var        int
	 */
	protected $id_employeur;

	/**
	 * The value for the nom_employeur field.
	 * @var        string
	 */
	protected $nom_employeur;

	/**
	 * The value for the prenom_employeur field.
	 * @var        string
	 */
	protected $prenom_employeur;

	/**
	 * The value for the nom_societe field.
	 * @var        string
	 */
	protected $nom_societe;

	/**
	 * The value for the num_telephone_employeur field.
	 * @var        string
	 */
	protected $num_telephone_employeur;

	/**
	 * The value for the adresse_societe field.
	 * @var        string
	 */
	protected $adresse_societe;

	/**
	 * The value for the ville_societe field.
	 * @var        string
	 */
	protected $ville_societe;

	/**
	 * The value for the adresse_email field.
	 * @var        string
	 */
	protected $adresse_email;

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
	 * Get the [id_employeur] column value.
	 * 
	 * @return     int
	 */
	public function getIdEmployeur()
	{
		return $this->id_employeur;
	}

	/**
	 * Get the [nom_employeur] column value.
	 * 
	 * @return     string
	 */
	public function getNomEmployeur()
	{
		return $this->nom_employeur;
	}

	/**
	 * Get the [prenom_employeur] column value.
	 * 
	 * @return     string
	 */
	public function getPrenomEmployeur()
	{
		return $this->prenom_employeur;
	}

	/**
	 * Get the [nom_societe] column value.
	 * 
	 * @return     string
	 */
	public function getNomSociete()
	{
		return $this->nom_societe;
	}

	/**
	 * Get the [num_telephone_employeur] column value.
	 * 
	 * @return     string
	 */
	public function getNumTelephoneEmployeur()
	{
		return $this->num_telephone_employeur;
	}

	/**
	 * Get the [adresse_societe] column value.
	 * 
	 * @return     string
	 */
	public function getAdresseSociete()
	{
		return $this->adresse_societe;
	}

	/**
	 * Get the [ville_societe] column value.
	 * 
	 * @return     string
	 */
	public function getVilleSociete()
	{
		return $this->ville_societe;
	}

	/**
	 * Get the [adresse_email] column value.
	 * 
	 * @return     string
	 */
	public function getAdresseEmail()
	{
		return $this->adresse_email;
	}

	/**
	 * Set the value of [id_employeur] column.
	 * 
	 * @param      int $v new value
	 * @return     TblEmployeur The current object (for fluent API support)
	 */
	public function setIdEmployeur($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_employeur !== $v) {
			$this->id_employeur = $v;
			$this->modifiedColumns[] = TblEmployeurPeer::ID_EMPLOYEUR;
		}

		return $this;
	} // setIdEmployeur()

	/**
	 * Set the value of [nom_employeur] column.
	 * 
	 * @param      string $v new value
	 * @return     TblEmployeur The current object (for fluent API support)
	 */
	public function setNomEmployeur($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nom_employeur !== $v) {
			$this->nom_employeur = $v;
			$this->modifiedColumns[] = TblEmployeurPeer::NOM_EMPLOYEUR;
		}

		return $this;
	} // setNomEmployeur()

	/**
	 * Set the value of [prenom_employeur] column.
	 * 
	 * @param      string $v new value
	 * @return     TblEmployeur The current object (for fluent API support)
	 */
	public function setPrenomEmployeur($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->prenom_employeur !== $v) {
			$this->prenom_employeur = $v;
			$this->modifiedColumns[] = TblEmployeurPeer::PRENOM_EMPLOYEUR;
		}

		return $this;
	} // setPrenomEmployeur()

	/**
	 * Set the value of [nom_societe] column.
	 * 
	 * @param      string $v new value
	 * @return     TblEmployeur The current object (for fluent API support)
	 */
	public function setNomSociete($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nom_societe !== $v) {
			$this->nom_societe = $v;
			$this->modifiedColumns[] = TblEmployeurPeer::NOM_SOCIETE;
		}

		return $this;
	} // setNomSociete()

	/**
	 * Set the value of [num_telephone_employeur] column.
	 * 
	 * @param      string $v new value
	 * @return     TblEmployeur The current object (for fluent API support)
	 */
	public function setNumTelephoneEmployeur($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->num_telephone_employeur !== $v) {
			$this->num_telephone_employeur = $v;
			$this->modifiedColumns[] = TblEmployeurPeer::NUM_TELEPHONE_EMPLOYEUR;
		}

		return $this;
	} // setNumTelephoneEmployeur()

	/**
	 * Set the value of [adresse_societe] column.
	 * 
	 * @param      string $v new value
	 * @return     TblEmployeur The current object (for fluent API support)
	 */
	public function setAdresseSociete($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->adresse_societe !== $v) {
			$this->adresse_societe = $v;
			$this->modifiedColumns[] = TblEmployeurPeer::ADRESSE_SOCIETE;
		}

		return $this;
	} // setAdresseSociete()

	/**
	 * Set the value of [ville_societe] column.
	 * 
	 * @param      string $v new value
	 * @return     TblEmployeur The current object (for fluent API support)
	 */
	public function setVilleSociete($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ville_societe !== $v) {
			$this->ville_societe = $v;
			$this->modifiedColumns[] = TblEmployeurPeer::VILLE_SOCIETE;
		}

		return $this;
	} // setVilleSociete()

	/**
	 * Set the value of [adresse_email] column.
	 * 
	 * @param      string $v new value
	 * @return     TblEmployeur The current object (for fluent API support)
	 */
	public function setAdresseEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->adresse_email !== $v) {
			$this->adresse_email = $v;
			$this->modifiedColumns[] = TblEmployeurPeer::ADRESSE_EMAIL;
		}

		return $this;
	} // setAdresseEmail()

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

			$this->id_employeur = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nom_employeur = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->prenom_employeur = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->nom_societe = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->num_telephone_employeur = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->adresse_societe = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->ville_societe = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->adresse_email = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = TblEmployeurPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating TblEmployeur object", $e);
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
			$con = Propel::getConnection(TblEmployeurPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = TblEmployeurPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(TblEmployeurPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = TblEmployeurQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseTblEmployeur:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseTblEmployeur:delete:post') as $callable)
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
			$con = Propel::getConnection(TblEmployeurPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseTblEmployeur:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseTblEmployeur:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				TblEmployeurPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = TblEmployeurPeer::ID_EMPLOYEUR;
		if (null !== $this->id_employeur) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . TblEmployeurPeer::ID_EMPLOYEUR . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(TblEmployeurPeer::ID_EMPLOYEUR)) {
			$modifiedColumns[':p' . $index++]  = '`ID_EMPLOYEUR`';
		}
		if ($this->isColumnModified(TblEmployeurPeer::NOM_EMPLOYEUR)) {
			$modifiedColumns[':p' . $index++]  = '`NOM_EMPLOYEUR`';
		}
		if ($this->isColumnModified(TblEmployeurPeer::PRENOM_EMPLOYEUR)) {
			$modifiedColumns[':p' . $index++]  = '`PRENOM_EMPLOYEUR`';
		}
		if ($this->isColumnModified(TblEmployeurPeer::NOM_SOCIETE)) {
			$modifiedColumns[':p' . $index++]  = '`NOM_SOCIETE`';
		}
		if ($this->isColumnModified(TblEmployeurPeer::NUM_TELEPHONE_EMPLOYEUR)) {
			$modifiedColumns[':p' . $index++]  = '`NUM_TELEPHONE_EMPLOYEUR`';
		}
		if ($this->isColumnModified(TblEmployeurPeer::ADRESSE_SOCIETE)) {
			$modifiedColumns[':p' . $index++]  = '`ADRESSE_SOCIETE`';
		}
		if ($this->isColumnModified(TblEmployeurPeer::VILLE_SOCIETE)) {
			$modifiedColumns[':p' . $index++]  = '`VILLE_SOCIETE`';
		}
		if ($this->isColumnModified(TblEmployeurPeer::ADRESSE_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`ADRESSE_EMAIL`';
		}

		$sql = sprintf(
			'INSERT INTO `tbl_employeur` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID_EMPLOYEUR`':
						$stmt->bindValue($identifier, $this->id_employeur, PDO::PARAM_INT);
						break;
					case '`NOM_EMPLOYEUR`':
						$stmt->bindValue($identifier, $this->nom_employeur, PDO::PARAM_STR);
						break;
					case '`PRENOM_EMPLOYEUR`':
						$stmt->bindValue($identifier, $this->prenom_employeur, PDO::PARAM_STR);
						break;
					case '`NOM_SOCIETE`':
						$stmt->bindValue($identifier, $this->nom_societe, PDO::PARAM_STR);
						break;
					case '`NUM_TELEPHONE_EMPLOYEUR`':
						$stmt->bindValue($identifier, $this->num_telephone_employeur, PDO::PARAM_STR);
						break;
					case '`ADRESSE_SOCIETE`':
						$stmt->bindValue($identifier, $this->adresse_societe, PDO::PARAM_STR);
						break;
					case '`VILLE_SOCIETE`':
						$stmt->bindValue($identifier, $this->ville_societe, PDO::PARAM_STR);
						break;
					case '`ADRESSE_EMAIL`':
						$stmt->bindValue($identifier, $this->adresse_email, PDO::PARAM_STR);
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
		$this->setIdEmployeur($pk);

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


			if (($retval = TblEmployeurPeer::doValidate($this, $columns)) !== true) {
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
		$pos = TblEmployeurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdEmployeur();
				break;
			case 1:
				return $this->getNomEmployeur();
				break;
			case 2:
				return $this->getPrenomEmployeur();
				break;
			case 3:
				return $this->getNomSociete();
				break;
			case 4:
				return $this->getNumTelephoneEmployeur();
				break;
			case 5:
				return $this->getAdresseSociete();
				break;
			case 6:
				return $this->getVilleSociete();
				break;
			case 7:
				return $this->getAdresseEmail();
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
		if (isset($alreadyDumpedObjects['TblEmployeur'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['TblEmployeur'][$this->getPrimaryKey()] = true;
		$keys = TblEmployeurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdEmployeur(),
			$keys[1] => $this->getNomEmployeur(),
			$keys[2] => $this->getPrenomEmployeur(),
			$keys[3] => $this->getNomSociete(),
			$keys[4] => $this->getNumTelephoneEmployeur(),
			$keys[5] => $this->getAdresseSociete(),
			$keys[6] => $this->getVilleSociete(),
			$keys[7] => $this->getAdresseEmail(),
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
		$pos = TblEmployeurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdEmployeur($value);
				break;
			case 1:
				$this->setNomEmployeur($value);
				break;
			case 2:
				$this->setPrenomEmployeur($value);
				break;
			case 3:
				$this->setNomSociete($value);
				break;
			case 4:
				$this->setNumTelephoneEmployeur($value);
				break;
			case 5:
				$this->setAdresseSociete($value);
				break;
			case 6:
				$this->setVilleSociete($value);
				break;
			case 7:
				$this->setAdresseEmail($value);
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
		$keys = TblEmployeurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdEmployeur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomEmployeur($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrenomEmployeur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomSociete($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumTelephoneEmployeur($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdresseSociete($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setVilleSociete($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAdresseEmail($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TblEmployeurPeer::DATABASE_NAME);

		if ($this->isColumnModified(TblEmployeurPeer::ID_EMPLOYEUR)) $criteria->add(TblEmployeurPeer::ID_EMPLOYEUR, $this->id_employeur);
		if ($this->isColumnModified(TblEmployeurPeer::NOM_EMPLOYEUR)) $criteria->add(TblEmployeurPeer::NOM_EMPLOYEUR, $this->nom_employeur);
		if ($this->isColumnModified(TblEmployeurPeer::PRENOM_EMPLOYEUR)) $criteria->add(TblEmployeurPeer::PRENOM_EMPLOYEUR, $this->prenom_employeur);
		if ($this->isColumnModified(TblEmployeurPeer::NOM_SOCIETE)) $criteria->add(TblEmployeurPeer::NOM_SOCIETE, $this->nom_societe);
		if ($this->isColumnModified(TblEmployeurPeer::NUM_TELEPHONE_EMPLOYEUR)) $criteria->add(TblEmployeurPeer::NUM_TELEPHONE_EMPLOYEUR, $this->num_telephone_employeur);
		if ($this->isColumnModified(TblEmployeurPeer::ADRESSE_SOCIETE)) $criteria->add(TblEmployeurPeer::ADRESSE_SOCIETE, $this->adresse_societe);
		if ($this->isColumnModified(TblEmployeurPeer::VILLE_SOCIETE)) $criteria->add(TblEmployeurPeer::VILLE_SOCIETE, $this->ville_societe);
		if ($this->isColumnModified(TblEmployeurPeer::ADRESSE_EMAIL)) $criteria->add(TblEmployeurPeer::ADRESSE_EMAIL, $this->adresse_email);

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
		$criteria = new Criteria(TblEmployeurPeer::DATABASE_NAME);
		$criteria->add(TblEmployeurPeer::ID_EMPLOYEUR, $this->id_employeur);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdEmployeur();
	}

	/**
	 * Generic method to set the primary key (id_employeur column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdEmployeur($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdEmployeur();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of TblEmployeur (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNomEmployeur($this->getNomEmployeur());
		$copyObj->setPrenomEmployeur($this->getPrenomEmployeur());
		$copyObj->setNomSociete($this->getNomSociete());
		$copyObj->setNumTelephoneEmployeur($this->getNumTelephoneEmployeur());
		$copyObj->setAdresseSociete($this->getAdresseSociete());
		$copyObj->setVilleSociete($this->getVilleSociete());
		$copyObj->setAdresseEmail($this->getAdresseEmail());
		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setIdEmployeur(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     TblEmployeur Clone of current object.
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
	 * @return     TblEmployeurPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TblEmployeurPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id_employeur = null;
		$this->nom_employeur = null;
		$this->prenom_employeur = null;
		$this->nom_societe = null;
		$this->num_telephone_employeur = null;
		$this->adresse_societe = null;
		$this->ville_societe = null;
		$this->adresse_email = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
		return (string) $this->exportTo(TblEmployeurPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseTblEmployeur:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseTblEmployeur
