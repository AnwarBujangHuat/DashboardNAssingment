<?php
 
 
include_once 'db.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
function uploadPhoto($file,$id){
  $target_dir="products/";
  $target_file=$target_dir . basename($file["name"]);
  $imageFileType=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $newfilename = "{$id}.{$imageFileType}";
  $target_file = $target_dir . $newfilename;
  /*
   * 0 = image file is a fake image
   * 1 = file is too large.
   * 2 = PNG & GIF files are allowed
   * 3 = Server error
   * 4 = No file were uploaded
   */

  if ($file['error']==4) {
    return 4;
  }

  // Check if image file is a actual image or fake image
  if (!getimagesize($file['tmp_name'])) {
    return 0;
  }

  //check file size
  if ($file["size"]>10000000) {
    return 1;
  }

  //Allow certain format file
  if ($imageFileType != "png" && $imageFileType !="gif") {
    return 2;
  }

  if (!move_uploaded_file($file["tmp_name"], $target_file)) {
    return 3;
  }



  // return array('status' => 200, 'name' => basename($file["name"]));
  return array('status' => 200, 'name' => $newfilename,'ext' => $imageFileType);

}
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
   $flag = uploadPhoto($_FILES['fileToUpload'],$_POST['pid']);
 if (isset($flag["status"])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_product_a177016_pt2(FLD_PRODUCT_ID,
        FLD_BRAND, FLD_PRODUCT_NAME, FLD_PRICE, FLD_DIAL_COLOUR, FLD_STRAP_COLOUR,FLD_GENDER,FLD_DIAMETER,FLD_WARRANTY,FLD_QUANTITY, FLD_IMAGE ) VALUES(:pid, :pbrand, :pname, :pprice, :pdial, :pstrap,:pgender,:pdiameter, :pwarranty, :pquantity, :image)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':pbrand', $pbrand, PDO::PARAM_STR);
      $stmt->bindParam(':pname', $pname, PDO::PARAM_STR);
      $stmt->bindParam(':pprice', $pprice, PDO::PARAM_INT);
      $stmt->bindParam(':pdial', $pdial, PDO::PARAM_STR);
      $stmt->bindParam(':pstrap', $pstrap, PDO::PARAM_STR);
      $stmt->bindParam(':pgender', $pgender, PDO::PARAM_STR);
      $stmt->bindParam(':pdiameter', $pdiameter, PDO::PARAM_INT);
      $stmt->bindParam(':pwarranty', $pwarranty, PDO::PARAM_INT);
      $stmt->bindParam(':pquantity', $pquantity, PDO::PARAM_INT);
      $stmt->bindParam(':image', $flag['name'], PDO::PARAM_STR);
  
       
    $pid = $_POST['pid'];
    $pbrand = $_POST['pbrand'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pdial = $_POST['pdial'];
    $pstrap = $_POST['pstrap'];
    $pgender = $_POST['pgender'];
    $pdiameter = $_POST['pdiameter'];
    $pwarranty = $_POST['pwarranty'];
    $pquantity = $_POST['pquantity'];
     
 $stmt->execute();

    $_SESSION['success'] = "Your product have successfully registered.";
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
 }else{
 if ($flag==0) {
    $_SESSION['error'] = "Please make sure the file uploaded is an image.";
    // echo '<script>alert("Error : Please make sure the file uploaded is an image."); </script>';
  }elseif ($flag==1) {
    $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
  }elseif ($flag==2) {
    $_SESSION['error'] = "Sorry, only PNG & GIF files are allowed.";
  }elseif ($flag==3) {
    $_SESSION['error'] = "Sorry, there was an error uploading your file.";
  }elseif ($flag==4) {
    $_SESSION['error'] = "Please upload an image.";
  }else{
    $_SESSION['error'] = "An unknown error has been occurred.";
  }
}

//header("LOCATION: {$_SERVER['REQUEST_URI']}");
  // header('LOCATION: products.php');
//exit();
}



