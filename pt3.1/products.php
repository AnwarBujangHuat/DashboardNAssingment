<?php
include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Luxurious Time Piece Collection(Swiss Edition) Products</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel= "stylesheet" href="canva.css">
  <link href="style.css" rel="stylesheet">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>     
      .bg-3 {
        background-color: #ffffff; /* White */
        color: #555555;
      }
    </style>
  </head>
  <body>
     <?php include_once 'nav_bar.php'; ?>
    <div class="header">
     <section id= "section header"></section>

      <form action="products.php" method="post">

        <?php
      // Read
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_product_a177016_pt2");
          $stmt->execute();
          $result = $stmt->fetchAll();


        }
        catch(PDOException $e){
          echo "Error: " . $e->getMessage();
        }
        foreach($result as $readrow) {
          ?>    
          <?php $readrow['FLD_PRODUCT_ID']; ?>
          <?php
        }
        $num = ltrim($readrow['FLD_PRODUCT_ID'], 'R')+1;
        $num = 'R'.str_pad($num,3,"0",STR_PAD_LEFT);

        $conn = null;
        ?>


<center>


        <div class="form-group">
          <label for="productid" class="col-sm-3 control-label"style="color:white">PRODUCT ID</label>
          <div class="col-sm-9">
           <input name="pid" type="text" class="form-control" id="productid"  value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; else echo $num?>"required><br>
          </div>
        </div>


        <div class="form-group">
          <br><label for="product_brand" class="col-sm-3 control-label" style="color:white" >BRAND</label>
          <div class="col-sm-9">
            <select name="pbrand"style="color:black" class="form-control"required>
              <option value="">----Select----</option>
              <option value="Blacpain"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Blacpain") echo "selected"; ?>>Blacpain</option>
              <option value="Rolex"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Rolex") echo "selected"; ?>>Rolex</option>
              <option value="Omega"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Omega") echo "selected"; ?>>Omega</option>
              <option value="Patek Philippe"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Patek Philippe") echo "selected"; ?>>Patek Philippe</option>
              <option value="Montblack"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Montblack") echo "selected"; ?>>Montblack</option>
              <option value="Cartier"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Cartier") echo "selected"; ?>>Cartier</option>
            </select><br>
          </div>
        </div>


        <div class="form-group">
          <br><label for="pname" class="col-sm-3 control-label"style="color:white">NAME</label>
          <div class="col-sm-9">
            <input type="text" name="pname" class="form-control" style="color:black" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>"required><br>
          </div>
        </div>

        <div class="form-group">
          <br><label for="pprice" class="col-sm-3 control-label"style="color:white">PRICE</label>
          <div class="col-sm-9">
            <input type="number" min="1" step="any" name="pprice"style="color:black" class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRICE']; ?>"required><br>
          </div>
        </div>

        <div class="form-group">
          <br><label for="pbezel" class="col-sm-3 control-label"style="color:white">BEZEL</label>
          <div class="col-sm-9">
           <input type="text" name="pbezel" style="color:black" class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_BEZEL']; ?>"required><br>  
         </div>
       </div>

       <div class="form-group">
        <br><label for="pdial" class="col-sm-3 control-label"style="color:white">DIAL</label>
        <div class="col-sm-9">

          <input type="text" name="pdial" style="color:black" class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DIAL_COLOUR']; ?>"required><br>
        </div>
      </div>

      <div class="form-group">
        <br><label for="pstrap" class="col-sm-3 control-label"style="color:white">STRAP</label>
        <div class="col-sm-9">

          <input type="text" name="pstrap" style="color:black" class="form-control"  value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STRAP_COLOUR']; ?>"required><br>
      </div>



      <div class="form-group">
        <br><label for="pgender" class="col-sm-3 control-label"style="color:white">GENDER</label>
        <div class="col-sm-9">

          <select name="pgender" class="form-control" style="color:black"required>
            <option value="">----Select----</option>
            <option value="Male" <?php if(isset($_GET['edit'])) if($editrow['FLD_GENDER']=="Male") echo "selected"; ?>>Male</option>
            <option value="Female"<?php if(isset($_GET['edit'])) if($editrow['FLD_GENDER']=="Female") echo "selected"; ?>>Female</option>
            <option value="Unisex"<?php if(isset($_GET['edit'])) if($editrow['FLD_GENDER']=="Unisex") echo "selected"; ?>>Unisex</option>
          </select><br>
        </div>
      </div>



      <div class="form-group">
        <br><label for="pdiameter" class="col-sm-3 control-label"style="color:white">DIAMETER</label>
        <div class="col-sm-9">
          <input type="number" min="30" step="any" name="pdiameter" class="form-control"  style="color:black" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DIAMETER']; ?>"required><br>
        </div>
      </div>

      <div class="form-group">
        <br><label for="pwarranty" class="col-sm-3 control-label"style="color:white">WARRANTY</label>
        <div class="col-sm-9">
          <input type="number" min="1" step="any" name="pwarranty" class="form-control" style="color:black" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_WARRANTY']; ?>"required><br>
        </div>
      </div>

      <div class="form-group">
        <br><label for="pquantity" class="col-sm-3 control-label"style="color:white">QUANTITY</label>
        <div class="col-sm-9">
          <input type="number" name="pquantity"  class="form-control" min="1" max="100" step="1" style="color:black" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_QUANTITY']; ?>"required><br>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
            <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
            <button class="btn btn-default"style="background-color:white"  type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
            <button class="btn btn-default"style="background-color:white"  type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default"style="background-color:white"  type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
  </div>
  </center>




