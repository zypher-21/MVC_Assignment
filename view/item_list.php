<?php
include '../view/header.php';
?>
<section>
<!--display a table of To Do Items --> 
<h2><?php echo $category_name; ?></h2> 
<table> 
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th class="right">Category ID</th> 
        <th>&nbsp;</th>
    </tr>

    <?php foreach ($items as $item) : ?>
    <tr>
        <td><?php echo $item['Title']; ?></td>
        <td><?php echo $product['Description']; ?></td>
        <td class="right"><?php echo $product['categoryID']; ?></td>
    </tr>
     <?php endforeach; ?> 
    </table>
     <p><a href="add_item_form.php">Add Items</a></p> 
    </section>
    <?php
    include '../view/footer.php';
    ?>
