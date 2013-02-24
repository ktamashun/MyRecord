<?php

namespace MR;

/**
 * Created by JetBrains PhpStorm.
 * User: Tamás
 * Date: 2013.02.24.
 * Time: 23:43
 * To change this template use File | Settings | File Templates.
 */
class Query
{
    protected $_select = null;
    protected $_from = null;
    protected $_join = array();
    protected $_where = array();


    public static function create()
    {
        $class = __CLASS__;
        return new $class();
    }

    public function select($select = '*')
    {
        $this->_select = new Query\SelectPart($select);
        return $this;
    }

    public function from($from)
    {
        $this->_from = $from;
        return $this;
    }

    public function join($table, $on)
    {
        $this->_join[] = new Query\JoinPart($table, $on);
        return $this;
    }

    public function where($condition, $params = null)
    {
        $this->_where[] = $condition; // array($condition, $params);
        return $this;
    }

    public function __toString()
    {
        $sql = 'SELECT ' . $this->_select
            . ' FROM ' . $this->_from
            . ' ' . implode("\n", $this->_join)
            . ' WHERE (' . implode(') AND (', $this->_where) . ')'
            . ';';

        return $sql;
    }
}
