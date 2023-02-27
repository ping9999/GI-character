    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['area_id']))
        {
            //area id is set and get the id
            $area_id = $_GET['area_id'];
            // Get the area * Based on area ID
            $sql = "SELECT * FROM tbl_area WHERE id=$area_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $area_title = $row['title'];
            $area_char = $row['image_name'];

        }
        else
        {
            //area not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- char sEARCH Section Starts Here -->
    <section class="char-search text-center">
        <div class="container">
            
            <h2>Character in <a href="#" class="text-white">"<?php echo $area_title; ?>"</a></h2>

        </div>
    </section>
    <!-- char sEARCH Section Ends Here -->



    <!-- char MEnu Section Starts Here -->
    <section class="char-menu">
        <div class="container" style="background:url(<?php echo SITEURL; ?>images/area/<?php echo $area_char; ?>) no-repeat; background-size:cover;">
            <h2 class="text-center">Character</h2>

            <?php 
            
                //Create SQL Query to Get chars based on Selected area
                $sql2 = "SELECT * FROM tbl_char WHERE area_id=$area_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether char is available or not
                if($count2>0)
                {
                    //char is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="char-menu-box" style="width:100%">
                            <div class="char-menu-img" style="width:10%">
                            <a href="<?php echo SITEURL; ?>char-detail.php?char_id=<?php echo $id; ?>">
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
                                        <img src="<?php echo SITEURL; ?>images/char/<?php echo $image_name; ?>" alt="char" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                            </a>
                            </div>

                            <div class="char-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="char-detail">
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