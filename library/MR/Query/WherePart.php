<?php

namespace MR\Query;

/**
 * Created by JetBrains PhpStorm.
 * User: Tamás
 * Date: 2013.02.24.
 * Time: 23:50
 * To change this template use File | Settings | File Templates.
 */
class WherePart extends QueryPart
{
    protected $_condition = null;
    protected $_params = null;


    public function __construct($condition, $params)
    {
        $this->_condition = $condition;
        $this->_params = $params;
    }

    public function __toString()
    {
        return (string)$this->_condition;
    }
}
