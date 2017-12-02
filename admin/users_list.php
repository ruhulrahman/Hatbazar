<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>

<?php    //for deleting category here
    if(isset($_GET['catDeleteId'])){
        $DeleteId = $_GET['catDeleteId'];
        $DeleteCat = $cat->delCatById($DeleteId);
    }
?>

<?php

    if(isset($_GET['warningId'])){
        $warningId = $_GET['warningId'];
        $getuserById = $user->getUserById($warningId);
        if($getuserById){
            while ($userById = $getuserById->fetch_assoc()) {
                $email = $userById['email'];
            } 
        }
        // multiple recipients
        $to  = $email . ', '; // note the comma
        //$to .= 'wez@example.com';

        // subject
        $subject = 'Birthday Reminders for August';

        // message
        $message = '
        <html>
        <head>
          <title>Birthday Reminders for August</title>
        </head>
        <body>
          <p>Here are the birthdays upcoming in August!</p>
          <table>
            <tr>
              <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
            </tr>
            <tr>
              <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
            </tr>
            <tr>
              <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
            </tr>
          </table>
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
        $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

        // Mail it
        $sendMail = mail($to, $subject, $message, $headers);
        if($sendMail){
            return $msg = "<span class='text-success'>Your mail has been sent</span>";
        }else{
            return $msg = "<span class='text-danger'>Your mail has not been sent!!!</span>";
        }

    }


?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
							User Managing Section
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Users List</h3>
                            </div>
                            <div class="block text-center">
                                <?php
                                    if(isset($sendMail)){
                                        echo $sendMail;
                                    }
                                ?>
                            </div>
                            
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <tr>
                                        <th class="text-center">
                                            <form class="form-inline my-2 my-lg-0" action="" method="post">
                                              <input class="form-control mr-sm-2" type="text" placeholder="Enter User Auth. ID" aria-label="Search" name="oauth_uid">
                                              <button class="btn btn-primary my-2 my-sm-0" type="submit" name="submit" id="search_btn">Search</button>
                                            </form> 
                                        </th>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Picture</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Provider</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        if(isset($_POST['oauth_uid'])){
                                            $oauth_uid = $_POST['oauth_uid'];
                                            $getuserBySearch = $user->getSearchUser($oauth_uid);

                                            if($getuserBySearch){
                                                $i = 1;
                                                while($result = $getuserBySearch->fetch_assoc()){ ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>          
                                                <td class="text-center"><img width="75" height="75" src="<?php echo $result['picture'];?>" alt=""></td>
                                                <td class="text-center"><?php echo $result['first_name']." ".$result['last_name'];?></td>                                                
                                                <td class="text-center"><?php echo $result['email'];?></td>
                                                <td class="text-center"><?php echo $result['gender'];?></td>
                                                <td class="text-center"><?php echo $result['oauth_provider'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning" href="?warningId=<?php echo $result['id'];?>">Warning</a> ||  <a class="btn btn-danger" href="">Block</a> || 
                                                    <a class="btn btn-success" href="messanger.php?msnId=<?php echo $result['id'];?>">Send Messege</a>
                                                </td>
                                            </tr>       

                                    <?php       }
                                            }
                                        }else{
                                            $allusers = $user->getAllusers();
                                            $i = 0;
                                            while ($result = $allusers->fetch_assoc()) { 
                                                $i++;
                                                ?>
                                                
                                            <tr>
                                                <td class="text-center"><?php echo $i;?>.</td>          
                                                <td class="text-center"><img width="75" height="75" src="<?php echo $result['picture'];?>" alt=""></td>
                                                <td class="text-center"><?php echo $result['first_name']." ".$result['last_name'];?></td>                                                
                                                <td class="text-center"><?php echo $result['email'];?></td>
                                                <td class="text-center"><?php echo $result['gender'];?></td>
                                                <td class="text-center"><?php echo $result['oauth_provider'];?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning" href="?warningId=<?php echo $result['id'];?>">Warning</a> ||  <a class="btn btn-danger" href="">Block</a> || 
                                                    <a class="btn btn-success" href="messanger.php?msnId=<?php echo $result['id'];?>">Send Messege</a>
                                                </td>
                                            </tr>

                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include_once "footer.php"; ?>