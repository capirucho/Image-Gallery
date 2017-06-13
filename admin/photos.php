<?php 

    include("includes/header.php"); 

    if(!$session->isSignedIn()) {
        redirectUser("login.php");
    }

    $photos = Photo::find_all();
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
                        PHOTOS
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

        </div>

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>File Name</th>
                                <th>Title</th>
                                <th>size</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                // commented this out because I was using too many echo statements.
                                // instead I will use alternate foreach syntax to minimize html
                                // in echo statements. cleaner implementation. see below. 

                                // $photos = Photo::find_all();

                                // foreach ($photos as $photo) {
                                //     echo "<tr>";
                                //     echo "<td>".$photo->id."</td>";
                                //     echo "<td><img src=\"".$photo->image_path()."\" width=\"100\" height=\"100\"></td>";
                                //     echo "<td>".$photo->photo_type."</td>";
                                //     echo "<td>".$photo->photo_filename."</td>";
                                //     echo "<td>".$photo->photo_title."</td>";
                                //     echo "<td>".$photo->photo_size."</td>";
                                //     echo "</tr>";                                    
                                //     echo "results from find all: ".$photo->photo_title."<br>";
                                // }

                            ?>  

                            <?php foreach ($photos as $photo): ?>

                                <tr>
                                    <td><?php echo $photo->id; ?></td>
                                    <td>
                                        <img src="<?php echo $photo->image_path(); ?>" width="200" alt="">
                                        <div>
                                            <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                            <a href="">Edit</a>
                                            <a href="">View</a>
                                        </div>
                                    </td>
                                    <td><?php echo $photo->photo_type; ?></td>
                                    <td><?php echo $photo->photo_filename; ?></td>
                                    <td><?php echo $photo->photo_title; ?></td>
                                    <td><?php echo $photo->photo_size; ?></td>
                                </tr>

                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>

                        



                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>

        <!-- /.container-fluid -->


    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>