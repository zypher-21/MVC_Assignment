<?php include '../view/header.php'; ?>
<!DOCTYPE html> 
<html>

<head> 
    <title>My To Do List</title> 
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
 <body>
    <header><h1>List items</h1></header> 
    <main>
        <h1>Add Items</h1>
        <form action="index.php" method="post" id="add_item_form">
            <input type="hidden" name="action" value="add_item">

            <label>Category:</label> 
            <select name="category_id">
            <?php foreach ($categories as $category) : ?> 
                <option value="<?php echo $category['categoryID']; ?>">
                     <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Title:</label>
            <input type="text" name="title" />
            <br>

            <label>Description:</label>
            <input type="text" name="description" />

            <label> &nbsp;</label>
            <input type="submit" value="Add Item" />
            <br>

     <?php include '../view/footer.php'; ?>
