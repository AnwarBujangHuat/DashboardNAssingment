<?php
 
include_once 'db.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_product_a177016_pt2(FLD_PRODUCT_ID,
        FLD_BRAND, FLD_PRODUCT_NAME, FLD_PRICE, FLD_BEZEL,FLD_DIAL_COLOUR, FLD_STRAP_COLOUR,FLD_GENDER,FLD_DIAMETER,FLD_WARRANTY,FLD_QUANTITY ) VALUES(:pid, :pbrand, :pname, :pprice,:pbezel, :pdial, :pstrap,:pgender,:pdiameter, :pwarranty, :pquantity)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':pbrand', $pbrand, PDO::PARAM_STR);
      $stmt->bindParam(':pname', $pname, PDO::PARAM_STR);
      $stmt->bindParam(':pprice', $pprice, PDO::PARAM_INT);
      $stmt->bindParam(':pbezel', $pbezel, PDO::PARAM_STR);
      $stmt->bindParam(':pdial', $pdial, PDO::PARAM_STR);
      $stmt->bindParam(':pstrap', $pstrap, PDO::PARAM_STR);
      $stmt->bindParam(':pgender', $pgender, PDO::PARAM_STR);
      $stmt->bindParam(':pdiameter', $pdiameter, PDO::PARAM_INT);
      $stmt->bindParam(':pwarranty', $pwarranty, PDO::PARAM_INT);
      $stmt->bindParam(':pquantity', $pquantity, PDO::PARAM_INT);
  
       
    $pid = $_POST['pid'];
    $pbrand = $_POST['pbrand'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pbezel =  $_POST['pbezel'];
    $pdial = $_POST['pdial'];
    $pstrap = $_POST['pstrap'];
    $pgender = $_POST['pgender'];
    $pdiameter = $_POST['pdiameter'];
    $pwarranty = $_POST['pwarranty'];
    $pquantity = $_POST['pquantity'];
     
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
 
      $stmt = $conn->prepare("UPDATE tbl_product_a177016_pt2 SET FLD_PRODUCT_ID = :pid,
        FLD_BRAND = :pbrand, FLD_PRODUCT_NAME = :pname, FLD_PRICE = :pprice,
        FLD_BEZEL = :pbezel, FLD_DIAL_COLOUR = :pdial, FLD_STRAP_COLOUR = :pstrap,
        FLD_GENDER = :pgender, FLD_DIAMETER = :pdiameter,
        FLD_WARRANTY = :pwarranty, FLD_QUANTITY = :pquantity
        WHERE FLD_PRODUCT_ID = :oldpid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':pbrand', $pbrand, PDO::PARAM_STR);
      $stmt->bindParam(':pname', $pname, PDO::PARAM_STR);
      $stmt->bindParam(':pprice', $pprice, PDO::PARAM_INT);
      $stmt->bindParam(':pbezel', $pbezel, PDO::PARAM_STR);
      $stmt->bindParam(':pdial', $pdial, PDO::PARAM_STR);
      $stmt->bindParam(':pstrap', $pstrap, PDO::PARAM_STR);
     
      $stmt->bindParam(':pgender', $pgender, PDO::PARAM_STR);
      $stmt->bindParam(':pdiameter', $pdiameter, PDO::PARAM_INT);
      $stmt->bindParam(':pwarranty', $pwarranty, PDO::PARAM_INT);
      $stmt->bindParam(':pquantity', $pquantity, PDO::PARAM_INT);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $pbrand = $_POST['pbrand'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pbezel =  $_POST['pbezel'];
    $pdial = $_POST['pdial'];
    $pstrap = $_POST['pstrap'];
  
    $pgender = $_POST['pgender'];
    $pdiameter = $_POST['pdiameter'];
    $pwarranty = $_POST['pwarranty'];
    $pquantity = $_POST['pquantity'];
    $oldpid = $_POST['oldpid'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_product_a177016_pt2 WHERE FLD_PRODUCT_ID = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_product_a177016_pt2 WHERE FLD_PRODUCT_ID = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
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