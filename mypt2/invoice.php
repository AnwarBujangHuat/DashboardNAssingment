<?php
  include_once 'db.php';
?>

<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Luxurious Time Piece Collection(Swiss Edition) Invoice</title>
</head>
<body data-new-gr-c-s-check-loaded="14.1006.0" data-gr-ext-installed="" class="clickup-chrome-ext_installed">
  <center>
    Luxurious Time Piece Collection(Swiss Edition), <br>
    Fakulti Teknologi Sains dan Maklumat, <br>
    UKM, Bandar Baru Bangi, <br>
    Selangor, <br>
    Darul Ehsan <br>
    <hr>

   <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_order_a177016_pt2, tbl_staff_a177016_pt2,
        tbl_customer_a177016_pt2, tbl_order_details_a177016_pt2 WHERE
        tbl_order_a177016_pt2.FLD_STAFF_ID = tbl_staff_a177016_pt2.FLD_STAFF_ID AND
        tbl_order_a177016_pt2.FLD_CUSTOMER_ID = tbl_customer_a177016_pt2.FLD_CUSTOMER_ID AND
        tbl_order_a177016_pt2.FLD_ORDER_ID = tbl_order_details_a177016_pt2.FLD_ORDER_ID AND
        tbl_order_a177016_pt2.FLD_ORDER_ID = :oid");
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
    Order ID: <?php echo $readrow['FLD_ORDER_ID']; ?> <br>
    Order Date: <?php echo $readrow['FLD_DATE_ORDERED']; ?>

    <hr>
    Staff: <?php echo $readrow['FLD_STAFF_NAME']; ?> <br>
    Customer: <?php echo $readrow['FLD_CUSTOMER_NAME']; ?> <br>
    Date: <?php echo date("d M Y"); ?>
    <hr>
    <table border="1" style="width: 50%">
      <tr>
        <td>No</td>
        <td>Product</td>
        <td>Quantity</td>
        <td>Price(RM)/Unit</td>
        <td>Total(RM)</td>
      </tr>
      <?php
      $grandtotal = 0;
      $counter = 1;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_order_details_a177016_pt2,
          tbl_product_a177016_pt2 where 
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
        <td><?php echo $counter; ?></td>
        <td><?php echo $detailrow['FLD_PRODUCT_NAME']; ?></td>
        <td><?php echo $detailrow['FLD_ORDER_QUANTITY']; ?></td>
        <td><?php echo $detailrow['FLD_PRICE']; ?></td>
        <td><?php echo $detailrow['FLD_PRICE']*$detailrow['FLD_ORDER_QUANTITY']; ?></td>
      </tr>
      <?php
        $grandtotal = $grandtotal + $detailrow['FLD_PRICE']*$detailrow['FLD_ORDER_QUANTITY'];
        $counter++;
            } // while
          $conn = null;
        ?>

        <tr>
          <td colspan="4" align="right">Grand Total</td>
          <td><?php echo $grandtotal ?></td>
        </tr>
    </table>
    <hr>
    Computer-generated invoice. No signature is required.
  </center>
</body>
</html>