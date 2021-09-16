<?php
  include_once 'db.php';
?>
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Luxurious Time Piece Collection(Swiss Edition) Order Details</title>

  <style>
    ul {
            list-style: none;
            padding: 0;
            margin: 0 12px;
        }

        form li+li {
            margin-top: 1em;
        }


    </style>

</head>
<body data-new-gr-c-s-check-loaded="14.1006.0" data-gr-ext-installed="" class="clickup-chrome-ext_installed">
  <br>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr style="margin: 20px 0;">
    <h1>Product Details</h1>
    </center>

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

     <div style="display: flex; align-items: center; justify-content: center;">
        <table border="1" style="width: 50%">
            <tbody><tr>
                <td>
                    <form>
                        <ul>
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Product ID</label>
                                <label>:</label>
                                <label class="product_id"><?php echo $readrow['FLD_PRODUCT_ID'] ?> <br></label>
                               
                            </li>
                                
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Product Brand</label>
                                <label>:</label>
                                <label class="product brand"> <?php echo $readrow['FLD_BRAND'] ?> <br></label>
                            </li>
                              <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Product Name</label>
                                <label>:</label>
                                <label class="product brand"><?php echo $readrow['FLD_PRODUCT_NAME'] ?> <br></label>
                            </li>

                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Product Price</label>
                                <label>:</label>
                                <label class="price"> RM <?php echo $readrow['FLD_PRICE'] ?> <br></label>
                            </li>
                           
                             <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Product Dial</label>
                                <label>:</label>
                                <label class="Product Color"><?php echo $readrow['FLD_DIAL_COLOUR'] ?> <br></label>
                            </li>
                             <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Product Strap</label>
                                <label>:</label>
                                <label class="Product Strap"><?php echo $readrow['FLD_STRAP_COLOUR'] ?> <br></label>
                            </li>
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Gender</label>
                                <label>:</label>
                                <label class="Gender"><?php echo $readrow['FLD_GENDER'] ?> <br></label>
                            </li>
                              <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Diameter</label>
                                <label>:</label>
                                <label class="details"> <?php echo $readrow['FLD_DIAMETER'] ?> <br></label>
                            </li>
                              </li>
                               <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Warranty</label>
                                <label>:</label>
                                <label class="details"><?php echo $readrow['FLD_WARRANTY'] ?> <br></label>
                            </li>
                            <li>
                                <label style="display: inline-block;width: 160px; text-align: left;">Quantity</label>
                                <label>:</label>
                                <label class="qty"><?php echo $readrow['FLD_QUANTITY'] ?> <br></label>
                            </li>
                         
                        </ul>
                        
                    </form>
                </td>

             
            </tr>
               <td>
                   <center>
                    <?php if(file_exists('products/'. $readrow['FLD_PRODUCT_ID'].'.png')){
                         echo '<img width=50%; src="products/'.$readrow['FLD_PRODUCT_ID'].'.png"'.'>';
                        }
                     else{
                      echo '<img width=50%; src="products/unknown.png"';
                    }?>
                       
</center>
                    
                   </td>
         </tbody></table>
    </div>


</body></html>
    

