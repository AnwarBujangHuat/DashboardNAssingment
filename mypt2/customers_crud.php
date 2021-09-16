<?php
 
include_once 'db.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_customer_a177016_pt2(FLD_CUSTOMER_ID,FLD_CUSTOMER_NAME,
      FLD_CUSTOMER_PHONE_NUMBER ) VALUES(:cid, :cname, :cphone)");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':cname', $cname, PDO::PARAM_STR);
    $stmt->bindParam(':cphone', $cphone, PDO::PARAM_INT);
   
       
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $cphone = $_POST['cphone'];
   
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
 
    $stmt = $conn->prepare("UPDATE tbl_customer_a177016_pt2 SET
     FLD_CUSTOMER_ID = :cid,
     FLD_CUSTOMER_NAME = :cname,
     FLD_CUSTOMER_PHONE_NUMBER = :cphone WHERE FLD_CUSTOMER_ID = :oldcid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':cname', $cname, PDO::PARAM_STR);
    $stmt->bindParam(':cphone', $cphone, PDO::PARAM_INT);
    $stmt->bindParam(':oldcid', $oldcid, PDO::PARAM_STR);
  
       
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $cphone = $_POST['cphone'];
    $oldcid = $_POST['oldcid'];
   
       
    $stmt->execute();
 
    header("Location: customers.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_customer_a177016_pt2 WHERE FLD_CUSTOMER_ID = :cid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: customers.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_customer_a177016_pt2 WHERE FLD_CUSTOMER_ID = :cid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['edit'];
     
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