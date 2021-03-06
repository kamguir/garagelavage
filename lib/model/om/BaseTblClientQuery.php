<?php


/**
 * Base class that represents a query for the 'tbl_client' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 03/23/14 17:30:02
 *
 * @method     TblClientQuery orderByIdClient($order = Criteria::ASC) Order by the id_client column
 * @method     TblClientQuery orderByCinClient($order = Criteria::ASC) Order by the cin_client column
 * @method     TblClientQuery orderByNomClient($order = Criteria::ASC) Order by the nom_client column
 * @method     TblClientQuery orderByPrenomClient($order = Criteria::ASC) Order by the prenom_client column
 * @method     TblClientQuery orderBySituation($order = Criteria::ASC) Order by the situation column
 * @method     TblClientQuery orderByAgeClient($order = Criteria::ASC) Order by the age_client column
 * @method     TblClientQuery orderByNumTel($order = Criteria::ASC) Order by the num_tel column
 * @method     TblClientQuery orderByAdresseClient($order = Criteria::ASC) Order by the adresse_client column
 * @method     TblClientQuery orderByFonctionClient($order = Criteria::ASC) Order by the fonction_client column
 * @method     TblClientQuery orderByIsEmploye($order = Criteria::ASC) Order by the is_employe column
 * @method     TblClientQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     TblClientQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 *
 * @method     TblClientQuery groupByIdClient() Group by the id_client column
 * @method     TblClientQuery groupByCinClient() Group by the cin_client column
 * @method     TblClientQuery groupByNomClient() Group by the nom_client column
 * @method     TblClientQuery groupByPrenomClient() Group by the prenom_client column
 * @method     TblClientQuery groupBySituation() Group by the situation column
 * @method     TblClientQuery groupByAgeClient() Group by the age_client column
 * @method     TblClientQuery groupByNumTel() Group by the num_tel column
 * @method     TblClientQuery groupByAdresseClient() Group by the adresse_client column
 * @method     TblClientQuery groupByFonctionClient() Group by the fonction_client column
 * @method     TblClientQuery groupByIsEmploye() Group by the is_employe column
 * @method     TblClientQuery groupByCreatedAt() Group by the created_at column
 * @method     TblClientQuery groupByDeletedAt() Group by the deleted_at column
 *
 * @method     TblClientQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TblClientQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TblClientQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TblClientQuery leftJoinRefSituation($relationAlias = null) Adds a LEFT JOIN clause to the query using the RefSituation relation
 * @method     TblClientQuery rightJoinRefSituation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RefSituation relation
 * @method     TblClientQuery innerJoinRefSituation($relationAlias = null) Adds a INNER JOIN clause to the query using the RefSituation relation
 *
 * @method     TblClientQuery leftJoinTblFacture($relationAlias = null) Adds a LEFT JOIN clause to the query using the TblFacture relation
 * @method     TblClientQuery rightJoinTblFacture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TblFacture relation
 * @method     TblClientQuery innerJoinTblFacture($relationAlias = null) Adds a INNER JOIN clause to the query using the TblFacture relation
 *
 * @method     TblClientQuery leftJoinTblVoiture($relationAlias = null) Adds a LEFT JOIN clause to the query using the TblVoiture relation
 * @method     TblClientQuery rightJoinTblVoiture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TblVoiture relation
 * @method     TblClientQuery innerJoinTblVoiture($relationAlias = null) Adds a INNER JOIN clause to the query using the TblVoiture relation
 *
 * @method     TblClient findOne(PropelPDO $con = null) Return the first TblClient matching the query
 * @method     TblClient findOneOrCreate(PropelPDO $con = null) Return the first TblClient matching the query, or a new TblClient object populated from the query conditions when no match is found
 *
 * @method     TblClient findOneByIdClient(int $id_client) Return the first TblClient filtered by the id_client column
 * @method     TblClient findOneByCinClient(string $cin_client) Return the first TblClient filtered by the cin_client column
 * @method     TblClient findOneByNomClient(string $nom_client) Return the first TblClient filtered by the nom_client column
 * @method     TblClient findOneByPrenomClient(string $prenom_client) Return the first TblClient filtered by the prenom_client column
 * @method     TblClient findOneBySituation(int $situation) Return the first TblClient filtered by the situation column
 * @method     TblClient findOneByAgeClient(int $age_client) Return the first TblClient filtered by the age_client column
 * @method     TblClient findOneByNumTel(int $num_tel) Return the first TblClient filtered by the num_tel column
 * @method     TblClient findOneByAdresseClient(string $adresse_client) Return the first TblClient filtered by the adresse_client column
 * @method     TblClient findOneByFonctionClient(string $fonction_client) Return the first TblClient filtered by the fonction_client column
 * @method     TblClient findOneByIsEmploye(boolean $is_employe) Return the first TblClient filtered by the is_employe column
 * @method     TblClient findOneByCreatedAt(string $created_at) Return the first TblClient filtered by the created_at column
 * @method     TblClient findOneByDeletedAt(string $deleted_at) Return the first TblClient filtered by the deleted_at column
 *
 * @method     array findByIdClient(int $id_client) Return TblClient objects filtered by the id_client column
 * @method     array findByCinClient(string $cin_client) Return TblClient objects filtered by the cin_client column
 * @method     array findByNomClient(string $nom_client) Return TblClient objects filtered by the nom_client column
 * @method     array findByPrenomClient(string $prenom_client) Return TblClient objects filtered by the prenom_client column
 * @method     array findBySituation(int $situation) Return TblClient objects filtered by the situation column
 * @method     array findByAgeClient(int $age_client) Return TblClient objects filtered by the age_client column
 * @method     array findByNumTel(int $num_tel) Return TblClient objects filtered by the num_tel column
 * @method     array findByAdresseClient(string $adresse_client) Return TblClient objects filtered by the adresse_client column
 * @method     array findByFonctionClient(string $fonction_client) Return TblClient objects filtered by the fonction_client column
 * @method     array findByIsEmploye(boolean $is_employe) Return TblClient objects filtered by the is_employe column
 * @method     array findByCreatedAt(string $created_at) Return TblClient objects filtered by the created_at column
 * @method     array findByDeletedAt(string $deleted_at) Return TblClient objects filtered by the deleted_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTblClientQuery extends ModelCriteria
{
	
	// soft_delete behavior
	protected static $softDelete = true;
	protected $localSoftDelete = true;

	/**
	 * Initializes internal state of BaseTblClientQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TblClient', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TblClientQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TblClientQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TblClientQuery) {
			return $criteria;
		}
		$query = new TblClientQuery();
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
	 * @return    TblClient|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TblClientPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TblClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    TblClient A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_CLIENT`, `CIN_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `SITUATION`, `AGE_CLIENT`, `NUM_TEL`, `ADRESSE_CLIENT`, `FONCTION_CLIENT`, `IS_EMPLOYE`, `CREATED_AT`, `DELETED_AT` FROM `tbl_client` WHERE `ID_CLIENT` = :p0';
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
			$obj = new TblClient();
			$obj->hydrate($row);
			TblClientPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    TblClient|array|mixed the result, formatted by the current formatter
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
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TblClientPeer::ID_CLIENT, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TblClientPeer::ID_CLIENT, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_client column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdClient(1234); // WHERE id_client = 1234
	 * $query->filterByIdClient(array(12, 34)); // WHERE id_client IN (12, 34)
	 * $query->filterByIdClient(array('min' => 12)); // WHERE id_client > 12
	 * </code>
	 *
	 * @param     mixed $idClient The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByIdClient($idClient = null, $comparison = null)
	{
		if (is_array($idClient) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TblClientPeer::ID_CLIENT, $idClient, $comparison);
	}

	/**
	 * Filter the query on the cin_client column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCinClient('fooValue');   // WHERE cin_client = 'fooValue'
	 * $query->filterByCinClient('%fooValue%'); // WHERE cin_client LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cinClient The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByCinClient($cinClient = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cinClient)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cinClient)) {
				$cinClient = str_replace('*', '%', $cinClient);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblClientPeer::CIN_CLIENT, $cinClient, $comparison);
	}

	/**
	 * Filter the query on the nom_client column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomClient('fooValue');   // WHERE nom_client = 'fooValue'
	 * $query->filterByNomClient('%fooValue%'); // WHERE nom_client LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomClient The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByNomClient($nomClient = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomClient)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomClient)) {
				$nomClient = str_replace('*', '%', $nomClient);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblClientPeer::NOM_CLIENT, $nomClient, $comparison);
	}

	/**
	 * Filter the query on the prenom_client column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrenomClient('fooValue');   // WHERE prenom_client = 'fooValue'
	 * $query->filterByPrenomClient('%fooValue%'); // WHERE prenom_client LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $prenomClient The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByPrenomClient($prenomClient = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($prenomClient)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $prenomClient)) {
				$prenomClient = str_replace('*', '%', $prenomClient);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblClientPeer::PRENOM_CLIENT, $prenomClient, $comparison);
	}

	/**
	 * Filter the query on the situation column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySituation(1234); // WHERE situation = 1234
	 * $query->filterBySituation(array(12, 34)); // WHERE situation IN (12, 34)
	 * $query->filterBySituation(array('min' => 12)); // WHERE situation > 12
	 * </code>
	 *
	 * @see       filterByRefSituation()
	 *
	 * @param     mixed $situation The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterBySituation($situation = null, $comparison = null)
	{
		if (is_array($situation)) {
			$useMinMax = false;
			if (isset($situation['min'])) {
				$this->addUsingAlias(TblClientPeer::SITUATION, $situation['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($situation['max'])) {
				$this->addUsingAlias(TblClientPeer::SITUATION, $situation['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblClientPeer::SITUATION, $situation, $comparison);
	}

	/**
	 * Filter the query on the age_client column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAgeClient(1234); // WHERE age_client = 1234
	 * $query->filterByAgeClient(array(12, 34)); // WHERE age_client IN (12, 34)
	 * $query->filterByAgeClient(array('min' => 12)); // WHERE age_client > 12
	 * </code>
	 *
	 * @param     mixed $ageClient The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByAgeClient($ageClient = null, $comparison = null)
	{
		if (is_array($ageClient)) {
			$useMinMax = false;
			if (isset($ageClient['min'])) {
				$this->addUsingAlias(TblClientPeer::AGE_CLIENT, $ageClient['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ageClient['max'])) {
				$this->addUsingAlias(TblClientPeer::AGE_CLIENT, $ageClient['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblClientPeer::AGE_CLIENT, $ageClient, $comparison);
	}

	/**
	 * Filter the query on the num_tel column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumTel(1234); // WHERE num_tel = 1234
	 * $query->filterByNumTel(array(12, 34)); // WHERE num_tel IN (12, 34)
	 * $query->filterByNumTel(array('min' => 12)); // WHERE num_tel > 12
	 * </code>
	 *
	 * @param     mixed $numTel The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByNumTel($numTel = null, $comparison = null)
	{
		if (is_array($numTel)) {
			$useMinMax = false;
			if (isset($numTel['min'])) {
				$this->addUsingAlias(TblClientPeer::NUM_TEL, $numTel['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numTel['max'])) {
				$this->addUsingAlias(TblClientPeer::NUM_TEL, $numTel['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblClientPeer::NUM_TEL, $numTel, $comparison);
	}

	/**
	 * Filter the query on the adresse_client column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdresseClient('fooValue');   // WHERE adresse_client = 'fooValue'
	 * $query->filterByAdresseClient('%fooValue%'); // WHERE adresse_client LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $adresseClient The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByAdresseClient($adresseClient = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($adresseClient)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $adresseClient)) {
				$adresseClient = str_replace('*', '%', $adresseClient);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblClientPeer::ADRESSE_CLIENT, $adresseClient, $comparison);
	}

	/**
	 * Filter the query on the fonction_client column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFonctionClient('fooValue');   // WHERE fonction_client = 'fooValue'
	 * $query->filterByFonctionClient('%fooValue%'); // WHERE fonction_client LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $fonctionClient The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByFonctionClient($fonctionClient = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fonctionClient)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fonctionClient)) {
				$fonctionClient = str_replace('*', '%', $fonctionClient);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblClientPeer::FONCTION_CLIENT, $fonctionClient, $comparison);
	}

	/**
	 * Filter the query on the is_employe column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIsEmploye(true); // WHERE is_employe = true
	 * $query->filterByIsEmploye('yes'); // WHERE is_employe = true
	 * </code>
	 *
	 * @param     boolean|string $isEmploye The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByIsEmploye($isEmploye = null, $comparison = null)
	{
		if (is_string($isEmploye)) {
			$is_employe = in_array(strtolower($isEmploye), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(TblClientPeer::IS_EMPLOYE, $isEmploye, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $createdAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(TblClientPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(TblClientPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblClientPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the deleted_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
	 * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
	 * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $deletedAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(TblClientPeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(TblClientPeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TblClientPeer::DELETED_AT, $deletedAt, $comparison);
	}

	/**
	 * Filter the query by a related RefSituation object
	 *
	 * @param     RefSituation|PropelCollection $refSituation The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByRefSituation($refSituation, $comparison = null)
	{
		if ($refSituation instanceof RefSituation) {
			return $this
				->addUsingAlias(TblClientPeer::SITUATION, $refSituation->getIdSituation(), $comparison);
		} elseif ($refSituation instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(TblClientPeer::SITUATION, $refSituation->toKeyValue('PrimaryKey', 'IdSituation'), $comparison);
		} else {
			throw new PropelException('filterByRefSituation() only accepts arguments of type RefSituation or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the RefSituation relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function joinRefSituation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RefSituation');

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
			$this->addJoinObject($join, 'RefSituation');
		}

		return $this;
	}

	/**
	 * Use the RefSituation relation RefSituation object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RefSituationQuery A secondary query class using the current class as primary query
	 */
	public function useRefSituationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinRefSituation($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RefSituation', 'RefSituationQuery');
	}

	/**
	 * Filter the query by a related TblFacture object
	 *
	 * @param     TblFacture $tblFacture  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByTblFacture($tblFacture, $comparison = null)
	{
		if ($tblFacture instanceof TblFacture) {
			return $this
				->addUsingAlias(TblClientPeer::ID_CLIENT, $tblFacture->getIdEmploye(), $comparison);
		} elseif ($tblFacture instanceof PropelCollection) {
			return $this
				->useTblFactureQuery()
				->filterByPrimaryKeys($tblFacture->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByTblFacture() only accepts arguments of type TblFacture or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TblFacture relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function joinTblFacture($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TblFacture');

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
			$this->addJoinObject($join, 'TblFacture');
		}

		return $this;
	}

	/**
	 * Use the TblFacture relation TblFacture object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TblFactureQuery A secondary query class using the current class as primary query
	 */
	public function useTblFactureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTblFacture($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TblFacture', 'TblFactureQuery');
	}

	/**
	 * Filter the query by a related TblVoiture object
	 *
	 * @param     TblVoiture $tblVoiture  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function filterByTblVoiture($tblVoiture, $comparison = null)
	{
		if ($tblVoiture instanceof TblVoiture) {
			return $this
				->addUsingAlias(TblClientPeer::ID_CLIENT, $tblVoiture->getIdClient(), $comparison);
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
	 * @return    TblClientQuery The current query, for fluid interface
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
	 * @param     TblClient $tblClient Object to remove from the list of results
	 *
	 * @return    TblClientQuery The current query, for fluid interface
	 */
	public function prune($tblClient = null)
	{
		if ($tblClient) {
			$this->addUsingAlias(TblClientPeer::ID_CLIENT, $tblClient->getIdClient(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Code to execute before every SELECT statement
	 *
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		// soft_delete behavior
		if (TblClientQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			$this->addUsingAlias(TblClientPeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			TblClientPeer::enableSoftDelete();
		}

		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 *
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		// soft_delete behavior
		if (TblClientQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			return $this->softDelete($con);
		} else {
			return $this->hasWhereClause() ? $this->forceDelete($con) : $this->forceDeleteAll($con);
		}

		return $this->preDelete($con);
	}

	// soft_delete behavior
	
	/**
	 * Temporarily disable the filter on deleted rows
	 * Valid only for the current query
	 *
	 * @see TblClientQuery::disableSoftDelete() to disable the filter for more than one query
	 *
	 * @return TblClientQuery The current query, for fluid interface
	 */
	public function includeDeleted()
	{
		$this->localSoftDelete = false;
		return $this;
	}
	
	/**
	 * Soft delete the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of updated rows
	 */
	public function softDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => time()), $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		return TblClientPeer::doForceDelete($this, $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of all the rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDeleteAll(PropelPDO $con = null)
	{
		return TblClientPeer::doForceDeleteAll($con);}
	
	/**
	 * Undelete selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int The number of rows affected by this update and any referring fk objects' save() operations.
	 */
	public function unDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => null), $con);
	}
	
	/**
	 * Enable the soft_delete behavior for this model
	 */
	public static function enableSoftDelete()
	{
		self::$softDelete = true;
	}
	
	/**
	 * Disable the soft_delete behavior for this model
	 */
	public static function disableSoftDelete()
	{
		self::$softDelete = false;
	}
	
	/**
	 * Check the soft_delete behavior for this model
	 *
	 * @return boolean true if the soft_delete behavior is enabled
	 */
	public static function isSoftDeleteEnabled()
	{
		return self::$softDelete;
	}

} // BaseTblClientQuery