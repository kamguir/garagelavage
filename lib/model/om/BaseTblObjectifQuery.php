<?php


/**
 * Base class that represents a query for the 'tbl_objectif' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 03/23/14 17:30:03
 *
 * @method     TblObjectifQuery orderByIdObjectif($order = Criteria::ASC) Order by the id_objectif column
 * @method     TblObjectifQuery orderByObjectifDate($order = Criteria::ASC) Order by the objectif_date column
 * @method     TblObjectifQuery orderByObjectifFixe($order = Criteria::ASC) Order by the objectif_fixe column
 * @method     TblObjectifQuery orderByObjectifRealise($order = Criteria::ASC) Order by the objectif_realise column
 *
 * @method     TblObjectifQuery groupByIdObjectif() Group by the id_objectif column
 * @method     TblObjectifQuery groupByObjectifDate() Group by the objectif_date column
 * @method     TblObjectifQuery groupByObjectifFixe() Group by the objectif_fixe column
 * @method     TblObjectifQuery groupByObjectifRealise() Group by the objectif_realise column
 *
 * @method     TblObjectifQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TblObjectifQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TblObjectifQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TblObjectif findOne(PropelPDO $con = null) Return the first TblObjectif matching the query
 * @method     TblObjectif findOneOrCreate(PropelPDO $con = null) Return the first TblObjectif matching the query, or a new TblObjectif object populated from the query conditions when no match is found
 *
 * @method     TblObjectif findOneByIdObjectif(int $id_objectif) Return the first TblObjectif filtered by the id_objectif column
 * @method     TblObjectif findOneByObjectifDate(string $objectif_date) Return the first TblObjectif filtered by the objectif_date column
 * @method     TblObjectif findOneByObjectifFixe(int $objectif_fixe) Return the first TblObjectif filtered by the objectif_fixe column
 * @method     TblObjectif findOneByObjectifRealise(int $objectif_realise) Return the first TblObjectif filtered by the objectif_realise column
 *
 * @method     array findByIdObjectif(int $id_objectif) Return TblObjectif objects filtered by the id_objectif column
 * @method     array findByObjectifDate(string $objectif_date) Return TblObjectif objects filtered by the objectif_date column
 * @method     array findByObjectifFixe(int $objectif_fixe) Return TblObjectif objects filtered by the objectif_fixe column
 * @method     array findByObjectifRealise(int $objectif_realise) Return TblObjectif objects filtered by the objectif_realise column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTblObjectifQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTblObjectifQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TblObjectif', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TblObjectifQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TblObjectifQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TblObjectifQuery) {
			return $criteria;
		}
		$query = new TblObjectifQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    TblObjectif|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TblObjectifPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TblObjectifPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    TblObjectif A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_OBJECTIF`, `OBJECTIF_DATE`, `OBJECTIF_FIXE`, `OBJECTIF_REALISE` FROM `tbl_objectif` WHERE `ID_OBJECTIF` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new TblObjectif();
			$obj->hydrate($row);
			TblObjectifPeer::addInstanceToPool($obj, (string) $key);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    TblObjectif|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    TblObjectifQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TblObjectifPeer::ID_OBJECTIF, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TblObjectifQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TblObjectifPeer::ID_OBJECTIF, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_objectif column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdObjectif(1234); // WHERE id_objectif = 1234
	 * $query->filterByIdObjectif(array(12, 34)); // WHERE id_objectif IN (12, 34)
	 * $query->filterByIdObjectif(array('min' => 12)); // WHERE id_objectif > 12
	 * </code>
	 *
	 * @param     mixed $idObjectif The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblObjectifQuery The current query, for fluid interface
	 */
	public function filterByIdObjectif($idObjectif = null, $comparison = null)
	{
		if (is_array($idObjectif) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TblObjectifPeer::ID_OBJECTIF, $idObjectif, $comparison);
	}

	/**
	 * Filter the query on the objectif_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjectifDate('2011-03-14'); // WHERE objectif_date = '2011-03-14'
	 * $query->filterByObjectifDate('now'); // WHERE objectif_date = '2011-03-14'
	 * $query->filterByObjectifDate(array('max' => 'yesterday')); // WHERE objectif_date > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $objectifDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblObjectifQuery The current query, for fluid interface
	 */
	public function filterByObjectifDate($objectifDate = null, $comparison = null)
	{
		if (is_array($objectifDate)) {
			$useMinMax = false;
			if (isset($objectifDate['min'])) {
				$this->addUsingAlias(TblObjectifPeer::OBJECTIF_DATE, $objectifDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($objectifDate['max'])) {
				$this->addUsingAlias(TblObjectifPeer::OBJECTIF_DATE, $objectifDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblObjectifPeer::OBJECTIF_DATE, $objectifDate, $comparison);
	}

	/**
	 * Filter the query on the objectif_fixe column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjectifFixe(1234); // WHERE objectif_fixe = 1234
	 * $query->filterByObjectifFixe(array(12, 34)); // WHERE objectif_fixe IN (12, 34)
	 * $query->filterByObjectifFixe(array('min' => 12)); // WHERE objectif_fixe > 12
	 * </code>
	 *
	 * @param     mixed $objectifFixe The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblObjectifQuery The current query, for fluid interface
	 */
	public function filterByObjectifFixe($objectifFixe = null, $comparison = null)
	{
		if (is_array($objectifFixe)) {
			$useMinMax = false;
			if (isset($objectifFixe['min'])) {
				$this->addUsingAlias(TblObjectifPeer::OBJECTIF_FIXE, $objectifFixe['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($objectifFixe['max'])) {
				$this->addUsingAlias(TblObjectifPeer::OBJECTIF_FIXE, $objectifFixe['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblObjectifPeer::OBJECTIF_FIXE, $objectifFixe, $comparison);
	}

	/**
	 * Filter the query on the objectif_realise column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjectifRealise(1234); // WHERE objectif_realise = 1234
	 * $query->filterByObjectifRealise(array(12, 34)); // WHERE objectif_realise IN (12, 34)
	 * $query->filterByObjectifRealise(array('min' => 12)); // WHERE objectif_realise > 12
	 * </code>
	 *
	 * @param     mixed $objectifRealise The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblObjectifQuery The current query, for fluid interface
	 */
	public function filterByObjectifRealise($objectifRealise = null, $comparison = null)
	{
		if (is_array($objectifRealise)) {
			$useMinMax = false;
			if (isset($objectifRealise['min'])) {
				$this->addUsingAlias(TblObjectifPeer::OBJECTIF_REALISE, $objectifRealise['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($objectifRealise['max'])) {
				$this->addUsingAlias(TblObjectifPeer::OBJECTIF_REALISE, $objectifRealise['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblObjectifPeer::OBJECTIF_REALISE, $objectifRealise, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TblObjectif $tblObjectif Object to remove from the list of results
	 *
	 * @return    TblObjectifQuery The current query, for fluid interface
	 */
	public function prune($tblObjectif = null)
	{
		if ($tblObjectif) {
			$this->addUsingAlias(TblObjectifPeer::ID_OBJECTIF, $tblObjectif->getIdObjectif(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTblObjectifQuery