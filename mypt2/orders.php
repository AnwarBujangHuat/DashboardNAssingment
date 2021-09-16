<?php
  include_once 'orders_crud.php';
?>
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Luxurious Time Piece Collection(Swiss Edition) Orders</title>
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

     input,
    textarea,
    select {

      width: 300px;
      box-sizing: border-box;

      /* Match form field borders */
      border: 1px solid #999;
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
    <div style="margin: 0 10%">

      <form action="orders.php" method="post">

            <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_order_a177016_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>    
        <?php $readrow['FLD_ORDER_ID']; ?>
      <?php
      }
      $num = ltrim($readrow['FLD_ORDER_ID'], 'O')+1;
      $num = 'O'.str_pad($num,3,"0",STR_PAD_LEFT);
     
      $conn = null;
      ?>


        <label for="oid">Order ID</label><input type="text" name="oid" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_ORDER_ID']; else echo $num?>"><br><br>

        <label for="odate">Order Date</label><input name="odate" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DATE_ORDERED']; ?>"disabled=""> <br><br>

        <label for="sid">Staff</label><select name="sid"><?php
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staff_a177016_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $staffrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['FLD_STAFF_ID']==$staffrow['FLD_STAFF_ID'])) { ?>

          <option value="<?php echo $staffrow['FLD_STAFF_ID']; ?>" selected><?php echo $staffrow['FLD_STAFF_NAME'];?></option>
        <?php } else { ?>
          <option value="<?php echo $staffrow['FLD_STAFF_ID']; ?>"><?php echo $staffrow['FLD_STAFF_ID'];?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 

            </select><br>



            <br><label for="cid">Customer</label><select name="cid">
              <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customer_a177016_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $custrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['FLD_CUSTOMER_ID']==$custrow['FLD_CUSTOMER_ID'])) { ?>
          <option value="<?php echo $custrow['FLD_CUSTOMER_ID']; ?>" selected><?php echo $custrow['FLD_CUSTOMER_ID']?></option>
        <?php } else { ?>
          <option value="<?php echo $custrow['FLD_CUSTOMER_ID']; ?>"><?php echo $custrow['FLD_CUSTOMER_ID']?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
            </select><br><br>

        <hr style="margin: 10px 0;">
        <div style="margin: auto; display: flex; align-items: center; justify-content: center;">
            <?php if (isset($_GET['edit'])) { ?>
            <button type="submit" name="update">Update</button>
            <?php } else { ?>
            <button type="submit" name="create">Create</button>
            <?php } ?>
          <button type="reset" style="margin-left: 2em">Clear</button>  
        </div>
      </form>
    </div>
    <hr style="margin: 50px 0;">
    <div style="display: flex; align-items: center; justify-content: center;">
      <table border="1" style="width: 70%">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Staff</th>
            <th>Customer</th>
            <th></th>
          </tr>
        </thead>
       
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_order_a177016_pt2, tbl_staff_a177016_pt2, tbl_customer_a177016_pt2 WHERE ";
        $sql = $sql."tbl_order_a177016_pt2.FLD_STAFF_ID =tbl_staff_a177016_pt2.FLD_STAFF_ID and ";
        $sql = $sql."tbl_order_a177016_pt2.FLD_CUSTOMER_ID = tbl_customer_a177016_pt2.FLD_CUSTOMER_ID ORDER BY FLD_ORDER_ID" ;
       
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $orderrow) {
      ?>
      <tr>
        <td><?php echo $orderrow['FLD_ORDER_ID']; ?></td>
        <td><?php echo $orderrow['FLD_DATE_ORDERED']; ?></td>
        <td><?php echo $orderrow['FLD_STAFF_NAME'];?></td>
        <td><?php echo $orderrow['FLD_CUSTOMER_NAME'];?></td>
        <td>
          <a href="orders_details.php?oid=<?php echo $orderrow['FLD_ORDER_ID']; ?>">Details</a>
          <a href="orders.php?edit=<?php echo $orderrow['FLD_ORDER_ID']; ?>">Edit</a>
          <a href="orders.php?delete=<?php echo $orderrow['FLD_ORDER_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>

      </table>
  


</center></body></html>