<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
    <h2>Product List</h2>
  </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <td>Product ID</td>
            <td>Product Brand</td>
            <td>Product Name</td>
            <td>Price(RM)</td>
            <td>Bezel</td>
            <td>Dial</td>
            <td>Strap</td>
            <td>Gender</td>
            <td>Diameter</td>
            <td>Warranty</td>
            <td>Quantity</td>
            <td></td>
          </tr>
          <?php
      // Read
          $per_page = 5;
          if (isset($_GET["page"]))
            $page = $_GET["page"];
          else
            $page = 1;
          $start_from = ($page-1) * $per_page;
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM tbl_product_a177016_pt2");
            $stmt = $conn->prepare("select * from tbl_product_a177016_pt2 LIMIT $start_from, $per_page");
            $stmt->execute();
            $result = $stmt->fetchAll();


          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          }
          foreach($result as $readrow) {
            ?>   

            <tr>
              <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
              <td><?php echo $readrow['FLD_BRAND']; ?></td>
              <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
              <td><?php echo $readrow['FLD_PRICE']; ?></td>
              <td><?php echo $readrow['FLD_BEZEL']; ?></td>
              <td><?php echo $readrow['FLD_DIAL_COLOUR']; ?></td>
              <td><?php echo $readrow['FLD_STRAP_COLOUR']; ?></td>
              <td><?php echo $readrow['FLD_GENDER']; ?></td>

              <td><?php echo $readrow['FLD_DIAMETER']; ?></td>
              <td><?php echo $readrow['FLD_WARRANTY']; ?></td>
              <td><?php echo $readrow['FLD_QUANTITY']; ?></td>
              <td>


                <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
                <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
              </td>
            </tr>
            <?php    
          }

          $conn = null;
          ?>

        </table>
      </div>
 
   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" >
      <nav>
        <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_product_a177016_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="page-item disabled"><span class="page-link" aria-hidden="true">&laquo;</span></li>
          <?php } else { ?>
            <li class='page-item'><a class="page-link disabled" href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"page-item active\"><a class='page-link' href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li class=\"page-item\"><a class='page-link' href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="page-item disabled"><span class="page-link" aria-hidden="true">&raquo;</span></li>
          <?php } else { ?>
            <li class='page-item'><a class="page-link disabled" href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</body></html>