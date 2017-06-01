<?php 
    
    include("includes/header.php"); 

    if(!$session->isSignedIn()) {
        redirectUser("login.php");
    }

    $message = "";
    
    if(isset($_POST['submit'])) {
        $photo = new Photo();
        $photo->title = $_POST['title'];
        $photo->set_file($_FILES['file_upload']);

        if($photo->upload_photo()) {
            $message = "Photo uploaded Succesfully.";
        } else {
            $message = join("<br>", $photo->custom->errors);
        }
    }

?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->



        <?php include("includes/top_nav.php") ?>


        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


        <?php include("includes/side_nav.php") ?>

        <!-- /.navbar-collapse -->
    </nav>




    <div id="page-wrapper">


        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        UPLOAD
                        <small>Subheading</small>
                    </h1>

                    <?php echo $message; ?>

                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="title">
                        <input type="file" name="file_upload">
                        <input type="submit" name="submit">
                    </form>                    


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>