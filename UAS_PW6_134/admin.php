<?php
    session_start();
    include 'db_conn.php';

        if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
        // memeriksa apakah variabel $_SESSION['id'] dan $_SESSION['user_name'] sudah diset atau belum. Jika sudah diset, maka kondisi akan bernilai true dan jika belum diset, maka kondisi akan bernilai false

        if (isset($_POST['add_product'])) {
            $p_name = $_POST['p_name'];
            $p_price = $_POST['p_price'];
            $p_image = $_FILES['p_image']['name'];
            $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
            $p_image_folder = 'uploaded_img/'.$p_image;
        
            $insert_query = mysqli_query($conn, "INSERT INTO products(name, price, image) VALUES ('$p_name', '$p_price', '$p_image')") or die('query failed');
        
            if ($insert_query) {
                move_uploaded_file($p_image_tmp_name, $p_image_folder);
                header('Location: admin.php');
                exit;
            }else {
                header('Location: logout.php');
                exit;
            }
        }

        if (isset($_GET['delete'])) {
            $delete_id = $_GET['delete'];
            $delete_query = mysqli_query($conn, "DELETE FROM products WHERE id = $delete_id") or die ('query failed');
            if ($delete_query){
                header('Location: admin.php');
                exit;
            }else {
                header('Location: logout.php');
                exit;
            };
        };

        if (isset($_POST['update_product'])) {
            $update_p_id = $_POST['update_p_id'];
            $update_p_name = $_POST['update_p_name'];
            $update_p_price = $_POST['update_p_price'];
            $update_p_image = $_FILES['update_p_image']['name'];
            $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
            $update_p_image_folder = 'uploaded_img/'.$update_p_image;

            $update_query = mysqli_query($conn, "UPDATE products SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

            if ($update_query) {
                move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
                header('Location: admin.php');
                exit;
            }else {
                header('Location: logout.php');
                exit;
            }
        }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>

        <!-- CSS connect -->
        <link rel="stylesheet" href="style/admin.css">
        <!-- CSS connect -->

        <!-- ICON Connect -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <!-- ICON Connect -->

    </head>
    <body>

        <?php 
            include 'header.php';
        ?>

        <div class="container">
            <section id="crud">
                <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                    <!-- mengirim sebuah file ke server dengan menggunakan metode POST -->
                    <h3>Add a New Product</h3>
                    <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
                    <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
                    <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                    <input type="submit" value="add the product" name="add_product" class="btn">
                </form>
            </section>
        </div>

        <section class="display-product-table">
            <table>
                <thead>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                        $select_products = mysqli_query($conn, "SELECT * FROM products");
                        if (mysqli_num_rows($select_products) > 0) {
                            // memeriksa apakah ada data produk di dalam database atau tidak
                            while ($row = mysqli_fetch_assoc($select_products)) {
                                //  mengulang data produk yang ada di dalam database
                                ?>
                            <!-- mengambil semua data produk dari database dan menampilkannya di halaman web. Query SELECT akan mengambil semua data produk kemudian menampilkannya dalam bentuk tabel -->
                            <tr>
                                <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td>$<?php echo $row['price']; ?>/-</td>
                                <td>
                                    <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"><i class="fas fa-trash"></i> Delete </a>
                                    <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"><i class="fas fa-edit"></i> Update </a>
                                </td>
                            </tr>

                            <?php
                            };
                        }else{
                            echo "<div class='empty'>No Product Added</div>";
                        }
                    ?>
                </tbody>
            </table>
        </section>

        <section class="edit-form-container">
            <?php 
                if (isset($_GET['edit'])) {
                $edit_id = (int)$_GET['edit'];
                $edit_query = "SELECT * FROM products WHERE id = $edit_id";
                $result = mysqli_query($conn, $edit_query);
                if (mysqli_num_rows($result) > 0) {
                    $fetch_edit = mysqli_fetch_assoc($result);
                // mengambil data dari basis data. Pertama, kode mengecek apakah ID produk telah diset. Jika ya, maka kode akan mengirim query ke database untuk mengambil data produk dengan ID yang dimasukkan. Jika query berhasil dieksekusi, maka akan mengembalikan satu baris data
            ?>

            <form action="admin.php" method="post" enctype="multipart/form-data">
                <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                <input type="submit" value="update the product" name="update_product" class="btn">
                <input type="reset" value="cancel" id="close-edit" class="option-btn">
            </form>

            <?php
                    };
                    echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
                }
            ?>
        </section>


        <!-- JS Connect -->
        <script src="function/admin.js"></script>
        <!-- JS Connect -->

    </body>
</html>

<?php
    }else {
        header("Location: login.php");
        exit();
    }
?>