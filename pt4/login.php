<?php
require_once 'db.php';

if (isset($_SESSION['loggedin']))
    header("LOCATION: index.php");

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['userid'], $_POST['password'])) {
    $UserID = htmlspecialchars($_POST['userid']);
    $Pass = $_POST['password'];

    if (empty($UserID) || empty($Pass)) {
        $_SESSION['error'] = 'Please fill in the blanks.';
    } else {
        $stmt = $db->prepare("SELECT * FROM tbl_staff_a177016_pt2 WHERE (FLD_STAFF_ID = :id OR FLD_STAFF_EMAIL = :id) LIMIT 1");
        $stmt->bindParam(':id', $UserID);

        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['FLD_STAFF_PASSWORD'] == $Pass) {
         unset($user['FLD_STAFF_PASSWORD']);
         $_SESSION['loggedin'] = true;
         $_SESSION['user'] = $user;

         header("LOCATION: index.php");
         exit();
        } else {
         $_SESSION['error'] = 'Invalid login credentials. Please try again.';
         } 

    header("LOCATION: " . $_SERVER['REQUEST_URI']);
    exit();
}}
?>
<!DOCTYPE html>
<html>
<head>
 
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Luxurious Time Piece Collection(Swiss Edition) Customers</title>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="canvas.css">

</head>
 
<body>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



<!-- Login form creation starts-->

  
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" class="form-container">

       
       <div class="login-box">
  <h2>Login</h2>
  <form>
    <div class="user-box">
    
         <input type="text" class="form-control" id="inputUserID" name="userid"
        placeholder="Email address / User ID">
    </div>
    <div class="user-box">
     
           <div class="input-group">
           <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
         <input type="password" class="form-control" id="inputUserPass" name="password" placeholder="Password">
        </div>
    </div>
      <?php
                if (isset($_SESSION['error'])) {
                    echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
                    unset($_SESSION['error']);
                }
                ?>
     <button type="submit" class="btn btn-primary btn-block" style="border-radius: 20px;">Login</button>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
   
  </form>
</div>
        </form>
 
<!-- Login form creation ends -->
</body>
</html>

