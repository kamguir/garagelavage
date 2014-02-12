<?php


/**
 * Base class that represents a query for the 'ref_marque' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 01/09/14 10:18:28
 *
 * @method     RefMarqueQuery orderByMarqueId($order = Criteria::ASC) Order by the marque_id column
 * @method     RefMarqueQuery orderByMarqueLibelle($order = Criteria::ASC) Order by the marque_libelle column
 *
 * @method     RefMarqueQuery groupByMarqueId() Group by the marque_id column
 * @method     RefMarqueQuery groupByMarqueLibelle() Group by the marque_libelle column
 *
 * @method     RefMarqueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RefMarqueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RefMarqueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RefMarqueQuery leftJoinTblVoiture($relationAlias = null) Adds a LEFT JOIN clause to the query using the TblVoiture relation
 * @method     RefMarqueQuery rightJoinTblVoiture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TblVoiture relation
 * @method     RefMarqueQuery innerJoinTblVoiture($relationAlias = null) Adds a INNER JOIN clause to the query using the TblVoiture relation
 *
 * @method     RefMarque findOne(PropelPDO $con = null) Return the first RefMarque matching the query
 * @method     RefMarque findOneOrCreate(PropelPDO $con = null) Return the first RefMarque matching the query, or a new RefMarque object populated from the query conditions when no match is found
 *
 * @method     RefMarque findOneByMarqueId(int $marque_id) Return the first RefMarque filtered by the marque_id column
 * @method     RefMarque findOneByMarqueLibelle(string $marque_libelle) Return the first RefMarque filtered by the marque_libelle column
 *
 * @method     array findByMarqueId(int $marque_id) Return RefMarque objects filtered by the marque_id column
 * @method     array findByMarqueLibelle(string $marque_libelle) Return RefMarque objects filtered by the marque_libelle column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRefMarqueQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRefMarqueQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'RefMarque', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RefMarqueQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RefMarqueQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RefMarqueQuery) {
			return $criteria;
		}
		$query = new RefMarqueQuery();
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
	 * @return    RefMarque|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RefMarquePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RefMarquePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RefMarque A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `MARQUE_ID`, `MARQUE_LIBELLE` FROM `ref_marque` WHERE `MARQUE_ID` = :p0';
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
			$obj = new RefMarque();
			$obj->hydrate($row);
			RefMarquePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    RefMarque|array|mixed the result, formatted by the current formatter
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
	 * @return    RefMarqueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RefMarquePeer::MARQUE_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RefMarqueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RefMarquePeer::MARQUE_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the marque_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMarqueId(1234); // WHERE marque_id = 1234
	 * $query->filterByMarqueId(array(12, 34)); // WHERE marque_id IN (12, 34)
	 * $query->filterByMarqueId(array('min' => 12)); // WHERE marque_id > 12
	 * </code>
	 *
	 * @param     mixed $marqueId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefMarqueQuery The current query, for fluid interface
	 */
	public function filterByMarqueId($marqueId = null, $comparison = null)
	{
		if (is_array($marqueId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RefMarquePeer::MARQUE_ID, $marqueId, $comparison);
	}

	/**
	 * Filter the query on the marque_libelle column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMarqueLibelle('fooValue');   // WHERE marque_libelle = 'fooValue'
	 * $query->filterByMarqueLibelle('%fooValue%'); // WHERE marque_libelle LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $marqueLibelle The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefMarqueQuery The current query, for fluid interface
	 */
	public function filterByMarqueLibelle($marqueLibelle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($marqueLibelle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $marqueLibelle)) {
				$marqueLibelle = str_replace('*', '%', $marqueLibelle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RefMarquePeer::MARQUE_LIBELLE, $marqueLibelle, $comparison);
	}

	/**
	 * Filter the query by a related TblVoiture object
	 *
	 * @param     TblVoiture $tblVoiture  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefMarqueQuery The current query, for fluid interface
	 */
	public function filterByTblVoiture($tblVoiture, $comparison = null)
	{
		if ($tblVoiture instanceof TblVoiture) {
			return $this
				->addUsingAlias(RefMarquePeer::MARQUE_ID, $tblVoiture->getIdMarque(), $comparison);
		} elseif ($tblVoiture instanceof PropelCollection) {
			return $this
				->useTblVoitureQuery()
				->filterByPrimaryKeys($tblVoiture->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByTblVoiture() only accepts arguments of type TblVoiture or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TblVoiture relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RefMarqueQuery The current query, for fluid interface
	 */
	public function joinTblVoiture($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TblVoiture');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'TblVoiture');
		}

		return $this;
	}

	/**
	 * Use the TblVoiture relation TblVoiture object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TblVoitureQuery A secondary query class using the current class as primary query
	 */
	public function useTblVoitureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTblVoiture($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TblVoiture', 'TblVoitureQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RefMarque $refMarque Object to remove from the list of results
	 *
	 * @return    RefMarqueQuery The current query, for fluid interface
	 */
	public function prune($refMarque = null)
	{
		if ($refMarque) {
			$this->addUsingAlias(RefMarquePeer::MARQUE_ID, $refMarque->getMarqueId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRefMarqueQuery