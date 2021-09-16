<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Luxurious Time Piece Collection(Swiss Edition) Products</title>
  <style>
     form {
      /* Center the form on the page */
      margin: 0 auto;
      width: 500px;
      /* Form outline */
      padding: 1em;
      border: 1px solid #000;
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


        <label for="pid">Product ID</label>
        <input type="text" name="pid"  readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; else echo $num?>"><br>
         
          <br><label for="pbrand">Brand</label><select name="pbrand">
              <option value="">----Select----</option>
              <option value="Blacpain"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Blacpain") echo "selected"; ?>>Blacpain</option>
              <option value="Rolex"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Rolex") echo "selected"; ?>>Rolex</option>
              <option value="Omega"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Omega") echo "selected"; ?>>Omega</option>
              <option value="Patek Philippe"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Patek Philippe") echo "selected"; ?>>Patek Philippe</option>
              <option value="Montblack"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Montblack") echo "selected"; ?>>Montblack</option>
              <option value="Cartier"<?php if(isset($_GET['edit'])) if($editrow['FLD_BRAND']=="Cartier") echo "selected"; ?>>Cartier</option>
            </select><br>

        <br><label for="pname">Product Name</label><input type="text" name="pname" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>"><br>

        <br><label for="pprice">Price</label><input type="number" min="1" step="any" name="pprice" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRICE']; ?>"><br>

        <br><label for="pbezel">Bezel</label><input type="text" name="pbezel" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_BEZEL']; ?>"><br>

        <br><label for="pdial">Dial Color</label><input type="text" name="pdial" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DIAL_COLOUR']; ?>"><br>

        <br><label for="pstrap">Strap Color</label><input type="text" name="pstrap" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STRAP_COLOUR']; ?>"><br>

        <br><label for="pdetail">WaterProof</label><input type="text" name="pdetail" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DETAIL']; ?>"><br>

        <br><label for="pgender">Gender</label><select name="pgender">
              <option value="">----Select----</option>
              <option value="Male" <?php if(isset($_GET['edit'])) if($editrow['FLD_GENDER']=="Male") echo "selected"; ?>>Male</option>
              <option value="Female"<?php if(isset($_GET['edit'])) if($editrow['FLD_GENDER']=="Female") echo "selected"; ?>>Female</option>
               <option value="Unisex"<?php if(isset($_GET['edit'])) if($editrow['FLD_GENDER']=="Unisex") echo "selected"; ?>>Unisex</option>
            </select><br>

          

            <br><label for="pdiameter">Diameter</label><input type="number" min="30" step="any" name="pdiameter" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DIAMETER']; ?>"><br>

             <br><label for="pwarranty">Warranty</label><input type="number" min="1" step="any" name="pwarranty" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_WARRANTY']; ?>"><br>

            <br><label for="pquantity">Quantity</label><input type="number" name="pquantity" min="1" max="100" step="1" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_QUANTITY']; ?>"><br>

            <table>

          <tbody><tr></tr>
            
             
        </tbody></table>
        <hr style="margin: 10px 0;">
        <div style="margin: auto; display: flex; align-items: center; justify-content: center;">
        <?php if (isset($_GET['edit'])) { ?>
        <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
        <button type="submit" name="update">Update</button>
        <?php } else { ?>
          <button type="submit" name="create">Add Product</button>
           <?php } ?>
          <button type="reset" style="margin-left: 2em">Clear</button>  
        </div>
      </form>
    </div>
    <hr style="margin: 50px 0;">


    <!---Table--->
    <div style="display: flex; align-items: center; justify-content: center;">
      <table border="1" style="width: 70%">
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
            <td>Waterproof Up to</td>
            <td>Diameter</td>
            <td>Warranty</td>
            <td>Quantity</td>
            <td></td>
          </tr>
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
  
       <tr>
        <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
        <td><?php echo $readrow['FLD_BRAND']; ?></td>
        <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
        <td><?php echo $readrow['FLD_PRICE']; ?></td>
        <td><?php echo $readrow['FLD_BEZEL']; ?></td>
        <td><?php echo $readrow['FLD_DIAL_COLOUR']; ?></td>
        <td><?php echo $readrow['FLD_STRAP_COLOUR']; ?></td>
        <td><?php echo $readrow['FLD_GENDER']; ?></td>
        <td><?php echo $readrow['FLD_DETAIL']; ?></td>
        <td><?php echo $readrow['FLD_DIAMETER']; ?></td>
        <td><?php echo $readrow['FLD_WARRANTY']; ?></td>
        <td><?php echo $readrow['FLD_QUANTITY']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>">Details</a>
          <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php    
      }
      
      $conn = null;
      ?>
       
      </table>
    </div>
  </center>


</body></html>