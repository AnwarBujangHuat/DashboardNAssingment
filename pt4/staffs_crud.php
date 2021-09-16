<?php
 
include_once 'db.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_staff_a177016_pt2(FLD_STAFF_ID, FLD_STAFF_NAME, FLD_STAFF_PHONE_NUMBER, FLD_STAFF_EMAIL, FLD_STAFF_PASSWORD, FLD_STAFF_ROLE) VALUES(:sid, :sname, :sphone, :semail, :spassword, :srole)");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':sname', $sname, PDO::PARAM_STR);
    $stmt->bindParam(':sphone', $sphone, PDO::PARAM_STR);
    $stmt->bindParam(':semail', $semail, PDO::PARAM_STR);
    $stmt->bindParam(':spassword', $spass, PDO::PARAM_STR);
    $stmt->bindParam(':srole', $srole, PDO::PARAM_STR);
   
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $sphone = $_POST['sphone'];
    $semail = $_POST['semail'];
    $spass = $_POST['spassword'];
    $srole = $_POST['srole'];

         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_staff_a177016_pt2 SET
      FLD_STAFF_ID = :sid, FLD_STAFF_NAME = :sname,
      FLD_STAFF_PHONE_NUMBER = :sphone, FLD_STAFF_EMAIL=:semail, FLD_STAFF_PASSWORD=:spassword, FLD_STAFF_ROLE=:srole
      WHERE FLD_STAFF_ID = :oldsid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':sname', $sname, PDO::PARAM_STR);
    $stmt->bindParam(':sphone', $sphone, PDO::PARAM_STR);
    $stmt->bindParam(':semail', $semail, PDO::PARAM_STR);
    $stmt->bindParam(':spassword', $spass, PDO::PARAM_STR);
    $stmt->bindParam(':srole', $srole, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
   
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $sphone = $_POST['sphone'];
    $semail = $_POST['semail'];
    $spass = $_POST['spassword'];
    $srole = $_POST['srole'];
     $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_staff_a177016_pt2 where FLD_STAFF_ID = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staff_a177016_pt2 where FLD_STAFF_ID = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
 
?>