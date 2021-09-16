<?php
include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Luxurious Time Piece Collection(Swiss Edition) Customers</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <style>
    input[type="file"] {
      display: none;
    }
  </style>
</head>
<body>
 <?php include_once 'nav_bar.php'; ?>

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


<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <?php if (isset($_SESSION['error'])) {
        echo "<div class='alert alert-danger' role='alert'>{$_SESSION['error']}</div>";
        unset($_SESSION['error']);
      }  elseif(isset($_SESSION['success'])){
        echo "<div class='alert alert-success' role='alert'>{$_SESSION['success']}</div>";
        unset($_SESSION['success']);
      }
      ?>
      <div class="page-header">
        <?php
        if (isset($_GET['edit'])) {
          echo "<h2>EDIT {$pid}</h2>";
        } else {
          echo "<h2>Add New Products</h2>";
        }
        ?>
      </div>
      <div class="row">
        <form action="<?php echo($_SERVER['REQUEST_URI']); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
          <!-- Image -->
          <div class="col-md-4">
            <div class="thumbnail dark-1" style="background-color: #252525;">
              <img src="products/<?php echo (isset($_GET['edit']) ? $editrow['FLD_IMAGE'] : '') ?>" onerror="this.onerror=null;this.src='products/unknown.png';" id="pphoto" alt="Product Image" style="width: 100%;height: 100%;">
              <div class="caption text-center">
                <h3 id="productImageTitle" style="word-break: break-all;color:#ffffff;"><?php echo (isset($_GET['edit']) && $editrow['FLD_IMAGE'] !== '' ? explode('.', $editrow['FLD_IMAGE'])[0] : 'Product Image') ?></h3> <!-- explode like split, it will remove the element after . -->
                <p>
                  <label class="btn btn-primary">
                    <input type="file" accept="images/*" name="fileToUpload" id="inputImage" onchange="loadFile(event);" />
                    <i class="fa fa-cloud-upload"></i>Upload

                  </label>
                  <?php
                    /*if (isset($_GET['edit']) && $editrow['FLD_IMAGE'] != '') {
                      echo '<a href="#" class="btn btn-danger disabled" role="button">Delete</a>';
                    }*/
                    ?>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group">
                <label for="pid" class="col-sm-3 control-label">Product ID</label>
                <div class="col-sm-9">
                  <input type="text" name="pid" class="form-control" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; else echo $num?>"required/>
                </div>
              </div>

              <div class="form-group">
                <label for="pbrand" class="col-sm-3 control-label">Brand</label>
                <div class="col-sm-9">
                  <select name="pbrand" class="form-control" id="pbrand" required>
                    <option value="">Please select</option>
                    <option value="Blacpain" <?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Blacpain") echo "selected"; ?>>Blacpain</option>
                    <option value="Rolex" <?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Rolex") echo "selected"; ?>>Rolex</option>
                    <option value="Omega" <?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Omega") echo "selected"; ?>>Omega</option>
                    <option value="Patek Philippe" <?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Patek Philippe") echo "selected"; ?>>Patek Philippe</option>
                    <option value="Montblack" <?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Montblack") echo "selected"; ?>>Montblack</option>
                    <option value="Cartier" <?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Cartier") echo "selected"; ?>>Cartier</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="pname" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input name="pname" type="text" class="form-control" id="pname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="pprice" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-9">
                  <input name="pprice" type="number" class="form-control" id="pprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo number_format($editrow['FLD_PRICE'], 2); ?>" min="0.0" step="0.01" required>
                </div>
              </div>


              <div class="form-group">
                <label for="pdial" class="col-sm-3 control-label">Dial Colour</label>
                <div class="col-sm-9">
                  <input name="pdial" type="text" class="form-control" id="pdial" placeholder="Product Dial" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DIAL_COLOUR']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="pstrap" class="col-sm-3 control-label">Strap Colour</label>
                <div class="col-sm-9">
                  <input name="pstrap" type="text" class="form-control" id="pstrap" placeholder="Product Strap" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STRAP_COLOUR']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label for="pgender" class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-9">
                  <input name="pgender" type="text" class="form-control" id="pgender" placeholder="Product Strap" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_GENDER']; ?>" required>
                </div>
              </div>


              <div class="form-group">
                <label for="pdiameter" class="col-sm-3 control-label">Diameter</label>
                <div class="col-sm-9">
                  <input name="pdiameter" type="number" class="form-control" id="pdiameter" placeholder="Product Diameter" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DIAMETER']; ?>" min="30" required>
                </div>
              </div>

              <div class="form-group">
                <label for="pwarranty" class="col-sm-3 control-label">Warranty</label>
                <div class="col-sm-9">
                  <input name="pwarranty" type="number" class="form-control" id="pwarranty" placeholder="Product Warranty" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_WARRANTY']; ?>" min="1" required>
                </div>
              </div>

              <div class="form-group">
                <label for="pquantity" class="col-sm-3 control-label">Available Quantity</label>
                <div class="col-sm-9">
                  <input name="pquantity" type="number" class="form-control" id="pquantity" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_QUANTITY']; ?>" min="1" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <?php if (isset($_GET['edit'])) { ?>
                    <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
                    <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
                  <?php } else { ?>
                    <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
                  <?php } ?>
                  <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <hr />
        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="page-header">
              <h2>Products List</h2>
            </div>
            <table class="table table-striped table-bordered">
              <tr>
                <td>Product ID</td>
                <td>Product Brand</td>
                <td>Product Name</td>
                <td>Price(RM)</td>
                <td>Dial Colour</td>
                <td>Strap</td>
                <td>Gender</td>
                <td>Diameter</td>
                <td>Warranty</td>
                <td>Quantity</td>
                <th></th>
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
                $stmt = $conn->prepare("select * from tbl_product_a177016_pt2 LIMIT {$start_from}, {$per_page}");
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
              <?php } ?>

            </table>
          </div>


          <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
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
                    <li class="disabled"><span aria-hidden="true">«</span></li>
                  <?php } else { ?>
                    <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                    <?php
                  }
                  for ($i=1; $i<=$total_pages; $i++)
                    if ($i == $page)
                      echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
                    else
                      echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
                    ?>
                    <?php if ($page==$total_pages) { ?>
                      <li class="disabled"><span aria-hidden="true">»</span></li>
                    <?php } else { ?>
                      <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
                    <?php } ?>
                  </ul>
                </nav>
              </div>

            </div>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <script type="application/javascript">
              var loadFile = function (event) {
                var reader = new FileReader();
                reader.onload = function () {
                  var output = document.getElementById('pphoto');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
    // <?php if (isset($_GET['edit'])) { ?>
    //   document.getElementById('productImageTitle').innerText = event.target.files[1]['name'];
    // <?php } else { ?>
    //   document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
    // <?php } ?>
    document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
  };
</script>

</body>
</html>