<?php
require('../model/database.php');
require('../model/category_db.php');
require('../model/item_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}

if ($action == 'list_items') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

$category_name = get_category_name($category_id); 
$categories = get_categories();
$items = get_items_by_category($category_id); 
include('view/item_list.php'); 
} else if ($action == 'delete_items') {
    $itemNum = filter_input(INPUT_POST, 'ItemNum', 
         FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id',
        FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE || 
        $ItemNum == NULL || $ItemNum == FALSE) { 
        $error = "Missing or incorrect product id or category id."; 
        include('../view/error.php');
     } else { 
        delete_item($product_id); 
        header("Location: .?category_id=$category_id");
     }
 } else if ($action == 'add_form') {
     $categories = get_categories();
      include('../view/item_add.php');
} else if ($action == 'add_item') { 
     $category_id = filter_input(INPUT_POST, 'category_id', 
        FILTER_VALIDATE_INT);
         $title = filter_input(INPUT_POST, 'title');
         $description = filter_input(INPUT_POST, 'description');
         if ($category_id == NULL || $category_id == FALSE || $title == NULL ||
            $description == NULL) {
            $error = "Invalid item data. Check all fields and try again.";
            include ('../view/error.php');
        } else {
            add_item($category_id, $title, $description);
            header("Location: .?category_id=$category_id");
        }
    }


?>