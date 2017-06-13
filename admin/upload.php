<?php 
    
    include("includes/header.php"); 

    if(!$session->isSignedIn()) {
        redirectUser("login.php");
    }

    $message = "";
    
    if(isset($_POST['submit'])) {
        $photo = new Photo();
        $photo->photo_title = $_POST['photo_title'];
        $photo->set_file($_FILES['file_upload']);

        if($photo->upload_photo()) {
            $message = "Photo uploaded Succesfully.";
        } else {
            $message = join("<br>", $photo->custom_errors);
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
                    <div class="col-md-6">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for"imageTitle">Image Title</label>
                                <input id="imageTitle" type="text" name="photo_title" placeholder="Image title">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file_upload">
                            </div>                        
                            
                            <input type="submit" name="submit" class="btn btn-primary">
                        </form>
                    </div>                    


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>