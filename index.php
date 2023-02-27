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

<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
     

        <?php 
            //Create SQL Query to Display CAtegories from Database
            $sql = "SELECT * FROM tbl_area  LIMIT 4";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count rows to check whether the area is available or not
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //CAtegories Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values like id, title, image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo SITEURL; ?>area-char.php?area_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                //Check whether Image is available or not
                                if($image_name=="")
                                {
                                    //Display MEssage
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/area/<?php echo $image_name; ?>" alt="area" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categories not Available
                echo "<div class='error'>area not Added.</div>";
            }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->



<!-- char MEnu Section Starts Here -->
<section class="char-menu">
    <div class="container">
        <h2 class="text-center">Character</h2>

        <?php 
        
        //Getting chars from Database that are active and featured
        //SQL Query
        $sql2 = "SELECT * FROM tbl_char ";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Count Rows
        $count2 = mysqli_num_rows($res2);

        //CHeck whether char available or not
        if($count2>0)
        {
            //char Available
            while($row=mysqli_fetch_assoc($res2))
            {
                //Get all the values
                $id = $row['id'];
                $image_name = $row['image_name'];
                ?>
                <a href="<?php echo SITEURL; ?>char-detail.php?char_id=<?php echo $id; ?>">
                <div class="char-menu-box">
                    <div class="char-menu-img">
                        <?php 
                            //Check whether image available or not
                            if($image_name=="")
                            {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                //Image Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/char/<?php echo $image_name; ?>" alt="Chicke Hawain area" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                        
                    </div>
                </div>
                    </a>
                <?php
            }
        }
        else
        {
            //char Not Available 
            echo "<div class='error'>char not available.</div>";
        }
        
        ?>

        



        <div class="clearfix"></div>

        

    </div>
</section>
<!-- char Menu Section Ends Here -->


<?php include('partials-front/footer.php'); ?>