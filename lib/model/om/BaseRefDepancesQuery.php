<?php


/**
 * Base class that represents a query for the 'ref_depances' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 11/22/13 16:57:11
 *
 * @method     RefDepancesQuery orderByIdRefDepances($order = Criteria::ASC) Order by the id_ref_depances column
 * @method     RefDepancesQuery orderByLibelleDepances($order = Criteria::ASC) Order by the libelle_depances column
 *
 * @method     RefDepancesQuery groupByIdRefDepances() Group by the id_ref_depances column
 * @method     RefDepancesQuery groupByLibelleDepances() Group by the libelle_depances column
 *
 * @method     RefDepancesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RefDepancesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RefDepancesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RefDepancesQuery leftJoinTblDepances($relationAlias = null) Adds a LEFT JOIN clause to the query using the TblDepances relation
 * @method     RefDepancesQuery rightJoinTblDepances($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TblDepances relation
 * @method     RefDepancesQuery innerJoinTblDepances($relationAlias = null) Adds a INNER JOIN clause to the query using the TblDepances relation
 *
 * @method     RefDepances findOne(PropelPDO $con = null) Return the first RefDepances matching the query
 * @method     RefDepances findOneOrCreate(PropelPDO $con = null) Return the first RefDepances matching the query, or a new RefDepances object populated from the query conditions when no match is found
 *
 * @method     RefDepances findOneByIdRefDepances(int $id_ref_depances) Return the first RefDepances filtered by the id_ref_depances column
 * @method     RefDepances findOneByLibelleDepances(string $libelle_depances) Return the first RefDepances filtered by the libelle_depances column
 *
 * @method     array findByIdRefDepances(int $id_ref_depances) Return RefDepances objects filtered by the id_ref_depances column
 * @method     array findByLibelleDepances(string $libelle_depances) Return RefDepances objects filtered by the libelle_depances column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRefDepancesQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRefDepancesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'RefDepances', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RefDepancesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RefDepancesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RefDepancesQuery) {
			return $criteria;
		}
		$query = new RefDepancesQuery();
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
	 * @return    RefDepances|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RefDepancesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RefDepancesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RefDepances A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_REF_DEPANCES`, `LIBELLE_DEPANCES` FROM `ref_depances` WHERE `ID_REF_DEPANCES` = :p0';
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
			$obj = new RefDepances();
			$obj->hydrate($row);
			RefDepancesPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    RefDepances|array|mixed the result, formatted by the current formatter
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
	 * @return    RefDepancesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RefDepancesPeer::ID_REF_DEPANCES, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RefDepancesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RefDepancesPeer::ID_REF_DEPANCES, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_ref_depances column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdRefDepances(1234); // WHERE id_ref_depances = 1234
	 * $query->filterByIdRefDepances(array(12, 34)); // WHERE id_ref_depances IN (12, 34)
	 * $query->filterByIdRefDepances(array('min' => 12)); // WHERE id_ref_depances > 12
	 * </code>
	 *
	 * @param     mixed $idRefDepances The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefDepancesQuery The current query, for fluid interface
	 */
	public function filterByIdRefDepances($idRefDepances = null, $comparison = null)
	{
		if (is_array($idRefDepances) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RefDepancesPeer::ID_REF_DEPANCES, $idRefDepances, $comparison);
	}

	/**
	 * Filter the query on the libelle_depances column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLibelleDepances('fooValue');   // WHERE libelle_depances = 'fooValue'
	 * $query->filterByLibelleDepances('%fooValue%'); // WHERE libelle_depances LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $libelleDepances The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefDepancesQuery The current query, for fluid interface
	 */
	public function filterByLibelleDepances($libelleDepances = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($libelleDepances)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $libelleDepances)) {
				$libelleDepances = str_replace('*', '%', $libelleDepances);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RefDepancesPeer::LIBELLE_DEPANCES, $libelleDepances, $comparison);
	}

	/**
	 * Filter the query by a related TblDepances object
	 *
	 * @param     TblDepances $tblDepances  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefDepancesQuery The current query, for fluid interface
	 */
	public function filterByTblDepances($tblDepances, $comparison = null)
	{
		if ($tblDepances instanceof TblDepances) {
			return $this
				->addUsingAlias(RefDepancesPeer::ID_REF_DEPANCES, $tblDepances->getIdRefDepances(), $comparison);
		} elseif ($tblDepances instanceof PropelCollection) {
			return $this
				->useTblDepancesQuery()
				->filterByPrimaryKeys($tblDepances->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByTblDepances() only accepts arguments of type TblDepances or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TblDepances relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RefDepancesQuery The current query, for fluid interface
	 */
	public function joinTblDepances($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TblDepances');

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
			$this->addJoinObject($join, 'TblDepances');
		}

		return $this;
	}

	/**
	 * Use the TblDepances relation TblDepances object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TblDepancesQuery A secondary query class using the current class as primary query
	 */
	public function useTblDepancesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTblDepances($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TblDepances', 'TblDepancesQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RefDepances $refDepances Object to remove from the list of results
	 *
	 * @return    RefDepancesQuery The current query, for fluid interface
	 */
	public function prune($refDepances = null)
	{
		if ($refDepances) {
			$this->addUsingAlias(RefDepancesPeer::ID_REF_DEPANCES, $refDepances->getIdRefDepances(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRefDepancesQuery