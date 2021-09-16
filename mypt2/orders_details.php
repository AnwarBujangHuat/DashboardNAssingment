<?php
include_once 'orders_details_crud.php';
?>
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Luxurious Time Piece Collection(Swiss Edition) Order Details</title>
  <style>
    form {
      /* Center the form on the page */
      margin: 0 auto;
      width: 500px;
      /* Form outline */
      padding: 1em;
      border: 1px solid #CCC;
      border-radius: 1em;
    }

    label {
      /* Uniform size & alignment */
      display: inline-block;
      width: 160px;
      text-align: left;
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

    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_order_a177016_pt2, tbl_staff_a177016_pt2,tbl_customer_a177016_pt2 WHERE
        tbl_order_a177016_pt2.FLD_STAFF_ID = tbl_staff_a177016_pt2.FLD_STAFF_ID AND
        tbl_order_a177016_pt2.FLD_CUSTOMER_ID = tbl_customer_a177016_pt2.FLD_CUSTOMER_ID AND
        FLD_ORDER_ID = :oid");
      $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>


    <hr style="margin: 20px 0;">
    <div style="margin: 0 10%">


      <form action="orders_details.php" method="post">
       
       
          <label>Order ID</label>
          <label><?php echo $readrow['FLD_ORDER_ID'] ?></label><br><br>
     
          <label>Order Date</label>
          <label><?php echo $readrow['FLD_DATE_ORDERED'] ?></label><br><br>
       
          <label>Staff</label>
          <label><?php echo $readrow['FLD_STAFF_ID'] ?></label><br><br>
     
          <label>Customer</label>
          <label><?php echo $readrow['FLD_CUSTOMER_ID'] ?></label><br><br>
  
    
    </form>

   
      
      </form>
    </div>
    <hr style="margin: 20px 0;">

    <div style="margin: 0 10%">

      <!-- add product form based on pid -->
      <hr style="margin: 20px 0;">

    <div style="margin: 0 10%">
      <form action="orders_details.php" method="post">
        
      <label style="text-align: center; margin: 10px">Product</label><select name="pid">
            <?php
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
            foreach($result as $productrow) {
              ?>
              <option value="<?php echo $productrow['FLD_PRODUCT_ID']; ?>"><?php echo $productrow['FLD_BRAND']." ".$productrow['FLD_PRODUCT_NAME']; ?></option>
              <?php
            }
            $conn = null;
            ?>
          </select>
       
         <label style="text-align: center; margin: 10px">Quantity</label><br>
          <input name="quantity" type="number" value="1" min="1">
        

        <input name="oid" type="hidden" value="<?php echo $readrow['FLD_ORDER_ID'] ?>">

        <hr style="margin: 20px 0;">
        <div style="margin: auto; display: flex; align-items: center; justify-content: center;">
          <button type="submit" name="addproduct">Add Product</button>
          <button type="reset">Clear</button>
        </div>
      </ul>
    </form>
    <hr>
    <table border="1" style="width: 50%">
      <tr>
        <td>Order Detail ID</td>
        <td>Product</td>
        <td>Quantity</td>
        <td></td>
      </tr>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_order_details_a177016_pt2,
          tbl_product_a177016_pt2 WHERE
          tbl_order_details_a177016_pt2.FLD_PRODUCT_ID = tbl_product_a177016_pt2.FLD_PRODUCT_ID AND
          FLD_ORDER_ID = :oid");
        $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
        $oid = $_GET['oid'];
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
        echo "Error: " . $e->getMessage();
      }
      foreach($result as $detailrow) {
        ?>
        <tr>
          <td><?php echo $detailrow['DETAILS_ORDER_ID']; ?></td>
          <td><?php echo $detailrow['FLD_PRODUCT_NAME']; ?></td>
          <td><?php echo $detailrow['FLD_ORDER_QUANTITY']; ?></td>
          <td>
            <a href="orders_details.php?delete=<?php echo $detailrow['DETAILS_ORDER_ID']; ?>&oid=<?php echo $_GET['oid']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
          </td>
        </tr>
        <?php
      }
      $conn = null;
      ?>
    </table>
    <hr>
    <!-- generate invoice on another tab -->
    <a href="invoice.php?oid=<?php echo $_GET['oid']; ?>" target="_blank">Generate Invoice</a>
  </center>
</body>
</html>


     