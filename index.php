<?php
session_start();
require_once('./resources/config.php');
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $stmt = $conn->prepare("SELECT * FROM settings");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $title = $result['title'];
    $footer = $result['footer'];
    $fevicon = $result['fevicon'];
    $login_image = $result['login_image'];
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="public/assets/uploads/settings/<?= $fevicon ?>">
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- css files -->
    <link href="public/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="public/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //css files -->

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- //google fonts -->
    <style>
        .alert-warning {
            border-color: #FF9149 !important;
            background-color: #FFBC90 !important;
            color: #963B00 !important;
        }

        .alert {
            position: relative;
        }

        .mb-2,
        .my-2 {
            margin-bottom: 1.5rem !important;
        }

        .alert {
            padding: .75rem 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }
    </style>
</head>

<body>
    <div class="signupform">
        <div class="container">
            <!-- main content -->
            <div class="agile_info">
                <div class="w3l_form">
                    <div class="left_grid_info">
                        <h1>theYoungWolf Pharmacy</h1>
                        <p>This is a pharmacy management system created by theYoungWolf Productions.</p>
                        <?php if ($login_image != '') { ?>
                            <img src="public/assets/uploads/settings/<?= $login_image ?>" alt="" />
                        <?php } else { ?>
                            <img src="public/assets/images/image.jpg" alt="" />
                        <?php } ?>
                    </div>
                </div>
                <div class="w3_info">
                    <h2>Login to your Account</h2>
                    <p>Enter your details to login.</p>
                    <?php require_once('public/assets/constants/check-reply.php'); ?>
                    <form action="public/assets/app/auth.php" method="POST" autocomplete="OFF">
                        <label>Email Address</label>
                        <div class="input-group">
                            <span class="fa fa-envelope" aria-hidden="true"></span>
                            <input type="email" name="email" placeholder="Enter Your Email" required="">
                        </div>
                        <label>Password</label>
                        <div class="input-group">
                            <span class="fa fa-lock" aria-hidden="true"></span>
                            <input type="password" name="password" placeholder="Enter Password" required="">
                        </div>
                        <button class="btn btn-danger btn-block" type="submit">Login</button>
                    </form>
                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- footer -->
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> Pharmacy login form. All Rights Reserved | Design by TheYoungWolf Productions</p>
        </div>
        <!-- footer -->
    </div>
</body>

</html>