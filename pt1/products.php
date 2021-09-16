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

        <label for="product_id">Product ID</label><input type="text" name="product_id"><br>
          <br><label for="product_brand">Brand</label><select name="product_brand">
              <option value="">----Select----</option>
              <option value="Blacpain">Blacpain</option>
              <option value="Rolex">Rolex</option>
              <option value="Omega">Omega</option>
              <option value="Patek Philippe">Patek Philippe</option>
              <option value="Montblack">Montblack</option>
              <option value="Cartier">Cartier</option>
            </select><br>
        <br><label for="product_name">Product Name</label><input type="text" name="product_name"><br>
        <br><label for="product_price">Price</label><input type="number" min="1" step="any" name="product_price"><br>
   
        <br><label for="product_dial">Dial Color</label><input type="text" name="product_dial"><br>
          <br><label for="product_strap">Strap Color</label><input type="text" name="product_strap"><br>
        <br><label for="product_gender">Gender</label><select name="product_gender">
              <option value="">----Select----</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
               <option value="Unisex">Unisex</option>
            </select><br>
        
            <br><label for="diameter">Diameter</label><input type="number" min="30" step="any" name="product_detail"><br>
             <br><label for="product_warranty">Warranty</label><input type="number" min="1" step="any" name="product_warranty"><br>
            <br><label for="qty">Quantity</label><input type="number" name="qty" min="1" max="100" step="1"><br><table>
          <tbody><tr></tr>
            
             
        </tbody></table>
        <hr style="margin: 10px 0;">
        <div style="margin: auto; display: flex; align-items: center; justify-content: center;">
          <button type="submit" name="addproduct">Add Product</button>
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
            <th>Product ID</th>
            <th>Product Brand</th>
             <th>Product Name</th>
            <th>Price(RM)</th>
           
            <th>Dial</th>
            <th>Strap</th>
            <th>Gender</th>
            
            <th>Diameter</th>
            <th>Warranty</th>
            <th>Quantity</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>R001</td>
            <td>Rolex</td>
            <td>CosmoGraph</td>
            <td>100,300.00</td>
            <td>Black</td>
           
            <td>Oysterflex</td>
            <td>Female</td>
         
            <td>40</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>
          
           <tr>
            <td>R002</td>
            <td>Rolex</td>
            <td>DeepSea</td>
            <td>63,000.00</td>
           
            <td>Black</td>
            <td>Oyster</td>
            <td>Male</td>
            
            <td>44</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

         <tr>
            <td>R003</td>
            <td>Blacpain</td>
            <td>Villeret Quantième Complete</td>
            <td>56,000.00</td>
            
            <td>Silver</td>
            <td>Aligator</td>
            <td>Male</td>
            
            <td>40</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

             <tr>
            <td>R004</td>
            <td>Blacpain</td>
            <td>Villeret Ultra Complete</td>
            <td>30,000.00</td>
          
            <td>Silver</td>
            <td>Aligator</td>
            <td>Male</td>
            
            <td>40</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

           <tr>
            <td>R005</td>
            <td>Blacpain</td>
            <td>Villeret QUANTIÈME PHASE DE LUNE</td>
            <td>80,000.00</td>
            
            <td>Rose Pink</td>
            <td>Aligator</td>
            <td>Female</td>
           
            <td>33</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

              <tr>
            <td>R006</td>
            <td>Blacpain</td>
            <td>Fifty Fathoms BATHYSCAPHE</td>
            <td>94,000.00</td>
           
            <td>Rose Pink</td>
            <td>Aligator</td>
            <td>Female</td>
            
            <td>43</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

             <tr>
            <td>R007</td>
            <td>Blacpain</td>
            <td>Fifty Fathoms Male BATHYSCAPHE</td>
            <td>36,000.00</td>
            
            <td>White</td>
            <td>Fabric</td>
            <td>Male</td>
          
            <td>38</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

               <tr>
            <td>R008</td>
            <td>Blacpain</td>
            <td>Fifty Fathoms BATHYSCAPHE DAY DATE DESERT</td>
            <td>48,000.00</td>
            
            <td>White</td>
            <td>Sail Canvas</td>
            <td>Male</td>
          
            <td>43</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

            <tr>
            <td>R009</td>
            <td>Blacpain</td>
            <td>Métiers d'Art</td>
            <td>603,000.00</td>
            
            <td>Black</td>
            <td>Leather</td>
            <td>Male</td>
            
            <td>42</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>

           <tr>
            <td>R010</td>
            <td>Blacpain</td>
            <td>Métiers d'Art SHAKUDŌ</td>
            <td>565,400.00</td>
            
            <td>Gold</td>
            <td>Leather</td>
            <td>Male</td>
            
            <td>45</td>
            <td>2</td>
            <td>40</td>
            <td>
              <a href="products_details.php">Details</a> |
          <a href="products.php">Edit</a> |
          <a href="products.php">Delete</a> 
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </center>


</body></html>