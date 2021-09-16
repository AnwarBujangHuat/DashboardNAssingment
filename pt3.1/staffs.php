<?php
  include_once 'staffs_crud.php';
?>
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Luxurious Time Piece Collection(Swiss Edition) Staff</title>
    <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel= "stylesheet" href="canva.css">
  <link href="style.css" rel="stylesheet">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>     
      .bg-3 {
        background-color: #ffffff; /* White */
        color: #555555;
      }
    </style>
  </head>
  <body>
     <?php include_once 'nav_bar.php'; ?>
    <div class="header">

     <section id= "section header"></section>

     <div class="container-fluid bg-1 text-center" id="hello"></div>
     <div class= "canvas-wrap">
    

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






<center>
  
    	 <div class="form-group">
          <label for="sid" class="col-sm-3 control-label"style="color:white">STAFF ID</label>
          <div class="col-sm-9">
        <input type="text" name="sid" class="form-control" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_ID']; else echo $num?>"required> <br>
         </div>
        </div>

          <div class="form-group">
          <label for="sname" class="col-sm-3 control-label"style="color:white">STAFF NAME</label>
          <div class="col-sm-9">
        <input type="text" name="sname" class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_NAME']; ?>"required> <br>
          </div>
        </div>


        <div class="form-group">
          <label for="snumber" class="col-sm-3 control-label"style="color:white">STAFF NUMBER</label>
          <div class="col-sm-9">
        <input type="text" name="sphone"class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STAFF_PHONE_NUMBER']; ?>"required> <br>
          </div>
        </div>




      
    	 <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9" >
          <?php if (isset($_GET['edit'])) { ?>
            <input type="hidden" name="oldsid" value="<?php echo $editrow['FLD_STAFF_ID']; ?>">
            <button class="btn btn-default"style="background-color:white" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
            <button class="btn btn-default"style="background-color:white" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default"style="background-color:white" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
  </div>
</center>

   
  <!---Table--->
  <div class="row">
   
      <div class="page-header"style="color:white;">
        <h2>Staff List</h2>
      </div>
      <table class="table" style="color:white" >
        <thead>
          <tr>
    				<td>Staff ID</td>
    				<td>Staff Name</td>
            <td>Staff Number</td>
    				<td></td>
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
          $stmt = $conn->prepare("SELECT * FROM tbl_staff_a177016_pt2");
           $stmt = $conn->prepare("select * from tbl_staff_a177016_pt2 LIMIT $start_from, $per_page");
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
           
                
                <a href="staffs.php?edit=<?php echo $readrow['FLD_STAFF_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                <a href="staffs.php?delete=<?php echo $readrow['FLD_STAFF_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
              </td>
            </tr>
            <?php    
          }

          $conn = null;
          ?>

        </table>
     
    </div>
    <div class="row">
      <Sdiv class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
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
              <li class="disabled"><span aria-hidden="true">&laquo;</span></li>
            <?php } else { ?>
              <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
              <?php
            }
            for ($i=1; $i<=$total_pages; $i++)
              if ($i == $page)
                echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
              else
                echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
              ?>
              <?php if ($page==$total_pages) { ?>
                <li class="disabled"><span aria-hidden="true">&raquo;</span></li>
              <?php } else { ?>
                <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>

      </center>
    </div>  
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>	
