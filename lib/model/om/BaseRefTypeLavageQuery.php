<?php


/**
 * Base class that represents a query for the 'ref_type_lavage' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 03/05/14 22:48:04
 *
 * @method     RefTypeLavageQuery orderByIdTypeLavage($order = Criteria::ASC) Order by the id_type_lavage column
 * @method     RefTypeLavageQuery orderByLibelle($order = Criteria::ASC) Order by the libelle column
 * @method     RefTypeLavageQuery orderByMontantLavage($order = Criteria::ASC) Order by the montant_lavage column
 * @method     RefTypeLavageQuery orderByTimeLavage($order = Criteria::ASC) Order by the time_lavage column
 *
 * @method     RefTypeLavageQuery groupByIdTypeLavage() Group by the id_type_lavage column
 * @method     RefTypeLavageQuery groupByLibelle() Group by the libelle column
 * @method     RefTypeLavageQuery groupByMontantLavage() Group by the montant_lavage column
 * @method     RefTypeLavageQuery groupByTimeLavage() Group by the time_lavage column
 *
 * @method     RefTypeLavageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RefTypeLavageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RefTypeLavageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RefTypeLavageQuery leftJoinLnkTypeLavageFacture($relationAlias = null) Adds a LEFT JOIN clause to the query using the LnkTypeLavageFacture relation
 * @method     RefTypeLavageQuery rightJoinLnkTypeLavageFacture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LnkTypeLavageFacture relation
 * @method     RefTypeLavageQuery innerJoinLnkTypeLavageFacture($relationAlias = null) Adds a INNER JOIN clause to the query using the LnkTypeLavageFacture relation
 *
 * @method     RefTypeLavage findOne(PropelPDO $con = null) Return the first RefTypeLavage matching the query
 * @method     RefTypeLavage findOneOrCreate(PropelPDO $con = null) Return the first RefTypeLavage matching the query, or a new RefTypeLavage object populated from the query conditions when no match is found
 *
 * @method     RefTypeLavage findOneByIdTypeLavage(int $id_type_lavage) Return the first RefTypeLavage filtered by the id_type_lavage column
 * @method     RefTypeLavage findOneByLibelle(string $libelle) Return the first RefTypeLavage filtered by the libelle column
 * @method     RefTypeLavage findOneByMontantLavage(double $montant_lavage) Return the first RefTypeLavage filtered by the montant_lavage column
 * @method     RefTypeLavage findOneByTimeLavage(string $time_lavage) Return the first RefTypeLavage filtered by the time_lavage column
 *
 * @method     array findByIdTypeLavage(int $id_type_lavage) Return RefTypeLavage objects filtered by the id_type_lavage column
 * @method     array findByLibelle(string $libelle) Return RefTypeLavage objects filtered by the libelle column
 * @method     array findByMontantLavage(double $montant_lavage) Return RefTypeLavage objects filtered by the montant_lavage column
 * @method     array findByTimeLavage(string $time_lavage) Return RefTypeLavage objects filtered by the time_lavage column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRefTypeLavageQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRefTypeLavageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'RefTypeLavage', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RefTypeLavageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RefTypeLavageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RefTypeLavageQuery) {
			return $criteria;
		}
		$query = new RefTypeLavageQuery();
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
	 * @return    RefTypeLavage|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RefTypeLavagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RefTypeLavagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RefTypeLavage A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_TYPE_LAVAGE`, `LIBELLE`, `MONTANT_LAVAGE`, `TIME_LAVAGE` FROM `ref_type_lavage` WHERE `ID_TYPE_LAVAGE` = :p0';
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
			$obj = new RefTypeLavage();
			$obj->hydrate($row);
			RefTypeLavagePeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    RefTypeLavage|array|mixed the result, formatted by the current formatter
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
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RefTypeLavagePeer::ID_TYPE_LAVAGE, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RefTypeLavagePeer::ID_TYPE_LAVAGE, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_type_lavage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdTypeLavage(1234); // WHERE id_type_lavage = 1234
	 * $query->filterByIdTypeLavage(array(12, 34)); // WHERE id_type_lavage IN (12, 34)
	 * $query->filterByIdTypeLavage(array('min' => 12)); // WHERE id_type_lavage > 12
	 * </code>
	 *
	 * @param     mixed $idTypeLavage The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function filterByIdTypeLavage($idTypeLavage = null, $comparison = null)
	{
		if (is_array($idTypeLavage) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RefTypeLavagePeer::ID_TYPE_LAVAGE, $idTypeLavage, $comparison);
	}

	/**
	 * Filter the query on the libelle column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLibelle('fooValue');   // WHERE libelle = 'fooValue'
	 * $query->filterByLibelle('%fooValue%'); // WHERE libelle LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $libelle The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function filterByLibelle($libelle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($libelle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $libelle)) {
				$libelle = str_replace('*', '%', $libelle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RefTypeLavagePeer::LIBELLE, $libelle, $comparison);
	}

	/**
	 * Filter the query on the montant_lavage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMontantLavage(1234); // WHERE montant_lavage = 1234
	 * $query->filterByMontantLavage(array(12, 34)); // WHERE montant_lavage IN (12, 34)
	 * $query->filterByMontantLavage(array('min' => 12)); // WHERE montant_lavage > 12
	 * </code>
	 *
	 * @param     mixed $montantLavage The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function filterByMontantLavage($montantLavage = null, $comparison = null)
	{
		if (is_array($montantLavage)) {
			$useMinMax = false;
			if (isset($montantLavage['min'])) {
				$this->addUsingAlias(RefTypeLavagePeer::MONTANT_LAVAGE, $montantLavage['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($montantLavage['max'])) {
				$this->addUsingAlias(RefTypeLavagePeer::MONTANT_LAVAGE, $montantLavage['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RefTypeLavagePeer::MONTANT_LAVAGE, $montantLavage, $comparison);
	}

	/**
	 * Filter the query on the time_lavage column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTimeLavage('2011-03-14'); // WHERE time_lavage = '2011-03-14'
	 * $query->filterByTimeLavage('now'); // WHERE time_lavage = '2011-03-14'
	 * $query->filterByTimeLavage(array('max' => 'yesterday')); // WHERE time_lavage > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $timeLavage The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function filterByTimeLavage($timeLavage = null, $comparison = null)
	{
		if (is_array($timeLavage)) {
			$useMinMax = false;
			if (isset($timeLavage['min'])) {
				$this->addUsingAlias(RefTypeLavagePeer::TIME_LAVAGE, $timeLavage['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timeLavage['max'])) {
				$this->addUsingAlias(RefTypeLavagePeer::TIME_LAVAGE, $timeLavage['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RefTypeLavagePeer::TIME_LAVAGE, $timeLavage, $comparison);
	}

	/**
	 * Filter the query by a related LnkTypeLavageFacture object
	 *
	 * @param     LnkTypeLavageFacture $lnkTypeLavageFacture  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function filterByLnkTypeLavageFacture($lnkTypeLavageFacture, $comparison = null)
	{
		if ($lnkTypeLavageFacture instanceof LnkTypeLavageFacture) {
			return $this
				->addUsingAlias(RefTypeLavagePeer::ID_TYPE_LAVAGE, $lnkTypeLavageFacture->getIdTypeLavage(), $comparison);
		} elseif ($lnkTypeLavageFacture instanceof PropelCollection) {
			return $this
				->useLnkTypeLavageFactureQuery()
				->filterByPrimaryKeys($lnkTypeLavageFacture->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLnkTypeLavageFacture() only accepts arguments of type LnkTypeLavageFacture or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the LnkTypeLavageFacture relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function joinLnkTypeLavageFacture($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('LnkTypeLavageFacture');

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
			$this->addJoinObject($join, 'LnkTypeLavageFacture');
		}

		return $this;
	}

	/**
	 * Use the LnkTypeLavageFacture relation LnkTypeLavageFacture object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LnkTypeLavageFactureQuery A secondary query class using the current class as primary query
	 */
	public function useLnkTypeLavageFactureQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLnkTypeLavageFacture($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'LnkTypeLavageFacture', 'LnkTypeLavageFactureQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RefTypeLavage $refTypeLavage Object to remove from the list of results
	 *
	 * @return    RefTypeLavageQuery The current query, for fluid interface
	 */
	public function prune($refTypeLavage = null)
	{
		if ($refTypeLavage) {
			$this->addUsingAlias(RefTypeLavagePeer::ID_TYPE_LAVAGE, $refTypeLavage->getIdTypeLavage(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRefTypeLavageQuery