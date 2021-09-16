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
    <hr style="margin: 20px 0;">
    <div style="margin: 0 10%">
      <form action="orders_details.php" method="post">
        <label>Order ID</label><label class="oid">O001</label><br><br>
        <label>Order Date</label><label class="odate">21-04-2021</label><br><br>
        <label>Staff</label><label class="S001">Mohamad Syamsul bin Abu</label><br><br>
        <label>Customer</label><label class="C001">Mohamad Aiman Bin Syazili</label>

        <table>
          <tbody><tr>
          
          </tr>
        </tbody></table>
      </form>
    </div>
    <hr style="margin: 20px 0;">

    <div style="margin: 0 10%">
      <form action="orders_details.php" method="post">
      <label style="text-align: right; margin: 10px">Product</label><select name="pid">
              <option>----Select----</option>
              <option value="R001">CosmoGraph, Rolex</option>
              <option value="R002">DeepSea, Rolex</option>
              <option value="R003">Villeret Quantième Complete, Blacpain</option>
            </select><br><label style="text-align: right; margin: 10px">Quantity</label><input type="number" name="order_quantity"><br><button type="submit" name="addproduct" style="margin: 10px">Add Product</button><button type="reset" style="margin: 10px">Clear</button><table>
        <tbody><tr>
         
       </tr>
      </tbody></table>
    </form>
    </div>
    
    <hr style="margin: 20px 0;">
    <table border="1">
      <tbody><tr>
        <td>Order Detail ID</td>
        <td>Product</td>
        <td>Quantity</td>
        <td></td>
      </tr>
      <tr>
        <td>OD001</td>
        <td>CosmoGraph, Rolex</td>
        <td>1</td>
        <td>
          <a href="http://lrgs.ftsm.ukm.my/users/a174088/project/myPT1/orders_details.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>OD002</td>
        <td>DeepSea, Rolex</td>
        <td>1</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
    </tbody></table>
    <hr style="margin: 20px 0;">
    <a href="invoice.php" target="_blank">Generate Invoice</a>
  </center>

</body></html>