//Update
if (isset($_POST['update'])) {
try{
  $flag = uploadPhoto($_FILES['fileToUpload'],$_POST['pid']);
    if (isset($flag['status']) || $flag==4) {


     $sql = "UPDATE tbl_product_a177016_pt2 SET 
        FLD_BRAND = :pbrand, FLD_PRODUCT_NAME = :pname, FLD_PRICE = :pprice,
        FLD_DIAL_COLOUR = :pdial, FLD_STRAP_COLOUR = :pstrap,
        FLD_GENDER = :pgender, FLD_DIAMETER = :pdiameter,
        FLD_WARRANTY = :pwarranty, FLD_QUANTITY = :pquantity";

      if (isset($flag['status'])) {
        $sql .= ", FLD_IMAGE = :image";
      }

     
      $sql .= " WHERE FLD_PRODUCT_ID = :oldpid LIMIT 1";

      $stmt = $conn->prepare($sql);
      //$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':pbrand', $pbrand, PDO::PARAM_STR);
      $stmt->bindParam(':pname', $pname, PDO::PARAM_STR);
      $stmt->bindParam(':pprice', $pprice, PDO::PARAM_INT);
      $stmt->bindParam(':pdial', $pdial, PDO::PARAM_STR);
      $stmt->bindParam(':pstrap', $pstrap, PDO::PARAM_STR);
      $stmt->bindParam(':pgender', $pgender, PDO::PARAM_STR);
      $stmt->bindParam(':pdiameter', $pdiameter, PDO::PARAM_INT);
      $stmt->bindParam(':pwarranty', $pwarranty, PDO::PARAM_INT);
      $stmt->bindParam(':pquantity', $pquantity, PDO::PARAM_INT);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
   // $pid = $_POST['pid'];
    $pbrand = $_POST['pbrand'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pdial = $_POST['pdial'];
    $pstrap = $_POST['pstrap'];
    $pgender = $_POST['pgender'];
    $pdiameter = $_POST['pdiameter'];
    $pwarranty = $_POST['pwarranty'];
    $pquantity = $_POST['pquantity'];
    $oldpid = $_POST['oldpid'];

if (isset($flag['status'])) {
     $stmt->bindParam(':image', $flag['name']);
        if(pathinfo(basename($_POST['filename']), PATHINFO_EXTENSION)!=$flag['ext']){
          unlink("products/{$_POST['filename']}");

}}  $stmt->execute();

 
      $_SESSION['success'] = "Your product have successfully edited.";
  
    }else{
      // unset($_SESSION['success']);
      if ($flag == 0)
          $_SESSION['error'] = "Please make sure the file uploaded is an image.";
      elseif ($flag == 1)
          $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
      elseif ($flag == 2)
          $_SESSION['error'] = "Sorry, only PNG & GIF files are allowed.";
      elseif ($flag == 3)
          $_SESSION['error'] = "Sorry, there was an error uploading your file.";
      else
          $_SESSION['error'] = "An unknown error has been occurred.";
    }
 
     
    }
 
  catch(PDOException $e)
  {
       $_SESSION['error']=   $e->getMessage();
  }

  //if (isset($_SESSION['error']))
     //   header("LOCATION: {$_SERVER['REQUEST_URI']}");
   // else
     //   header("Location: products.php");

  //exit();
  // $_SESSION['success'] = "Your product have successfully edited.";
  // header("Location: products.php");
  //exit();
}
 
 
//Delete
if (isset($_GET['delete'])) {
 
try {

   $pid = $_GET['delete'];
   $stmt = $conn->prepare("SELECT FLD_IMAGE FROM tbl_product_a177016_pt2 WHERE FLD_PRODUCT_ID = :pid LIMIT 1");

   $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);

   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);

   $path = 'products/' . $result['FLD_IMAGE'];
   if (file_exists($path))
    unlink($path);

  $stmt = $conn->prepare("DELETE FROM tbl_product_a177016_pt2 WHERE FLD_PRODUCT_ID = :pid");
  $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
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