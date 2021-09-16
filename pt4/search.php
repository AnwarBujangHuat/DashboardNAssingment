<?php
include_once 'db.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luxurious Time Piece Collection(Swiss Edition) Search</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/sopico.ico"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <style type="text/css">
      .file {
        visibility: hidden;
        position: absolute;
    }
    
    </style>
</head>
<body>
    <?php include_once 'nav_bar.php'; ?>

    <section class="container-fluid" style="background-color: #ffffff; padding: 3rem;text-align: center;">
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
                    <h1>Luxurious Time Piece Collection(Swiss Edition)</h1>
                    <hr>
                    <p>Search product by Name, Price, Brand or all three.</p>
                </div>
                <div class="col-md-12">
                    <form action="search.php" method="POST" class="needs-validation">
              
                        <div class="row">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control text-center" placeholder="Search for..." name="inputsearch" id="inputSearch" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default bts" type="submit" name="search" style="">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- <span id="Block" class="help-block"></span> -->
                    </form>
                </div>
            </div>

        </div>
    </section>

    <div style="background-color: #ffffff;">
        <div class="container content" >

            <?php
            include_once 'search_crud.php';
            ?>
        </div>
    </div>


   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.browse', function() {
            var file = $(this).parent().find('.file');
            file.trigger('click');

        });
        $('inputSearch[type="file"]').change(function(event) {
            var filename = event.target.files[0].name;
            $("#file").val(filename);

            var reader = new FileReader();
            reader.onload = function (argument) {
                // body...
                document.getElementById("preview").src = argument.target.result;

            };
            //read image file as data URL
            reader.readAsDataURL(this.files[0]);
        });
    </script>

   

</body>
<script async="" src="js/validate-forms.js"></script>
</html>
   