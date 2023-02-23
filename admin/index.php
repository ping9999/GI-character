
<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1 class="text-align">Area & Character</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>
               <div class="center">
                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_area";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Area
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_char";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Chars
                </div>

               

                <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>