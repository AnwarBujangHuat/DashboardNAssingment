  <style type="text/css">
    a{
      color: #fff;
      font-weight: bold;
      font-size:1rem;
    }
</style>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <a href="products.php" class="w3-bar-item w3-button">Products</a>
  <a href="customers.php" class="w3-bar-item w3-button">Customers</a>
  <a href="staffs.php" class="w3-bar-item w3-button">Staffs</a>
  <a href="orders.php" class="w3-bar-item w3-button">Orders</a>
</div>

<div id="main">

<div class="w3-white">
  <button id="openNav" class="w3-button w3-white w3-xlarge" onclick="w3_open()">&#9776;</button>

</div>
</div>

<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "10%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>


