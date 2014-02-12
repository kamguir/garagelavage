<?php


/**
 * Base class that represents a query for the 'tbl_tapis' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 01/09/14 10:18:29
 *
 * @method     TblTapisQuery orderByNumTapis($order = Criteria::ASC) Order by the num_tapis column
 * @method     TblTapisQuery orderByTailleTapis($order = Criteria::ASC) Order by the taille_tapis column
 * @method     TblTapisQuery orderByPrixMettreCarre($order = Criteria::ASC) Order by the prix_mettre_carre column
 * @method     TblTapisQuery orderByMontantLavageTapis($order = Criteria::ASC) Order by the montant_lavage_tapis column
 * @method     TblTapisQuery orderByDateLavageTapis($order = Criteria::ASC) Order by the date_lavage_tapis column
 *
 * @method     TblTapisQuery groupByNumTapis() Group by the num_tapis column
 * @method     TblTapisQuery groupByTailleTapis() Group by the taille_tapis column
 * @method     TblTapisQuery groupByPrixMettreCarre() Group by the prix_mettre_carre column
 * @method     TblTapisQuery groupByMontantLavageTapis() Group by the montant_lavage_tapis column
 * @method     TblTapisQuery groupByDateLavageTapis() Group by the date_lavage_tapis column
 *
 * @method     TblTapisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TblTapisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TblTapisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TblTapis findOne(PropelPDO $con = null) Return the first TblTapis matching the query
 * @method     TblTapis findOneOrCreate(PropelPDO $con = null) Return the first TblTapis matching the query, or a new TblTapis object populated from the query conditions when no match is found
 *
 * @method     TblTapis findOneByNumTapis(int $num_tapis) Return the first TblTapis filtered by the num_tapis column
 * @method     TblTapis findOneByTailleTapis(int $taille_tapis) Return the first TblTapis filtered by the taille_tapis column
 * @method     TblTapis findOneByPrixMettreCarre(double $prix_mettre_carre) Return the first TblTapis filtered by the prix_mettre_carre column
 * @method     TblTapis findOneByMontantLavageTapis(double $montant_lavage_tapis) Return the first TblTapis filtered by the montant_lavage_tapis column
 * @method     TblTapis findOneByDateLavageTapis(string $date_lavage_tapis) Return the first TblTapis filtered by the date_lavage_tapis column
 *
 * @method     array findByNumTapis(int $num_tapis) Return TblTapis objects filtered by the num_tapis column
 * @method     array findByTailleTapis(int $taille_tapis) Return TblTapis objects filtered by the taille_tapis column
 * @method     array findByPrixMettreCarre(double $prix_mettre_carre) Return TblTapis objects filtered by the prix_mettre_carre column
 * @method     array findByMontantLavageTapis(double $montant_lavage_tapis) Return TblTapis objects filtered by the montant_lavage_tapis column
 * @method     array findByDateLavageTapis(string $date_lavage_tapis) Return TblTapis objects filtered by the date_lavage_tapis column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTblTapisQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTblTapisQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TblTapis', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TblTapisQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TblTapisQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TblTapisQuery) {
			return $criteria;
		}
		$query = new TblTapisQuery();
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
	 * @return    TblTapis|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TblTapisPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TblTapisPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    TblTapis A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `NUM_TAPIS`, `TAILLE_TAPIS`, `PRIX_METTRE_CARRE`, `MONTANT_LAVAGE_TAPIS`, `DATE_LAVAGE_TAPIS` FROM `tbl_tapis` WHERE `NUM_TAPIS` = :p0';
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
			$obj = new TblTapis();
			$obj->hydrate($row);
			TblTapisPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    TblTapis|array|mixed the result, formatted by the current formatter
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
	 * @return    TblTapisQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TblTapisPeer::NUM_TAPIS, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TblTapisQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TblTapisPeer::NUM_TAPIS, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the num_tapis column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumTapis(1234); // WHERE num_tapis = 1234
	 * $query->filterByNumTapis(array(12, 34)); // WHERE num_tapis IN (12, 34)
	 * $query->filterByNumTapis(array('min' => 12)); // WHERE num_tapis > 12
	 * </code>
	 *
	 * @param     mixed $numTapis The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblTapisQuery The current query, for fluid interface
	 */
	public function filterByNumTapis($numTapis = null, $comparison = null)
	{
		if (is_array($numTapis) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TblTapisPeer::NUM_TAPIS, $numTapis, $comparison);
	}

	/**
	 * Filter the query on the taille_tapis column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTailleTapis(1234); // WHERE taille_tapis = 1234
	 * $query->filterByTailleTapis(array(12, 34)); // WHERE taille_tapis IN (12, 34)
	 * $query->filterByTailleTapis(array('min' => 12)); // WHERE taille_tapis > 12
	 * </code>
	 *
	 * @param     mixed $tailleTapis The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblTapisQuery The current query, for fluid interface
	 */
	public function filterByTailleTapis($tailleTapis = null, $comparison = null)
	{
		if (is_array($tailleTapis)) {
			$useMinMax = false;
			if (isset($tailleTapis['min'])) {
				$this->addUsingAlias(TblTapisPeer::TAILLE_TAPIS, $tailleTapis['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tailleTapis['max'])) {
				$this->addUsingAlias(TblTapisPeer::TAILLE_TAPIS, $tailleTapis['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblTapisPeer::TAILLE_TAPIS, $tailleTapis, $comparison);
	}

	/**
	 * Filter the query on the prix_mettre_carre column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrixMettreCarre(1234); // WHERE prix_mettre_carre = 1234
	 * $query->filterByPrixMettreCarre(array(12, 34)); // WHERE prix_mettre_carre IN (12, 34)
	 * $query->filterByPrixMettreCarre(array('min' => 12)); // WHERE prix_mettre_carre > 12
	 * </code>
	 *
	 * @param     mixed $prixMettreCarre The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblTapisQuery The current query, for fluid interface
	 */
	public function filterByPrixMettreCarre($prixMettreCarre = null, $comparison = null)
	{
		if (is_array($prixMettreCarre)) {
			$useMinMax = false;
			if (isset($prixMettreCarre['min'])) {
				$this->addUsingAlias(TblTapisPeer::PRIX_METTRE_CARRE, $prixMettreCarre['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($prixMettreCarre['max'])) {
				$this->addUsingAlias(TblTapisPeer::PRIX_METTRE_CARRE, $prixMettreCarre['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblTapisPeer::PRIX_METTRE_CARRE, $prixMettreCarre, $comparison);
	}

	/**
	 * Filter the query on the montant_lavage_tapis column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMontantLavageTapis(1234); // WHERE montant_lavage_tapis = 1234
	 * $query->filterByMontantLavageTapis(array(12, 34)); // WHERE montant_lavage_tapis IN (12, 34)
	 * $query->filterByMontantLavageTapis(array('min' => 12)); // WHERE montant_lavage_tapis > 12
	 * </code>
	 *
	 * @param     mixed $montantLavageTapis The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblTapisQuery The current query, for fluid interface
	 */
	public function filterByMontantLavageTapis($montantLavageTapis = null, $comparison = null)
	{
		if (is_array($montantLavageTapis)) {
			$useMinMax = false;
			if (isset($montantLavageTapis['min'])) {
				$this->addUsingAlias(TblTapisPeer::MONTANT_LAVAGE_TAPIS, $montantLavageTapis['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($montantLavageTapis['max'])) {
				$this->addUsingAlias(TblTapisPeer::MONTANT_LAVAGE_TAPIS, $montantLavageTapis['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblTapisPeer::MONTANT_LAVAGE_TAPIS, $montantLavageTapis, $comparison);
	}

	/**
	 * Filter the query on the date_lavage_tapis column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateLavageTapis('2011-03-14'); // WHERE date_lavage_tapis = '2011-03-14'
	 * $query->filterByDateLavageTapis('now'); // WHERE date_lavage_tapis = '2011-03-14'
	 * $query->filterByDateLavageTapis(array('max' => 'yesterday')); // WHERE date_lavage_tapis > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dateLavageTapis The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblTapisQuery The current query, for fluid interface
	 */
	public function filterByDateLavageTapis($dateLavageTapis = null, $comparison = null)
	{
		if (is_array($dateLavageTapis)) {
			$useMinMax = false;
			if (isset($dateLavageTapis['min'])) {
				$this->addUsingAlias(TblTapisPeer::DATE_LAVAGE_TAPIS, $dateLavageTapis['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateLavageTapis['max'])) {
				$this->addUsingAlias(TblTapisPeer::DATE_LAVAGE_TAPIS, $dateLavageTapis['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblTapisPeer::DATE_LAVAGE_TAPIS, $dateLavageTapis, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TblTapis $tblTapis Object to remove from the list of results
	 *
	 * @return    TblTapisQuery The current query, for fluid interface
	 */
	public function prune($tblTapis = null)
	{
		if ($tblTapis) {
			$this->addUsingAlias(TblTapisPeer::NUM_TAPIS, $tblTapis->getNumTapis(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTblTapisQuery