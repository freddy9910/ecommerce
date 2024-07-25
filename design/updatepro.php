<?php
$server="localhost";
$db_user="root";
$db_password="";
$db_name="ecommerce";

$conn=new mysqli($server,$db_user,$db_password,$db_name);

$id=$_GET["id"];
$select= "SELECT * FROM products where id=$id";
$result=$conn->query($select);
$row=$result->fetch_assoc();
?>
<form action="func/do_update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="name" style="font-weight: bold;">Product Name :</label>
    <input type="text" class="form-control" name="name" value="
    <?php echo $row["name"] ?>">
</div>

<div class="form-group">
    <label for="count" style="font-weight: bold;">Count :</label>
    <input type="number" class="form-control" name="count" value="<?php echo $row["count"] ?>">
</div>
<div class="form-group">
    <label for="img" style="font-weight: bold;">Img :</label>
    <input type="file" class="form-control" name="img">
    <img src="img/<?php echo $row["img"] ?>" style="width:50px;height:50px" alt="">
</div>
<div class="form-group">
    <label for="price" style="font-weight: bold;">Price :</label>
    <input type="number" class="form-control" name="price" value="<?php echo $row["price"] ?>">
</div>
<div class="form-group">
    <label for="brand" style="font-weight: bold;">Brand :</label>
   
    <select name="brand" id="" class="form-control">
    <?php
    $select_brand="SELECT * FROM brand";
        $result_brand = $conn -> query($select_brand) ;
        while($row_brand=$result_brand->fetch_assoc())
        {
            ?>
            <option value="<?= $row_brand["id"]?>" <?php 
            if ($row["brand"]==$row_brand["id"])
            {
                echo "selected";
            }
            ?>>
            <?=$row_brand["name"]?>
        </option>
            <?php
        }
        ?>
        
    </select>
</div>
<div class="form-group">
    <label for="category" style="font-weight: bold;">Category :</label>
   
    <select name="category" id="" class="form-control">
    <?php
    $select_category="SELECT * FROM category";
        $result_category = $conn -> query($select_category) ;
        while($row_category=$result_category->fetch_assoc())
        {
            ?>
            <option value="<?= $row_category["id"]?>" <?php 
            if($row["category"]==$row_category["id"])
            {
                echo "selected";
            }
            ?>>
            <?=$row_category["name"]?>
            </option>
            <?php
        }
        ?>
        
    </select>
</div>
<div class="form-group">
    <label for="dsc" style="font-weight: bold;">Description :</label>
    <textarea name="dsc" id="" class="form-control" style="height: 100px;"><?php echo $row["dsc"] ?></textarea>
</div>

<button type="submit" class="btn btn-success form-control">update Product</button>
</form>