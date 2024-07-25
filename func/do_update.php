<?php

$server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ecommerce";

$conn = new mysqli($server, $db_user, $db_password, $db_name);

if (isset($_POST['name']) && isset($_POST['count']) && isset($_POST['price']) && isset($_POST['brand']) && isset($_POST['category']) && isset($_POST['dsc'])) {
    $name = $_POST['name'];
    $count = $_POST['count'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $dsc = $_POST['dsc'];

    if($_FILES['img']["error"]==0) {
    $new_image_names = [];

    foreach ($_FILES['images']['tmp_name'] as $index => $tmp_name) {
        if (!empty($tmp_name)) {
            $image_name = $_FILES['images']['name'][$index];
            $image_size = $_FILES['images']['size'][$index];
            $image_tmp = $_FILES['images']['tmp_name'][$index];
            $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

            $allowed_extensions = ['jpg', 'png', 'jpeg', 'gif'];

            if (in_array($image_ext, $allowed_extensions)) {
                if ($image_size <= 30000000) {
                    $new_image_name = time() . rand() . '.' . $image_ext;

                    move_uploaded_file($image_tmp, '../img/' . $new_image_name);

                    $new_image_names[] = $new_image_name;
                } else {
                    echo "File is too large. Please upload a file smaller than 300 KB.";
                    exit;
                }
            } else {
                echo "Invalid image format. Please upload a JPG, PNG, JPEG, or GIF file.";
                exit;
            }
        }
    }
}
$update="UPDATE products SET name='$name',count='$count',img='$new_name',
price='$price',brand='$brand',category='$category',dsc='$dsc' WHERE id='$id'";
}
else {
    $update="UPDATE products SET name='$name',count='$count',
    price='$price',brand='$brand',category='$category',dsc='$dsc' WHERE id='$id'";

}
    $conn->query($insert);
    header("location:../products.php")
?>