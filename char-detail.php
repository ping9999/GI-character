    
    <?php include('partials-front/menu.php'); ?>

<?php 
    //CHeck whether id is passed or not
    if(isset($_GET['char_id']))
    {
        //char id is set and get the id
        $char_id = $_GET['char_id'];
        // Get the char Title Based on char ID
        $sql = "SELECT title FROM tbl_char WHERE id=$char_id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //Get the value from Database
        $row = mysqli_fetch_assoc($res);
        //Get the TItle
        $char_title = $row['title'];
    }
    else
    {
        //char not passed
        //Redirect to Home page
        header('location:'.SITEURL);
    }
?>
<section class="char-menu">
    <div class="container">
        <h2 class="text-center" style="margin-top: 59px;"><?php echo $char_title; ?></h2>

        <?php 
        
            //Create SQL Query to Get chars based on Selected char
            $sql2 = "SELECT * FROM tbl_char WHERE id=$char_id";
         
            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);
            //Count the Rows
            $count2 = mysqli_num_rows($res2);
            //CHeck whether char is available or not
            if($count2>0 )
            {
                //char is Available
                while($row2=mysqli_fetch_assoc($res2))
                {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    $W_image_name = $row2['W_image_name'];

                    ?>
                    
                    <div class="char-menu-box" style="width:100%;height:768px; background:url(<?php echo SITEURL; ?>images/char/<?php echo $W_image_name; ?>) no-repeat; background-size:cover;">
                        <div class="char-menu-img" style="width:10%">
                            <?php 
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/char/<?php echo $image_name; ?>" alt="avatar" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="char-menu-desc">
                       
                            <p class="char-detail " style="position:fixed; left:10%;right:10%">
                                <?php echo $description; ?>
                            </p>
                            <br>

                        
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //char not available
                echo "<div class='error'>char not Available.</div>";
            }
        
        ?>

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- char Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>