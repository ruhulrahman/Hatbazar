<?php include_once "header.php"; ?>
<?php include_once "side_menu.php"; ?>
<?php
    if(!isset($_GET['msnId']) || $_GET['msnId'] == NULL){
        echo "<script>window.location=../404.php;</script>";
    }else{
        $msnId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['msnId']);
    }






?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header text-primary">
							Messanger
                        </h2>
                        <br>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" method="post" action="">
                            <?php
                                $getuserById = $user->getUserById($msnId);
                                if($getuserById){
                                    while ($result = $getuserById->fetch_assoc()) { ?>
                             
                            <div class="form-group">
                                <label>To : <?php echo $result['email'];?></label>
                                <p class="form-control-static"><img width="75" height="75" src="<?php echo $result['picture'];?>" alt=""></p>
                            </div>
							
                            <div class="form-group">
                                <label for="subject">Subject :</label>
                                <input class="form-control" id="subject" placeholder="Enter your subject" name="subject">
                            </div>

                            <div class="form-group">
                                <label>message</label>
                                <textarea class="form-control" rows="4" placeholder="Enter messages" name="message"></textarea>
                            </div>
							
                            <button type="submit" class="btn btn-success">Send message</button>

                            <?php } }else{
                                echo "<h3 class='text-danger'>User Not Found!</h3>";
                            } ?>
                        </form>

                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $from = 'mahbuburrahmanbrta@gmail.com';
                                $to      = $result['email'];;
                                $subject = $_POST['subject'];
                                $message = $_POST['message'];
                                $headers = 'From: ' . $from . "\r\n" .
                                    'Reply-To: ' . $from . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion();

                                $sendMail = mail($to, $subject, $message, $headers);
                                if($sendMail){
                                    echo "<span class='text-success'>Your mail has been sent</span>";
                                }else{
                                    echo "<span class='text-danger'>Your mail has not been sent!!!</span>";
                                }

                            }
                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include_once "footer.php"; ?>
