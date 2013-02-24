<?php

set_include_path(__DIR__ . '/../library');

function __autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}


/*
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
*/

$query = MR\Query::create()->select('b.title, b.author_id, a.name')
    ->from('books b')
    ->join('authors a', 'a.id = b.author_id')
    ->where('a.name LIKE :name', array('name' => 'Ted'));

echo "\n\n" . $query . "\n\n";
