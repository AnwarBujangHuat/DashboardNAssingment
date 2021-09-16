<?php
  include_once 'staffs_crud.php';
?>
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Luxurious Time Piece Collection(Swiss Edition) Staff</title>
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
    	<form action="staffs.php" method="post">

       <?php
      // Read
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
      foreach($result as $readrow) {
      ?>    
        <?php $readrow['FLD_STAFF_ID']; ?>
      <?php
      }
      $num = ltrim($readrow['FLD_STAFF_ID'], 'S')+1;
      $num = 'S'.str_pad($num,3,"0",STR_PAD_LEFT);
     
      $conn = null;
      ?>

    		<label for="sid">Staff ID</label><input type="text" name="sid" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_ID']; else echo $num?>"> <br><br>

        <label for="sname">Staff Name</label><input type="text" name="sname" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_NAME']; ?>"> <br><br>

        <label for="snumber">Staff Number</label><input type="text" name="sphone" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_PHONE_NUMBER']; ?>"> <br><br>



      
    		<hr style="margin: 10px 0;">
    		<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
        <?php if (isset($_GET['edit'])) { ?>
        <input type="hidden" name="oldsid" value="<?php echo $editrow['FLD_STAFF_ID']; ?>">
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
    				<th>Staff ID</th>
    				<th>Staff Name</th>
            <th>Staff Number</th>
    				<th></th>
    			</tr>

    	     <?php
      // Read
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
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['FLD_STAFF_ID']; ?></td>
        <td><?php echo $readrow['FLD_STAFF_NAME']; ?></td>
        <td><?php echo $readrow['FLD_STAFF_PHONE_NUMBER']; ?></td>
       
        <td>
          <a href="staffs.php?edit=<?php echo $readrow['FLD_STAFF_ID']; ?>">Edit</a>
          <a href="staffs.php?delete=<?php echo $readrow['FLD_STAFF_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
      </tbody>
    </table>
  </center>
</body>
</html>	
}