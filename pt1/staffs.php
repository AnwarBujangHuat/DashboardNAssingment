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

    		<label for="staff_id">Staff ID</label><input type="text" name="staff_id"><br><br><label for="staff_name">Staff Name</label><input type="text" name="staff_name"><br><br><label for="staff_number">Staff Number</label><input type="tel" name="staff_number" pattern="+60 [0-9]{3}-[0-9]{2}-[0-9]{3}"><br><br><table>
    			<tbody><tr></tr>
    	

    		</tbody></table>
    		<hr style="margin: 10px 0;">
    		<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
    			<button type="submit" name="add_staff">Add Staff</button>
    			<button type="reset" style="margin-left: 2em">Clear</button>	
    		</div>
    	</form>
    </div>
    <hr style="margin: 50px 0;">
    <div style="display: flex; align-items: center; justify-content: center;">
    	<table border="1" style="width: 30%">
    		<thead>
    			<tr>
    				<th>Staff ID</th>
    				<th>Staff Name</th>
            <th>Staff Number</th>
    				<th></th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>S001</td>
    				<td>Mohamad Syamsul bin Abu</td>
            <td>137356414</td>
    				<td>
          <a href="staffs.php">Edit</a> |
          <a href="staffs.php">Delete</a> 
    				</td>
    			</tr>
    			
        <tr>
            <td>S002</td>
            <td>Nur Siti binti Nizam</td>
            <td>115641234</td>
            <td>
          <a href="staffs.php">Edit</a> |
          <a href="staffs.php">Delete</a> 
            </td>
          </tr>

           <tr>
            <td>S003</td>
            <td>Kasim Bin Abu Tar Jalan</td>
            <td>101234595</td>
            <td>
          <a href="staffs.php">Edit</a> |
          <a href="staffs.php">Delete</a> 
            </td>
          </tr>

    		</tbody>
    	</table>
    </div>
	</center>


</body></html>