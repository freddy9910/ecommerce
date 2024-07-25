<?php
$server="localhost";
$db_user="root";
$db_password="";
$db_name="ecommerce";

$conn=new mysqli($server,$db_user,$db_password,$db_name);

$select=" SELECT * FROM products";

$result= $conn->query($select);


?>

<table class="table table-bordered table-striped">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>count</th>
        <th>img</th>
        <th>price</th>
        <th>brand</th>
        <th>dsc</th>
        <th>controls</th>
    </tr>
    <?php
    while($row=$result->fetch_assoc())
{

?>
    <tr>
        <td><?php echo $row["id"]?></td>
        <td><?php echo $row["name"]?></td>
        <td><?php echo $row["count"]?></td>
        <td><img src="img/<?php echo $row["img"]?>" style="width=:50px;height:50px" ></td>
        <td><?php echo $row["price"]?></td>
        <td><?php
        $name_brand=$row["brand"];
        $select_brand="SELECT * FROM brand where id='$name_brand' ";
        $resul_brand = $conn -> query($select_brand) ;
        $row_brand=$resul_brand->fetch_assoc();
        echo $row_brand["name"];
         ?></td>
        <td><?php echo $row["dsc"]?></td>
        <td>
              <a href="?name=update&id=<?php echo $row["id"] ?>"><button class="btn btn-primary">update</button></a>
              <a><button class="btn btn-danger">delete</button></a>
        </td>
    </tr>
    <?php
}
?>
</table>
<a href="?name=add"><button class="btn btn-success">add product</button></a>