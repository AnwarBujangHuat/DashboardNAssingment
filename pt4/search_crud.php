<?php

include_once 'db.php';

try {

  $result = "";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Create
  if (isset($_POST['search'])) {

    //This array will be used to store temporary
    $dataArray = array();
    $count = 0;

    $input_data = explode(" ", $_POST['inputsearch']);

    ?>
    <center>
      <div class="row" style="display: inline-block; overflow: hidden;">
        <h2 class="mb-4 p-3 bg-secondary text-dark" style="color: black;float: left;">Result for : </h2>
        <h2 style="color: #808080 ;float: right;"> 
          <?php
          for ($index = 0; $index < count($input_data); $index++) {
            echo $input_data[$index] . "";
            echo " ";
          }
          ?>
        </h2>
        
      </div>
    </center>

    <?php

    try {

      if (count($input_data) >= 1) {

        ?>
        <div class="thumbnail" style="background-color:white;">
          <div>
             <table class="table table-striped table-bordered">
               <thead style="background-color: #808080 ;">
                <tr class="medium" style="text-align: center;">
                  <th scope="col" style="width: 16%;">Product ID</th>
                  <th scope="col" style="width: 10%;">Product Brand</th>
                  <th scope="col" style="width: 10%;">Product Name</th>
                  <th scope="col" style="width: 10%;">Price(RM)</th>
                  <th scope="col" style="width: 10%;">Dial Colour</th>
                  <th scope="col" style="width: 20%">Strap</th>
                  <th scope="col" style="width: 10%;">Gender</th>
                  <th scope="col" style="width: 20%">Diameter</th>
                  <th scope="col" style="width: 10%;">Warranty</th>
                                    <th scope="col" style="width: 6%;">Image</th>


               </tr>
              </thead>
              <tbody>

                <?php
                for ($index = 0; $index < count($input_data); $index-=-1) {

                  $stmt = $conn->prepare("SELECT * FROM  tbl_product_a177016_pt2 WHERE FLD_PRODUCT_NAME LIKE :first_string OR FLD_PRICE LIKE :first_string OR FLD_BRAND LIKE :first_string");

                  $stmt->bindParam(':first_string', $first_string, PDO::PARAM_STR);

                  $first_string = $input_data[$index];
                  $first_string = "%$first_string%";

                  $stmt->execute();
                  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($result as $readrow) {
                    if (empty($dataArray)) {

                      $dataArray[$count] = $readrow['FLD_PRODUCT_ID'];
                      $count++;
                      ?>
                      <tr class="medium">
                       <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
                       <td><?php echo $readrow['FLD_BRAND']; ?></td>
                       <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
                       <td><?php echo $readrow['FLD_PRICE']; ?></td>
                       <td><?php echo $readrow['FLD_DIAL_COLOUR']; ?></td>
                       <td><?php echo $readrow['FLD_STRAP_COLOUR']; ?></td>
                       <td><?php echo $readrow['FLD_GENDER']; ?></td>
                       <td><?php echo $readrow['FLD_DIAMETER']; ?></td>
                       <td><?php echo $readrow['FLD_WARRANTY']; ?></td>
                       <td><img src="Products/<?php echo $readrow['FLD_IMAGE'] ?>" class="img-responsive" width="100%" height="100%"></td>
                       <!-- <td><?php //echo $readrow['fld_product_quantity']; ?></td> -->
                     </tr>

                     <?php
                   } else {

                    if (in_array($readrow['FLD_PRODUCT_ID'], $dataArray, TRUE)) {

                    } else {

                      $dataArray[$count] = $readrow['FLD_PRODUCT_ID'];
                      $count++;
                      ?>
                      <tr class="medium">
                        <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
                        <td><?php echo $readrow['FLD_BRAND']; ?></td>
                        <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
                        <td><?php echo $readrow['FLD_PRICE']; ?></td>
                        <td><?php echo $readrow['FLD_DIAL_COLOUR']; ?></td>
                        <td><?php echo $readrow['FLD_STRAP_COLOUR']; ?></td>
                        <td><?php echo $readrow['FLD_GENDER']; ?></td>
                        <td><?php echo $readrow['FLD_DIAMETER']; ?></td>
                        <td><?php echo $readrow['FLD_WARRANTY']; ?></td>
<td><img src="products/<?php echo $readrow['FLD_IMAGE'] ?>" class="img-responsive" width="100%" height="100%"></td>
                      </tr>
                      <?php
                    }
                  }
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php

    } else {

      ?>
      <div class="thumbnail" style="background-color:white;">
        <div>
          <table class="table table-striped" style="text-center">
            <thead>
              <th scope="col" style="width: 16%;">Product ID</th>
              <th scope="col" style="width: 10%;">Product Brand</th>
              <th scope="col" style="width: 10%;">Product Name</th>
              <th scope="col" style="width: 10%;">Price(RM)</th>
              <th scope="col" style="width: 10%;">Dial Colour</th>
              <th scope="col" style="width: 20%">Strap</th>
              <th scope="col" style="width: 10%;">Gender</th>
              <th scope="col" style="width: 20%">Diameter</th>
              <th scope="col" style="width: 10%;">Warranty</th>
              <th scope="col" style="width: 6%;">Image</th>           
            </tr>


            <?php
            for ($index = 0; $index < count($input_data); $index++) {

              $stmt = $conn->prepare("SELECT * FROM  tbl_product_a177016_pt2 WHERE FLD_PRODUCT_NAME LIKE :first_string OR FLD_PRICE LIKE :first_string OR FLD_BRAND LIKE :first_string");

              $stmt->bindParam(':first_string', $first_string, PDO::PARAM_STR);

              $first_string = $input_data[$index];
              $first_string = "%$first_string%";

              $stmt->execute();
              $result = $stmt->fetchAll();

              foreach ($result as $readrow) {
                ?>
                <tr class="medium">
                 <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
                 <td><?php echo $readrow['FLD_BRAND']; ?></td>
                 <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
                 <td><?php echo $readrow['FLD_PRICE']; ?></td>
                 <td><?php echo $readrow['FLD_DIAL_COLOUR']; ?></td>
                 <td><?php echo $readrow['FLD_STRAP_COLOUR']; ?></td>
                 <td><?php echo $readrow['FLD_GENDER']; ?></td>
                 <td><?php echo $readrow['FLD_DIAMETER']; ?></td>
                 <td><?php echo $readrow['FLD_WARRANTY']; ?></td>
                 <td><img src="products/<?php echo $readrow['FLD_IMAGE'] ?>" class="img-responsive" width="100%" height="100%"></td>
               </tr>
             </thead>
             <tbody>
             <?php }
           }
           ?>
         </table>
       </div>
     </div>
     <?php

   }

   if ($result == "") {
    ?>
    <div class="px-5 mt-5">
      <p class="text-muted  fw-normal"> No result found.</p>
    </div>
    <?php
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
      // header("location:error.php");
}
}
} catch (PDOException $e) {
  // echo "Error: " . $e->getMessage();
  header("location:error.php");
}
?>