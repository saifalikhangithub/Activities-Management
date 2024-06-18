<?php
    function search_user()
    {
        global $DB_connect;
        
        if (isset($_GET['search_user_btn']))
        {
            $search_query = htmlentities($_GET['search_user']);
            $get_user = "select * from users where first_name like '%$search_query%' OR last_name like '%$search_query%' OR username like '%$search_query%'";
        }
        else
        {
            $get_user = "select * from users";
        }
        $run_user = mysqli_query($DB_connect, $get_user);
        if($row=mysqli_num_rows($run_user)>0)
            {
                echo'<table class="table table-hover table-sm table-bordered" style="text-align:center;">';
                    echo'<thead class="table-dark">';
                        echo'<tr>';
                            echo'<th scope="col">Id</th>';
                            echo'<th scope="col">Profile_Pic</th>';
                            echo'<th scope="col">First_Name</th>';
                            echo'<th scope="col">Last_Name</th>';
                            echo'<th scope="col">Username</th>';
                            echo'<th scope="col">Email</th>';
                            echo'<th scope="col">Contact</th>';
                            echo'<th scope="col">Date_Of_Birth</th>';
                            echo'<th scope="col">Country</th>';
                            echo'<th scope="col">Gender</th>';
                            echo'<th scope="col">Likes</th>';
                            echo'<th scope="col">Post</th>';
                            echo'<th scope="col">Terms_and_C</th>';
                            echo'<th scope="col">Registration_Date</th>';
                            echo'<th scope="col">Status</th>';
                            echo'<th scope="col">Last_Login</th>';
                            echo'<th scope="col">Delete</th>';
                            echo'</tr>';
                        echo'</thead>';
                    echo'<tbody>';

                    while($row = mysqli_fetch_assoc($run_user))
                    {
                        $id = $row['user_id'];
                        $profile_pic = $row['profile_pic'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $mobile_number = $row['mobile_number'];
                        $dob = $row['dob'];
                        $country = $row['country'];
                        $gender = $row['gender'];
                        $likes = $row['likes'];
                        $post = $row['post'];
                        $t_and_c = $row['t_and_c'];
                        $registered_date = $row['registered_date'];
                        $status = $row['status'];
                        $last_login = $row['last_login'];                        
                        $delete = '<a href="delete.php?delete_id='.$id.'"><button type="submit" class="btn btn-danger btn-sm">Delete</button></a>';

                        echo'<tr>';
                            echo'<td class="align-middle">'.$id.'</td>';
                            echo'<td class="align-middle">'."<img src='../The System/Images/Profile_Pics/$profile_pic' class='rounded-pill' height='70px' width='70px'".'</td>';
                            echo'<td class="align-middle">'.$first_name.'</td>';
                            echo'<td class="align-middle">'.$last_name.'</td>';
                            echo'<td class="align-middle">'.$username.'</td>';
                            echo'<td class="align-middle">'.$email.'</td>';
                            echo'<td class="align-middle">'.$mobile_number.'</td>';
                            echo'<td class="align-middle">'.$dob.'</td>';
                            echo'<td class="align-middle">'.$country.'</td>';
                            echo'<td class="align-middle">'.$gender.'</td>';
                            echo'<td class="align-middle">'.$likes.'</td>';
                            echo'<td class="align-middle">'.$post.'</td>';
                            echo'<td class="align-middle">'.$t_and_c.'</td>';
                            echo'<td class="align-middle">'.$registered_date.'</td>';
                            echo'<td class="align-middle status">'.$status.'</td>';
                            echo'<td class="align-middle">'.$last_login.'</td>';
                            echo'<td class="align-middle">'.$delete.'</td>';
                        echo'</tr>';
                    }
            }
    }
?>