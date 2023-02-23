<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage char</h1>

        <br /><br />

                <!-- Button to Add Admin -->
                <a href="<?php echo SITEURL; ?>admin/add-char.php" class="btn-primary">Add char</a>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                    </tr>

                    <?php 
                        //Create a SQL Query to Get all the char
                        $sql = "SELECT * FROM tbl_char";

                        //Execute the qUery
                        $res = mysqli_query($conn, $sql);

                        //Count Rows to check whether we have chars or not
                        $count = mysqli_num_rows($res);

                        //Create Serial Number VAriable and Set Default VAlue as 1
                        $sn=1;

                        if($count>0)
                        {
                            //We have char in Database
                            //Get the chars from Database and Display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <?php  
                                            //CHeck whether we have image or not
                                            if($image_name=="")
                                            {
                                                //WE do not have image, DIslpay Error Message
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                            else
                                            {
                                                //WE Have Image, Display Image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/char/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-char.php?id=<?php echo $id; ?>" class="btn-secondary">Update char</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-char.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete char</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //char not Added in Database
                            echo "<tr> <td colspan='7' class='error'> char not Added Yet. </td> </tr>";
                        }

                    ?>

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>