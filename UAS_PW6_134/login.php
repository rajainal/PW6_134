<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TSUKI - Login</title>

        <!-- CSS Connect -->
        <link rel="stylesheet" href="style/log.css">
        <!-- CSS Connect -->

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


        <form action="connect.php" method="post">
            <section id="login">
                <div class="box">
                    <div class="form">
                        <h2>Sign in</h2>
                        <div class="inputBox">
                            <input type="text" name="uname" required="required">
                            <span>Username</span>
                            <i></i>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" required="required">
                            <span>Password</span>
                            <i></i>
                        </div>
                        <br><br>
                        <input type="submit" value="Login">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </form>

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

    </body>
</html>