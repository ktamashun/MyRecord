<?php

namespace MR\Query;

/**
 * Created by JetBrains PhpStorm.
 * User: Tamás
 * Date: 2013.02.24.
 * Time: 23:50
 * To change this template use File | Settings | File Templates.
 */
class JoinPart extends QueryPart
{
    protected $_identifier = null;
    protected $_table = null;
    protected $_on = null;


    public function __construct($table, $on)
    {
        list($this->_table, $this->_identifier) = $this->parseTable($table);
        $this->_on = $on;
    }

    public function parseTable($table)
    {
        $tableArray = explode(' ', str_replace('`', '', $table));

        if (count($tableArray) === 1) {
            $identifier = null;
            $tableName = $tableArray[0];
        } else {
            $tableName = $tableArray[0];
            $identifier = $tableArray[1];
        }

        return array($tableName, $identifier);
    }

    public function __toString()
    {
        if (null === $this->_identifier) {
            return 'JOIN ' . $this->_table . ' ON (' . $this->_on . ')';
        }

        return 'JOIN ' . $this->_table . ' ' . $this->_identifier . ' ON (' . $this->_on . ')';
    }
}
