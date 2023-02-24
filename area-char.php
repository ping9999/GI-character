    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['area_id']))
        {
            //area id is set and get the id
            $area_id = $_GET['area_id'];
            // Get the area Title Based on area ID
            $sql = "SELECT title FROM tbl_area WHERE id=$area_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $area_title = $row['title'];
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
            
            <h2>chars on <a href="#" class="text-white">"<?php echo $area_title; ?>"</a></h2>

        </div>
    </section>
    <!-- char sEARCH Section Ends Here -->



    <!-- char MEnu Section Starts Here -->
    <section class="char-menu">
        <div class="container">
            <h2 class="text-center">char</h2>

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
                                        <img src="<?php echo SITEURL; ?>images/char/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
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