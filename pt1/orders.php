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
        <label for="order_id">Order ID</label><input type="text" name="order_id" disabled=""><br><br><label for="order_date">Order Date</label><input type="date" name="order_date" disabled=""><br><br><label for="staff_id">Staff</label><select name="staff_id">
              <option value="">----Select----</option>
              <option value="S001">Samad Dol</option>
              <option value="S002">Sajat</option>
              <option value="S003">Bukan Chong</option>
            </select><br><br><label for="customer_id">Customer</label><select name="customer_id">
              <option value="">----Select----</option>
              <option value="C001">Amirah Wahab</option>
              <option value="C002">Amir Wahab</option>
              <option value="C003">Selain Dia</option>
            </select><br><br><table>
          <tbody>
          
        </tbody></table>
        <hr style="margin: 10px 0;">
        <div style="margin: auto; display: flex; align-items: center; justify-content: center;">
          <button type="submit" name="addorder">Add Order</button>
          <button type="reset" style="margin-left: 2em">Clear</button>  
        </div>
      </form>
    </div>
    <hr style="margin: 50px 0;">
    <div style="display: flex; align-items: center; justify-content: center;">
      <table border="1" style="width: 40%">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Staff</th>
            <th>Customer</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>O001</td>
            <td>18-01-2021</td>
            <td>S001</td>
            <td>C001</td>
            <td>
              <a href="orders_details.php">Details</a> |
              <a href="products.php">Edit</a> |
              <a href="products.php">Delete</a> 
            </td>
          </tr>
        </tbody>
      </table>
    </div>


</center></body></html>