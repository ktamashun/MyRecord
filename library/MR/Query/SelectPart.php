<?php

namespace MR\Query;

/**
 * Created by JetBrains PhpStorm.
 * User: Tamás
 * Date: 2013.02.24.
 * Time: 23:50
 * To change this template use File | Settings | File Templates.
 */
class SelectPart extends QueryPart
{
    protected $_select = null;


    public function __construct($select)
    {
        $this->_select = $this->parseSelect($select);
    }

    public function parseSelect($select)
    {
        $selectArray = explode(',', str_replace('`', '', $select));
        $parsedSelect = array();

        foreach ($selectArray as $selectItem) {
            $selectItemArray = explode('.', trim($selectItem));

            if (count($selectItemArray) === 1) {
                $identifier = 'default';
                $parsedSelect[$identifier][] = $selectItemArray[0];
            } else {
                $identifier = $selectItemArray[0];
                $parsedSelect[$identifier][] = $selectItemArray[1];
            }
        }

        return $parsedSelect;
    }

    public function __toString()
    {
        $sqlArray = array();

        foreach ($this->_select as $identifier => $selectItems) {
            foreach ($selectItems as $selectItem) {
                if ('default' === $identifier) {
                    $sqlArray[] = $selectItem;
                } else {
                    $sqlArray[] = $identifier . '.' . $selectItem;
                }
            }
        }

        return implode(', ', $sqlArray);
    }
}
