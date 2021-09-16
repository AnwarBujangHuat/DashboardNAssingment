<?php
  include_once 'db.php';
?>
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Luxurious Time Piece Collection(Swiss Edition) Order Details</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel= "stylesheet" href="canva.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>

      .navbar {
        padding: 25px;
        border: 0;
        border-radius: 0;
        margin-bottom: 0;
        font-size: 20px;
        letter-spacing: 5px;
      }
      .bg-3 {
        background-color: #000000; /* White */
        color: #000000;
       
        width: 120%;
      }
    </style>



  <nav class="navbar navbar-default" style="background-color: #000000">

    <div class="navbar-header">
      <img width=70vw; src='logo.png'img align="left" style="padding-right: 15px;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>q
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color: #fff">Home</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="products.php" style="color: #fff">Products</a></li>
        <li><a href="customers.php" style="color: #fff">Customer</a></li>
        <li><a href="staffs,php" style="color: #fff">Staffs</a></li>
        <li><a href="orders.php" style="color: #fff">Order</a></li>
      </ul>
    </div>
    
  </nav>
    </head>
<body>
  <div class="header">
   <section id= "section header"></section>
   <div class= "canvas-wrap">
    <canvas id ="canvas"></canvas>

    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_product_a177016_pt2 WHERE FLD_PRODUCT_ID = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
   
   
<div class="container-fluid bg-3">

      <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center">
            <?php if(file_exists('products/'. $readrow['FLD_PRODUCT_ID'].'.png')){
                         echo '<img width=290px; src="products/'.$readrow['FLD_PRODUCT_ID'].'.png"'.'>';
                        }
                     else{
                      echo '<img width=100%; src="products/unknown.png"';
                    }?>
     
    </div>
   <div class="col-xs-12 col-sm-5 col-md-4">
      <div class="panel panel-default">
      <div class="panel-heading"><strong>Product Details</strong></div>
      <div class="panel-body">
          Below are specifications of the product.
      </div>
      <table class="table">
        <tr>
          <td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
          <td><?php echo $readrow['FLD_PRODUCT_ID'] ?></td>
        </tr>
        <tr>
          <td><strong>BRAND</strong></td>
          <td><?php echo $readrow['FLD_BRAND'] ?></td>
        </tr>
         <tr>
          <td><strong>NAME</strong></td>
          <td><?php echo $readrow['FLD_PRODUCT_NAME'] ?></td>
        </tr>
        <tr>
          <td><strong>Price</strong></td>
          <td>RM <?php echo $readrow['FLD_PRICE'] ?></td>
        </tr>
        <tr>
          <td><strong>BEZEL</strong></td>
          <td><?php echo $readrow['FLD_BEZEL'] ?></td>
        </tr>
        <tr>
          <td><strong>DIAL</strong></td>
          <td><?php echo $readrow['FLD_DIAL_COLOUR'] ?></td>
        </tr>
        <tr>
          <td><strong>STRAP</strong></td>
          <td><?php echo $readrow['FLD_STRAP_COLOUR'] ?></td>
        </tr>
        <tr>
          <td><strong>GENDER</strong></td>
          <td><?php echo $readrow['FLD_GENDER'] ?></td>
        </tr>
         <tr>
          <td><strong>DIAMETER</strong></td>
          <td><?php echo $readrow['FLD_DIAMETER'] ?></td>
        </tr>
         <tr>
          <td><strong>WARRANTY</strong></td>
          <td><?php echo $readrow['FLD_WARRANTY'] ?></td>
        </tr>
         <tr>
          <td><strong>QUANTITY</strong></td>
          <td><?php echo $readrow['FLD_QUANTITY'] ?></td>
        </tr>

      </table>
     
      </div>
    </div>
  </div>
</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 

</body></html>
    
           
