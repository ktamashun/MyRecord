<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tamás
 * Date: 2013.02.25.
 * Time: 0:38
 * To change this template use File | Settings | File Templates.
 */

// Creating new Book model object
$book = Book::build(array(
    // data
));

// Creating new model object, and saving it to the database
$book = Book::create(array(
    // data
));

// Mass assigning values to its attributes
$book->attributes = array(
    // data
);

Book::model()->select('title');
