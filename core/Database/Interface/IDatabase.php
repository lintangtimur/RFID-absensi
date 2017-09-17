<?php
/**
 * Database Interface
 */
interface IQuery
{
    /**
   * select clause
   * @param  string $select select * clause
   * @return object        this object
   */
    public function select($select);

    /**
     * from clause
     * @param  string $table memilih dari table mana
     * @return object       from clause
     */
    public function from($table);

    /**
     * where clause
     * @param  string $where condition
     * @return object
     */
    public function where($where);

    /**
     * And Clause
     * @param  string $whereAnd And condition
     * @return object
     */
    public function whereAnd($whereAnd);

    /**
     * Batas limit yang akan ditampilkan
     * @param  string $limit limit yang diambil
     * @return object limit
     */
    public function limit($limit);

    /**
     * join clause
     * @param  string $join join table
     * @return object
     */
    public function join($join);

    /**
     * hasil dari query builder
     * @return string query builder result in string
     */
    public function result();
}
