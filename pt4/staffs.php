<?php
include_once 'staffs_crud.php';

if (!isset($_SESSION['loggedin']))
  header("LOCATION: login.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Luxurious Time Piece Collection(Swiss Edition) Customers</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>
  <body>
    <?php include_once 'nav_bar.php'; ?>
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user']['FLD_STAFF_ROLE'] == 'ADMIN') {
      ?>
      <div class="container-fluid">
        <div class="container">
          <div class="row">

            <?php if (isset($_SESSION['error'])) {
              echo "<div class='alert alert-warning' role='alert'>{$_SESSION['error']}</div>";
              unset($_SESSION['error']);
            }
            ?>
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


            <div class="container-fluid">

              <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                  <div class="page-header">
                   <?php
                   if (isset($_GET['edit'])) {
                    echo "<h2>EDIT {$sid}</h2>";
                  } else {
                    echo "<h2>ADD New Staff</h2>";
                  }
                  ?>
                </div>

                <form action="staffs.php" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label for="sid" class="col-sm-3 control-label">Customer ID</label>
                    <div class="col-sm-9">
                      <input type="text" name="sid" class="form-control" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_ID']; else echo $num?>"required/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="sname" class="col-sm-3 control-label">Staff Name</label>
                    <div class="col-sm-9">
                      <input name="sname" type="text" class="form-control" id="sname" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_NAME']; ?>" required />
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="sphone" class="col-sm-3 control-label">Phone Number</label>
                    <div class="col-sm-9">
                      <input name="sphone" type="tel" class="form-control" id="sphone" placeholder="+60##-#######" pattern="[+]601[0-9]{1}-([0-9]{7}|[0-9]{8})"  value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_PHONE_NUMBER']; ?>" required />
                    </div>
                  </div>
                <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                  <input name="semail" type="text" class="form-control" id="semail" placeholder="Email" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_EMAIL']; ?>"> 
                </div>
              </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                      <input name="spassword" type="text" class="form-control" id="spassword" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_PASSWORD']; ?>"> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="role" class="col-sm-3 control-label">Role</label>
                    <div class="col-sm-9">
                      <select name="srole" class="form-control" id="srole" required>
                        <option value="">Please select</option>
                        <option value="ADMIN" <?php if(isset($_GET['edit'])) if($editrow['FLD_STAFF_ROLE']=="ADMIN") echo "selected"; ?>>Admin</option>
                        <option value="STAFF" <?php if(isset($_GET['edit'])) if($editrow['FLD_STAFF_ROLE']=="STAFF") echo "selected"; ?>>Staff</option>
                      </select> 
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <?php if (isset($_GET['edit'])) { ?>
                        <input type="hidden" name="oldsid" value="<?php echo $editrow['FLD_STAFF_ID']; ?>">
                        <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
                      <?php } else { ?>
                        <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
                      <?php } ?>
                      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      <?php } ?>

      <hr />

      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="page-header">
            <h2>Staff List</h2>
          </div>
          <table class="table table-striped table-bordered">
            <tr>
              <th>Staff ID</th>
              <th>Full Name</th>
              <th>Phone Number</th>
              <th></th>
            </tr>
            <?php
          // Read
            $per_page = 5;
            if (isset($_GET["page"]))
              $page = $_GET["page"];
            else
              $page = 1;
            $start_from = ($page-1) * $per_page;
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("select * from tbl_staff_a177016_pt2 LIMIT {$start_from}, {$per_page}");
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

                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']['FLD_STAFF_ROLE'] == 'ADMIN') {
                  ?>
                  <td>
                    <a href="staffs.php?edit=<?php echo $readrow['FLD_STAFF_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                    <a href="staffs.php?delete=<?php echo $readrow['FLD_STAFF_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
                  </td>
                <?php } ?>
              </tr>
              <?php
            }
            $conn = null;
            ?>

          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <nav>
            <ul class="pagination">
              <?php
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM tbl_staff_a177016_pt2");
                $stmt->execute();
                $result = $stmt->fetchAll();
                $total_records = count($result);
              }
              catch(PDOException $e){
                echo "Error: " . $e->getMessage();
              }
              $total_pages = ceil($total_records / $per_page);
              ?>
              <?php if ($page==1) { ?>
                <li class="disabled"><span aria-hidden="true">«</span></li>
              <?php } else { ?>
                <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                <?php
              }
              for ($i=1; $i<=$total_pages; $i++)
                if ($i == $page)
                  echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
                else
                  echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
                ?>
                <?php if ($page==$total_pages) { ?>
                  <li class="disabled"><span aria-hidden="true">»</span></li>
                <?php } else { ?>
                  <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
                <?php } ?>
              </ul>
            </nav>
          </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
      </body>
      </html>