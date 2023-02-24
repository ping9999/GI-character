
    <?php include('partials-front/menu.php'); ?>

    <!-- char sEARCH Section Starts Here -->
    <section class="char-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>the character you seek  <a href="#">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- char sEARCH Section Ends Here -->



    <!-- char MEnu Section Starts Here -->
    <section class="char-menu">
        <div class="container">
     

            <?php 

                //SQL Query to Get char based on search keyword
                //$search = burger '; DROP database name;
                // "SELECT * FROM tbl_char WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                $sql = "SELECT * FROM tbl_char WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether char available of not
                if($count>0)
                {
                    //char Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="char-menu-box" style="width:100%">
                            <div class="char-menu-img" style="width:10%">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/char/<?php echo $image_name; ?>" alt="Char" class="img-responsive img-curve"  >
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
                    //char Not Available
                    echo "<div class='error'>char not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- char Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>