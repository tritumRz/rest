<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 27.03.14
 * Time: 15:06
 */

namespace Cundd\Rest\VirtualObject\Persistence;

/**
 * Query implementation
 *
 * @package Cundd\Rest\VirtualObject\Persistence
 */
class Query implements QueryInterface {
	/**
	 * @var \Cundd\Rest\VirtualObject\Persistence\BackendInterface
	 * @inject
	 */
	protected $backend;

	/**
	 * Constraints array
	 *
	 * @var array
	 */
	protected $constraint = array();

	/**
	 * @var array
	 */
	protected $orderings = array();

	/**
	 * @var int
	 */
	protected $limit;

	/**
	 * @var int
	 */
	protected $offset;

	/**
	 * @var string
	 */
	protected $sourceIdentifier;

	/**
	 * Executes the query and returns the result
	 *
	 * @return array Returns the result
	 * @api
	 */
	public function execute() {
		return $this->backend->getObjectDataByQuery($this->getSourceIdentifier(), $this);
	}


	/**
	 * Returns the query result count
	 *
	 * @return integer The query result count
	 * @api
	 */
	public function count() {
		return $this->backend->getObjectCountByQuery($this->getSourceIdentifier(), $this);
	}

	/**
	 * Sets the property names to order the result by. Expected like this:
	 * array(
	 *  'foo' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
	 *  'bar' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	 * )
	 *
	 * @param array $orderings The property names to order by
	 * @return QueryInterface
	 * @api
	 */
	public function setOrderings(array $orderings) {
		$this->orderings;
		return $this;
	}

	/**
	 * Sets the maximum size of the result set to limit
	 *
	 * Returns $this to allow for chaining (fluid interface)
	 *
	 * @param integer $limit
	 * @return QueryInterface
	 * @api
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
		return $this;
	}

	/**
	 * Sets the start offset of the result set to offset
	 *
	 * Returns $this to allow for chaining (fluid interface).
	 *
	 * @param integer $offset
	 * @return QueryInterface
	 * @api
	 */
	public function setOffset($offset) {
		$this->offset = $offset;
		return $this;
	}

	/**
	 * Gets the property names to order the result by, like this:
	 * array(
	 *  'foo' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
	 *  'bar' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	 * )
	 *
	 * @return array
	 * @api
	 */
	public function getOrderings() {
		return $this->orderings;
	}

	/**
	 * Returns the maximum size of the result set to limit
	 *
	 * @return integer
	 * @api
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * Returns the start offset of the result set
	 *
	 * @return integer
	 * @api
	 */
	public function getOffset() {
		return $this->offset;
	}

	/**
	 * Gets the constraint for this query
	 *
	 * @return mixed the constraint, or null if none
	 * @api
	 */
	public function getConstraint() {
		return $this->constraint;
	}

	/**
	 * Gets the constraint for this query
	 *
	 * @param array $constraint
	 * @return QueryInterface
	 * @api
	 */
	public function setConstraint($constraint) {
		$this->constraint = $constraint;
		return $this;
	}

	/**
	 * Sets the source identifier for the new query
	 *
	 * @param string $sourceIdentifier
	 * @return QueryInterface
	 */
	public function setSourceIdentifier($sourceIdentifier) {
		$this->sourceIdentifier = $sourceIdentifier;
		return $this;
	}

	/**
	 * Returns the source identifier for the new query
	 *
	 * @return string
	 */
	public function getSourceIdentifier() {
		return $this->sourceIdentifier;
	}



} 