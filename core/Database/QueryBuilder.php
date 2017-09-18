<?php
require "Interface/IQuery.php";
/**
* Pembuatan Query
*/
class QueryBuilder implements IQuery
{
    private $selectables = array();
    private $table;
    private $whereClause;
    private $whereAndClause;
    private $limit;
    private $joinClause;
    private $onClause;
    protected $bajingan;

    /**
     * select clause
     * @param  string $select select * clause
     * @return object        this object
     */
    public function select($select)
    {
        $this->selectables = func_get_args();

        return $this;
    }

    /**
     * from clause
     * @param  string $table memilih dari table mana
     * @return object       from clause
     */
    public function from($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * where clause
     * @param  string $where condition
     * @return object
     */
    public function where($where)
    {
        $this->whereClause = $where;

        return $this;
    }

    /**
     * And Clause
     * @param  string $whereAnd And condition
     * @return object
     */
    public function whereAnd($whereAnd)
    {
        $this->whereAndClause = $whereAnd;

        return $this;
    }

    /**
     * Batas limit yang akan ditampilkan
     * @param  string $limit limit yang diambil
     * @return object limit
     */
    public function limit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * join clause
     * @param  string $join join table
     * @return object
     */
    public function join($join)
    {
        $this->joinClause = $join;

        return $this;
    }

    /**
     * hasil dari query builder
     * @return string query builder result in string
     */
    public function result()
    {
        $query[] = "SELECT";
        // if the selectables array is empty, select all
        if (empty($this->selectables)) {
            $query[] = "*";
        }
        // else select according to selectables
        else {
            $query[] = join(', ', $this->selectables);
        }

        $query[] = "FROM";
        $query[] = $this->table;

        if (!empty($this->joinClause)) {
            $query[] = "JOIN";
            $query[] = $this->joinClause;
            // $query[] = "ON".$this->onClause;
        }

        if (!empty($this->whereClause)) {
            $query[] = "WHERE";
            $query[] = $this->whereClause;
        }

        if (!empty($this->whereAndClause)) {
            $query[] = "AND";
            $query[] = $this->whereAndClause;
        }

        if (!empty($this->limit)) {
            $query[] = "LIMIT";
            $query[] = $this->limit;
        }

        return join(' ', $query);
    }
}
