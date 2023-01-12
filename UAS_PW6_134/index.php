<?php 
    include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TSUKI - Home</title>

        <!-- CSS Connect -->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/lightslider.css">
        <!-- CSS Connect -->

        <!-- JS Connect -->
        <script src="function/jquery.js"></script>
        <script src="function/lightslider.js"></script>
        <!-- JS Connect -->

        <!-- ICON Connect -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- ICON Connect -->

    </head>

    <body id="home">
        
        <section id="navbar">
            <header>
                <div class="logo">
                    <img src="image/tsukilogo.png" style="float: left;" height="42" width="50" alt="">
                    
                </div>
                <div class="logo2">
                    <p>月屋 - 買い物</p>
                </div>
                <nav>
                    <ul>
                        <li><button><a href="index.php">Home</a></button></li>
                        <li><button><a href="about.php">About</a></button></li>
                    </ul>
                </nav>
                <button><a href="login.php">Login</a></button>
            </header>
        </section>

        <section id="product">
            <div class="row mb-3">
                <div class="col">
                    <h2>発売中 - ON SALE</h2>
                </div>
            </div>
            <ul id="autoWidth" class="cs-hidden">
            
                    <?php 
                    
                        $select_products = mysqli_query($conn, "SELECT * FROM products");
                        if (mysqli_num_rows($select_products) > 0) {
                            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                        

                    ?>
                        <form action="" method="post">
                            <li class="item-a">
                                <div class="box">
                                    <div class="slide-img">
                                        <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                                        <div class="overlay">
                                            <a href="#" class="buy-btn">Quick View</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#"><?php echo $fetch_product['name']; ?></a>
                                        </div>
                                        <a href="#" class="price">$<?php echo $fetch_product['price']; ?>.00</a>
                                    </div>
                                </div>
                            </li>
                        </form>

                    <?php 
                    
                            };
                        };
                    
                    ?>

            </ul>
        </section>

        <section id="accessories">
            <div class="row mb-3">
                <div class="col">
                    <h2>付属品 - ACCESSORIES</h2>
                </div>
            </div>
            <table>
                <tr>
                    <td><img src="image/blackbeanies.jpg" alt=""></td>
                    <td><img src="image/socks.jpg" alt=""></td>
                    <td><img src="image/whitebeanies.jpg" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <div class="type">
                            <a href="#">楽しい Tanoshii / 悲しみ Kanashimi Beanies</a>
                        </div>
                        <a href="#" class="price">$36.00</a>
                    </td>
                    <td>
                        <div class="type">
                            <a href="#">Tsuki Socks</a>
                        </div>
                        <a href="#" class="price">$12.00</a>
                    </td>
                    <td>
                        <div class="type">
                            <a href="#">Mischief Beanie</a>
                        </div>
                        <a href="#" class="price">$09.00</a>
                    </td>
                </tr>
            </table>
        </section>

        <section id="ads-st">
            <div class="image-ads">
                <img src="image/adsy.png" alt="">
                <button class="button-ov-st"><a href="#">VIEW MORE COLLECTION</a></button>
            </div>
        </section>

        <section id="accessories-two">
            <table>
                <tr>
                    <td><img src="image/capblack.jpg" alt=""></td>
                    <td><img src="image/totebag.jpg" alt=""></td>
                    <td><img src="image/cap.jpg" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <div class="type">
                            <a href="#">Tsuki Logo Embroidered Cap Black-Pink</a>
                        </div>
                        <a href="#" class="price">$34.00</a>
                    </td>
                    <td>
                        <div class="type">
                            <a href="#">Melted Tote Bag</a>
                        </div>
                        <a href="#" class="price">$28.00</a>
                    </td>
                    <td>
                        <div class="type">
                            <a href="#">Tsuki Logo Embroidered Cap White-Pink</a>
                        </div>
                        <a href="#" class="price">$34.00</a>
                    </td>
                </tr>
            </table>
        </section>

        <section id="ads-nd">
            <div class="image">
                <img src="image/ads.png" alt="">
                <button class="button-ov-nd"><a href="#">VIEW MORE COLLECTION</a></button>
            </div>
        </section>

        <section id="footer">
            <footer>
                <div class="footer-content">
                    <h3>その月は月です</h3>
                    <p>Subscribe to be the first to hear about our latest collections, offers and news about the brand.</p>
                    <ul class="socials">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    </ul>
                </div>
                <div class="footer-bottom">
                    <p>copyright &copy;2020 その月は月です. designed by <span>Raja Inal</span></p>
                </div>
            </footer>
        </section>

        <!-- JS Connect -->
        <script src="function/script.js"></script>
        <script src="function/jquery.js"></script>
        <script src="function/lightslider.js"></script>
        <!-- JS Connect -->
    </body>
</html>