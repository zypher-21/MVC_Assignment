<?php
function get_categories() { 
global $db;
$query = 'SELECT * FROM categories 
            ORDER BY categoryID';
$statement = $db->prepare($query); 
$statement->execute();
$categories = $statement->fetchAll(); 
$statement->closeCursor(); 
return $categories;
}

function get_category_name($category_id) { 
global $db;
$query = 'SELECT * FROM categories  
            WHERE categoryID = :category_id'; 
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id); 
$statement->execute();
$category = $statement->fetch(); 
$statement->closeCursor();
$category_name = $category['categoryName']; 
return $category_name;
} 

function delete_categories($category_id) {
    global $db;

    //delete all products that belong to the category
    $query = 'DELETE FROM todoitems
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();

    // Next, delete the category itself
    $query = 'DELETE FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_category($category_name) {
    global $db;

    // Insert the new category into the database
    $query = 'INSERT INTO categories
              (categoryName)
              VALUES
              (:category_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();

    // Get the ID of the newly inserted category
    $category_id = $db->lastInsertId();

    // Return the ID so that the calling code can use it if needed
    return $category_id;
}


?>