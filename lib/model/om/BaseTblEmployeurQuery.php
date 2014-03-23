<?php


/**
 * Base class that represents a query for the 'tbl_employeur' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.6-dev on:
 *
 * 03/21/14 17:07:52
 *
 * @method     TblEmployeurQuery orderByIdEmployeur($order = Criteria::ASC) Order by the id_employeur column
 * @method     TblEmployeurQuery orderByNomEmployeur($order = Criteria::ASC) Order by the nom_employeur column
 * @method     TblEmployeurQuery orderByPrenomEmployeur($order = Criteria::ASC) Order by the prenom_employeur column
 * @method     TblEmployeurQuery orderByNomSociete($order = Criteria::ASC) Order by the nom_societe column
 * @method     TblEmployeurQuery orderByNumTelephoneEmployeur($order = Criteria::ASC) Order by the num_telephone_employeur column
 * @method     TblEmployeurQuery orderByAdresseSociete($order = Criteria::ASC) Order by the adresse_societe column
 * @method     TblEmployeurQuery orderByVilleSociete($order = Criteria::ASC) Order by the ville_societe column
 * @method     TblEmployeurQuery orderByAdresseEmail($order = Criteria::ASC) Order by the adresse_email column
 *
 * @method     TblEmployeurQuery groupByIdEmployeur() Group by the id_employeur column
 * @method     TblEmployeurQuery groupByNomEmployeur() Group by the nom_employeur column
 * @method     TblEmployeurQuery groupByPrenomEmployeur() Group by the prenom_employeur column
 * @method     TblEmployeurQuery groupByNomSociete() Group by the nom_societe column
 * @method     TblEmployeurQuery groupByNumTelephoneEmployeur() Group by the num_telephone_employeur column
 * @method     TblEmployeurQuery groupByAdresseSociete() Group by the adresse_societe column
 * @method     TblEmployeurQuery groupByVilleSociete() Group by the ville_societe column
 * @method     TblEmployeurQuery groupByAdresseEmail() Group by the adresse_email column
 *
 * @method     TblEmployeurQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TblEmployeurQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TblEmployeurQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TblEmployeur findOne(PropelPDO $con = null) Return the first TblEmployeur matching the query
 * @method     TblEmployeur findOneOrCreate(PropelPDO $con = null) Return the first TblEmployeur matching the query, or a new TblEmployeur object populated from the query conditions when no match is found
 *
 * @method     TblEmployeur findOneByIdEmployeur(int $id_employeur) Return the first TblEmployeur filtered by the id_employeur column
 * @method     TblEmployeur findOneByNomEmployeur(string $nom_employeur) Return the first TblEmployeur filtered by the nom_employeur column
 * @method     TblEmployeur findOneByPrenomEmployeur(string $prenom_employeur) Return the first TblEmployeur filtered by the prenom_employeur column
 * @method     TblEmployeur findOneByNomSociete(string $nom_societe) Return the first TblEmployeur filtered by the nom_societe column
 * @method     TblEmployeur findOneByNumTelephoneEmployeur(string $num_telephone_employeur) Return the first TblEmployeur filtered by the num_telephone_employeur column
 * @method     TblEmployeur findOneByAdresseSociete(string $adresse_societe) Return the first TblEmployeur filtered by the adresse_societe column
 * @method     TblEmployeur findOneByVilleSociete(string $ville_societe) Return the first TblEmployeur filtered by the ville_societe column
 * @method     TblEmployeur findOneByAdresseEmail(string $adresse_email) Return the first TblEmployeur filtered by the adresse_email column
 *
 * @method     array findByIdEmployeur(int $id_employeur) Return TblEmployeur objects filtered by the id_employeur column
 * @method     array findByNomEmployeur(string $nom_employeur) Return TblEmployeur objects filtered by the nom_employeur column
 * @method     array findByPrenomEmployeur(string $prenom_employeur) Return TblEmployeur objects filtered by the prenom_employeur column
 * @method     array findByNomSociete(string $nom_societe) Return TblEmployeur objects filtered by the nom_societe column
 * @method     array findByNumTelephoneEmployeur(string $num_telephone_employeur) Return TblEmployeur objects filtered by the num_telephone_employeur column
 * @method     array findByAdresseSociete(string $adresse_societe) Return TblEmployeur objects filtered by the adresse_societe column
 * @method     array findByVilleSociete(string $ville_societe) Return TblEmployeur objects filtered by the ville_societe column
 * @method     array findByAdresseEmail(string $adresse_email) Return TblEmployeur objects filtered by the adresse_email column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTblEmployeurQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTblEmployeurQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TblEmployeur', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TblEmployeurQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TblEmployeurQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TblEmployeurQuery) {
			return $criteria;
		}
		$query = new TblEmployeurQuery();
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
	 * @return    TblEmployeur|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TblEmployeurPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TblEmployeurPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    TblEmployeur A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_EMPLOYEUR`, `NOM_EMPLOYEUR`, `PRENOM_EMPLOYEUR`, `NOM_SOCIETE`, `NUM_TELEPHONE_EMPLOYEUR`, `ADRESSE_SOCIETE`, `VILLE_SOCIETE`, `ADRESSE_EMAIL` FROM `tbl_employeur` WHERE `ID_EMPLOYEUR` = :p0';
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
			$obj = new TblEmployeur();
			$obj->hydrate($row);
			TblEmployeurPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    TblEmployeur|array|mixed the result, formatted by the current formatter
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
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TblEmployeurPeer::ID_EMPLOYEUR, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TblEmployeurPeer::ID_EMPLOYEUR, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_employeur column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdEmployeur(1234); // WHERE id_employeur = 1234
	 * $query->filterByIdEmployeur(array(12, 34)); // WHERE id_employeur IN (12, 34)
	 * $query->filterByIdEmployeur(array('min' => 12)); // WHERE id_employeur > 12
	 * </code>
	 *
	 * @param     mixed $idEmployeur The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByIdEmployeur($idEmployeur = null, $comparison = null)
	{
		if (is_array($idEmployeur) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TblEmployeurPeer::ID_EMPLOYEUR, $idEmployeur, $comparison);
	}

	/**
	 * Filter the query on the nom_employeur column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomEmployeur('fooValue');   // WHERE nom_employeur = 'fooValue'
	 * $query->filterByNomEmployeur('%fooValue%'); // WHERE nom_employeur LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomEmployeur The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByNomEmployeur($nomEmployeur = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomEmployeur)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomEmployeur)) {
				$nomEmployeur = str_replace('*', '%', $nomEmployeur);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblEmployeurPeer::NOM_EMPLOYEUR, $nomEmployeur, $comparison);
	}

	/**
	 * Filter the query on the prenom_employeur column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrenomEmployeur('fooValue');   // WHERE prenom_employeur = 'fooValue'
	 * $query->filterByPrenomEmployeur('%fooValue%'); // WHERE prenom_employeur LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $prenomEmployeur The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByPrenomEmployeur($prenomEmployeur = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($prenomEmployeur)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $prenomEmployeur)) {
				$prenomEmployeur = str_replace('*', '%', $prenomEmployeur);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblEmployeurPeer::PRENOM_EMPLOYEUR, $prenomEmployeur, $comparison);
	}

	/**
	 * Filter the query on the nom_societe column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomSociete('fooValue');   // WHERE nom_societe = 'fooValue'
	 * $query->filterByNomSociete('%fooValue%'); // WHERE nom_societe LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomSociete The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByNomSociete($nomSociete = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomSociete)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomSociete)) {
				$nomSociete = str_replace('*', '%', $nomSociete);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblEmployeurPeer::NOM_SOCIETE, $nomSociete, $comparison);
	}

	/**
	 * Filter the query on the num_telephone_employeur column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumTelephoneEmployeur('fooValue');   // WHERE num_telephone_employeur = 'fooValue'
	 * $query->filterByNumTelephoneEmployeur('%fooValue%'); // WHERE num_telephone_employeur LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $numTelephoneEmployeur The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByNumTelephoneEmployeur($numTelephoneEmployeur = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($numTelephoneEmployeur)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $numTelephoneEmployeur)) {
				$numTelephoneEmployeur = str_replace('*', '%', $numTelephoneEmployeur);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblEmployeurPeer::NUM_TELEPHONE_EMPLOYEUR, $numTelephoneEmployeur, $comparison);
	}

	/**
	 * Filter the query on the adresse_societe column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdresseSociete('fooValue');   // WHERE adresse_societe = 'fooValue'
	 * $query->filterByAdresseSociete('%fooValue%'); // WHERE adresse_societe LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $adresseSociete The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByAdresseSociete($adresseSociete = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($adresseSociete)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $adresseSociete)) {
				$adresseSociete = str_replace('*', '%', $adresseSociete);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblEmployeurPeer::ADRESSE_SOCIETE, $adresseSociete, $comparison);
	}

	/**
	 * Filter the query on the ville_societe column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVilleSociete('fooValue');   // WHERE ville_societe = 'fooValue'
	 * $query->filterByVilleSociete('%fooValue%'); // WHERE ville_societe LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $villeSociete The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByVilleSociete($villeSociete = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($villeSociete)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $villeSociete)) {
				$villeSociete = str_replace('*', '%', $villeSociete);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblEmployeurPeer::VILLE_SOCIETE, $villeSociete, $comparison);
	}

	/**
	 * Filter the query on the adresse_email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdresseEmail('fooValue');   // WHERE adresse_email = 'fooValue'
	 * $query->filterByAdresseEmail('%fooValue%'); // WHERE adresse_email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $adresseEmail The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function filterByAdresseEmail($adresseEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($adresseEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $adresseEmail)) {
				$adresseEmail = str_replace('*', '%', $adresseEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TblEmployeurPeer::ADRESSE_EMAIL, $adresseEmail, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TblEmployeur $tblEmployeur Object to remove from the list of results
	 *
	 * @return    TblEmployeurQuery The current query, for fluid interface
	 */
	public function prune($tblEmployeur = null)
	{
		if ($tblEmployeur) {
			$this->addUsingAlias(TblEmployeurPeer::ID_EMPLOYEUR, $tblEmployeur->getIdEmployeur(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTblEmployeurQuery