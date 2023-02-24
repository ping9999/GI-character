
    <?php include('partials-front/menu.php'); ?>

    <!-- char sEARCH Section Starts Here -->
    <section class="char-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>char-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for char.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- char sEARCH Section Ends Here -->



    <!-- char MEnu Section Starts Here -->
    <section class="char-menu">
        <div class="container">
         

            <?php 
                //Display chars that are Active
                $sql = "SELECT * FROM tbl_char ";
        

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the chars are availalable or not
                if($count>0)
                {
                    //chars Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                  
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="char-menu-box" style="width:100%">
                            <div class="char-menu-img" style="width:10%">
                                <?php 
                                    //CHeck whether image available or not
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
                    //char not Available
                    echo "<div class='error'>char not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- char Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>