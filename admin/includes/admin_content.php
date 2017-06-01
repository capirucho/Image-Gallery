<?php require_once("init.php"); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ADMIN
                <small>Subheading</small>
            </h1>
            <?php
                /* not needed for testing purposes only
                $sql = "SELECT * FROM users";
                $result = $database->query($sql);
                $user_found = mysqli_fetch_array($result);
                echo "Found this:  " . $user_found['username'];
                */


                //$user = new User();
//                $result_set = User::find_all_users();
//
//                while ($row = mysqli_fetch_array($result_set)) {
//                    echo $row["username"] . "<br>";
//                }

                ////////////////////// get user by ID ////////
                //$found_user = User::find_user_by_id(4);

             // $user = new User();
             // $user->id = $found_user['id'];
             // $user->userName = $found_user['username'];
             // $user->password = $found_user['password'];
             // $user->firstName = $found_user['first_name'];
             // $user->lastName = $found_user['last_name'];

                //testing find_all_users() method
                // $users = User::find_all();

                // foreach ($users as $user) {
                //     echo "results from find all: ".$user->first_name."<br>";
                // }

                // $user = User::instantiation($found_user);

                // echo "User found: <br> id = " . $user->id . ", Name = " . $user->userName;

                //$found_user = User::find_user_by_id(3);
                //echo $found_user->username;

                //testing includes file missing script
                //$pictures = new Picture();


                //testing new user insert into db
                // $testingUser = new User();

                // $testingUser->username = "Pineapple";
                // $testingUser->password = "Patrick";
                // $testingUser->first_name = "SpongeBob";
                // $testingUser->last_name = "Squarepants";

                // $testingUser->save();

                // //testing update method
                // $user = User::find_user_by_id(27);
                // if(!empty($user)) {
                //     $user->password = "shit"; 
                //     $user->update();                   
                // } else {
                //     echo "testing update method: that userid was not found <br><br>";
                // }





                //testing delete user method

                // $user = User::find_user_by_id(29);
                // $user->deleteUser(); 

                // $user = User::find_user_by_id(29);
                // if(!empty($user)) {
                //     $user->deleteUser(); 
                //     echo "success deleting";
                // } else {
                //     echo "testing delete method: That user was not found.";
                // }

                //testing save function
                // $user = User::find_user_by_id(27);
                // if(!empty($user)) {
                //     $user->password = "cat";
                //     $user->save();
                // } else {
                //     echo "<br><br>testing save function: User not found";
                // }
                
                // testing save() method
                // $user2 = new User();
                // $user2->username = "ninja jess";
                // $user2->password = "green eyes";
                // $user2->first_name = "Jess";
                // $user2->last_name = "Stud";
                // $user2->save();

                // $user = new User();

                // $user->username = "MandM";
                // $user->password = "Disney";
                // $user->first_name = "Mini";
                // $user->last_name = "Mouse";

                // $user->create();


                $photos = Photo::find_all();

                foreach ($photos as $photo) {
                    echo "results from find all: ".$photo->photo_title."<br>";
                }


                // testing save() method
                $photo = new Photo();
                $photo->photo_title = "boom";
                $photo->photo_description = "verts";
                $photo->photo_filename = "smile.jpg";
                $photo->photo_type = "jpg";
                $photo->photo_size = 5;
                $photo->create();                
                

                echo "<br><br>".INCLUDES_PATH;
                                                                  


            ?>
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
<!-- /.container-fluid -->