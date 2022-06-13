<?php include 'db_connect.php' ?>
<?php
 $color = $con->query("SELECT skill FROM programmer WHERE id = 1 ");
 
 while ($row = $color->fetch_assoc()) {

    $my_array1 = explode(",", $row['skill']);
}
    
?>
 <h3><?php echo $my_array1[0]?></h3>
 <h3><?php echo $my_array1[1]?></h3>
 <h3><?php echo $my_array1[2]?></h3>
 <select>
        <option selected="selected">Choose one</option>
        <?php

        
        // Iterating through the product array
        foreach($my_array1 as $item){
            echo "<option value='strtolower($item)'>$item</option>";
        }
        ?>
    </select>