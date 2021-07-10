<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sai Fitness | Payments</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style type="text/css">
        .lbl{
            font-weight:900;
            font-size:large;
        }
    </style>
    <script type="text/javascript">
        function showwhide(prceed){
            var qrcode=document.getElementById("qrcode");
            if(prceed.value=="show"){
                qrcode.style.display="block";
                prceed.value="hide";
            alert("Scan the QR Code shown below to make the payment or pay on 8291627227. After paying, enter the transaction id in the textbox given below ")

            }
            else{
                qrcode.style.display="none";
                prceed.value="show";
            }
        }
    </script>
</head>
<body>
    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="container">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/lognew112.jpg" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li class="active"><a href="./admission.html">Admission</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="./contact.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <section class="breadcrumb-section set-bg" data-setbg="img/about-breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-text">
                        <h2>Payments</h2>
                        <div class="site-breadcrumb">
                            <a href="index.html" class="sb-item">Home</a>
                            <a href="admission.html" class="sb-item">Admission</a>                            
                            <span class="sb-item">Payments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Side Section ends-->
        <br /><br /><br /><br /><br />
    <?php
        if(isset($_POST['submit']))
        {
            $price = $_POST['price'];
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $Email = $_POST['Email'];
            $Mobile = $_POST['Mobile'];
            $Address1 = $_POST['Address1'];
            $Address2 = $_POST['Address2'];

            if(isset($_POST['submit']) && isset($_FILES['FileUpload'])){
                $img_name = $_FILES['FileUpload']['name'];
                $img_size = $_FILES['FileUpload']['size'];
                $tmp_name = $_FILES['FileUpload']['tmp_name'];
                $error = $_FILES['FileUpload']['error'];

                if ($error === 0) {
                    if ($img_size > 200000) {
                        echo "<script>alert('Sorry your file size is too large,please go back and upload a different image under 100kb');window.location.href='admission.html';</script>";
                    }
                    else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_exs = array("jpg", "jpeg", "png"); 
                        
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'uploads/'.$new_img_name;
	                        move_uploaded_file($tmp_name, $img_upload_path);

                        }
                        else {
                            echo "<script>alert('You cant upload files of this type,upload only jpg,png or jpeg file');window.location.href='admission.html';</script>";
                        }
                    }
                }
                else {
                    echo "<script>alert('Unknown Error Occured');window.location.href='admission.html';</script>";
                }
            }
        }
    ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-12 col-sm-12 col-md-12">
            <div class="schedule-table"  style="background-image:url('img/formback.jpg');box-shadow:0px 0px 10px 0px #000;border-radius:8px;">
                <div style="text-align:center;"><br />
                    <div class="container">
                        <img src="img/lognew112.jpg" alt="logo">
                    </div><br />
                    <table class="table">
                        <thead class="thead-dark">
                            <b>PREVIEW</b>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NAME:</td>
                                <td><?php echo "$FirstName $LastName" ?>
                            </td>
                            </tr>
                            <tr>
                                <td>EMAIL:</td>
                                <td><?php echo "$Email" ?></td>
                            </tr>
                            <tr>
                                <td>MOBILE:</td>
                                <td><?php echo "$Mobile" ?></td>
                            </tr>
                            <tr>
                                <td>ADDRESS:</td>
                                <td>
                                    <?php echo "$Address1,$Address2" ?>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td> <label class="lbl" style="color:red;">Total Amount to be Paid</label></td>
                                <td>
                                    <label class="lbl" name="price" style="color:green;"><?php echo "₹ $price" ?></label>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="button" id="prceed" class="btn-success" onclick="showwhide(this)" value="show" style="border-radius:5px;padding:7px;"></input></td>
                                <td><button class="btn-danger" style="border-radius:5px;padding:7px;"><a style="color:white" href="index.html">Cancel</a></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><br />
<!--Payment Detail ends here-->

<!--QR Code sections start here-->
<div id="qrcode" class="container-fluid" style="display:none">        
    <div class="row justify-content-center">
        <div class="col-lg-2 col-8 col-md-6 col-sm-8">
            <form action="test.php" method="POST">
                <img src="img/qrcode.jpg" alt="qrcode" style="border-radius:8px;box-shadow:0px 0px 10px 0px #000;"><br /> <br />
                <input type="text" class="form-control" name="transaction" placeholder="enter your transaction id" style="border:3px solid black;width:100%;" id="transaction" required>
                <input type="hidden" name="FirstName" value="<?php echo "$FirstName" ?>">
                <input type="hidden" name="LastName" value="<?php echo "$LastName" ?>">
                <input type="hidden" name="Email" value="<?php echo "$Email" ?>">
                <input type="hidden" name="Mobile" value="<?php echo "$Mobile" ?>">
                <input type="hidden" name="Address1" value="<?php echo "$Address1" ?>">
                <input type="hidden" name="Address2" value="<?php echo "$Address2" ?>">
                <input type="hidden" name="price" value="<?php echo "$price" ?>">
                <input type="hidden" name="img_name" value="<?php echo "$img_name" ?>">
                <input type="hidden" name="img_size" value="<?php echo "$img_size" ?>">
                <input type="hidden" name="tmp_name" value="<?php echo "$tmp_name" ?>">
                <input type="hidden" name="error" value="<?php echo "$error" ?>">
                <input type="hidden" name="new_img_name" value="<?php echo "$new_img_name" ?>"><br />
            <div class="row justify-content-center">
            <button name="submit" type="submit" class="btn btn-success">Proceed</button>
            </div>
            </form>
        </div>
    </div>
</div>
<br />
<!--QR Code ends here-->

<footer class="footer-section">
        <div class="register normal-register">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="#" target="_blank">GROWTECH</a>

                        </div>
                        <div class="footer-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>