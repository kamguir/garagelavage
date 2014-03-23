<?php


/**
 * Base class that represents a query for the 'ref_nbr_portes' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 03/21/14 17:07:50
 *
 * @method     RefNbrPortesQuery orderByIdNbrPortes($order = Criteria::ASC) Order by the id_nbr_portes column
 * @method     RefNbrPortesQuery orderByLibelletNbrPortes($order = Criteria::ASC) Order by the libellet_nbr_portes column
 *
 * @method     RefNbrPortesQuery groupByIdNbrPortes() Group by the id_nbr_portes column
 * @method     RefNbrPortesQuery groupByLibelletNbrPortes() Group by the libellet_nbr_portes column
 *
 * @method     RefNbrPortesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RefNbrPortesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RefNbrPortesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RefNbrPortesQuery leftJoinTblVoiture($relationAlias = null) Adds a LEFT JOIN clause to the query using the TblVoiture relation
 * @method     RefNbrPortesQuery rightJoinTblVoiture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TblVoiture relation
 * @method     RefNbrPortesQuery innerJoinTblVoiture($relationAlias = null) Adds a INNER JOIN clause to the query using the TblVoiture relation
 *
 * @method     RefNbrPortes findOne(PropelPDO $con = null) Return the first RefNbrPortes matching the query
 * @method     RefNbrPortes findOneOrCreate(PropelPDO $con = null) Return the first RefNbrPortes matching the query, or a new RefNbrPortes object populated from the query conditions when no match is found
 *
 * @method     RefNbrPortes findOneByIdNbrPortes(int $id_nbr_portes) Return the first RefNbrPortes filtered by the id_nbr_portes column
 * @method     RefNbrPortes findOneByLibelletNbrPortes(string $libellet_nbr_portes) Return the first RefNbrPortes filtered by the libellet_nbr_portes column
 *
 * @method     array findByIdNbrPortes(int $id_nbr_portes) Return RefNbrPortes objects filtered by the id_nbr_portes column
 * @method     array findByLibelletNbrPortes(string $libellet_nbr_portes) Return RefNbrPortes objects filtered by the libellet_nbr_portes column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRefNbrPortesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRefNbrPortesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'RefNbrPortes', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RefNbrPortesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RefNbrPortesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RefNbrPortesQuery) {
			return $criteria;
		}
		$query = new RefNbrPortesQuery();
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
	 * @return    RefNbrPortes|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RefNbrPortesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RefNbrPortesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RefNbrPortes A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_NBR_PORTES`, `LIBELLET_NBR_PORTES` FROM `ref_nbr_portes` WHERE `ID_NBR_PORTES` = :p0';
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
			$obj = new RefNbrPortes();
			$obj->hydrate($row);
			RefNbrPortesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    RefNbrPortes|array|mixed the result, formatted by the current formatter
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
	 * @return    RefNbrPortesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RefNbrPortesPeer::ID_NBR_PORTES, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RefNbrPortesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RefNbrPortesPeer::ID_NBR_PORTES, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_nbr_portes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdNbrPortes(1234); // WHERE id_nbr_portes = 1234
	 * $query->filterByIdNbrPortes(array(12, 34)); // WHERE id_nbr_portes IN (12, 34)
	 * $query->filterByIdNbrPortes(array('min' => 12)); // WHERE id_nbr_portes > 12
	 * </code>
	 *
	 * @param     mixed $idNbrPortes The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefNbrPortesQuery The current query, for fluid interface
	 */
	public function filterByIdNbrPortes($idNbrPortes = null, $comparison = null)
	{
		if (is_array($idNbrPortes) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RefNbrPortesPeer::ID_NBR_PORTES, $idNbrPortes, $comparison);
	}

	/**
	 * Filter the query on the libellet_nbr_portes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLibelletNbrPortes('fooValue');   // WHERE libellet_nbr_portes = 'fooValue'
	 * $query->filterByLibelletNbrPortes('%fooValue%'); // WHERE libellet_nbr_portes LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $libelletNbrPortes The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefNbrPortesQuery The current query, for fluid interface
	 */
	public function filterByLibelletNbrPortes($libelletNbrPortes = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($libelletNbrPortes)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $libelletNbrPortes)) {
				$libelletNbrPortes = str_replace('*', '%', $libelletNbrPortes);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RefNbrPortesPeer::LIBELLET_NBR_PORTES, $libelletNbrPortes, $comparison);
	}

	/**
	 * Filter the query by a related TblVoiture object
	 *
	 * @param     TblVoiture $tblVoiture  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefNbrPortesQuery The current query, for fluid interface
	 */
	public function filterByTblVoiture($tblVoiture, $comparison = null)
	{
		if ($tblVoiture instanceof TblVoiture) {
			return $this
				->addUsingAlias(RefNbrPortesPeer::ID_NBR_PORTES, $tblVoiture->getNbrPortes(), $comparison);
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
	 * @return    RefNbrPortesQuery The current query, for fluid interface
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
	 * @param     RefNbrPortes $refNbrPortes Object to remove from the list of results
	 *
	 * @return    RefNbrPortesQuery The current query, for fluid interface
	 */
	public function prune($refNbrPortes = null)
	{
		if ($refNbrPortes) {
			$this->addUsingAlias(RefNbrPortesPeer::ID_NBR_PORTES, $refNbrPortes->getIdNbrPortes(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRefNbrPortesQuery