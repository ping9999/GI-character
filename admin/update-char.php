<?php include('partials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected char
        $sql2 = "SELECT * FROM tbl_char WHERE id=$id";
        //execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //Get the Individual Values of Selected char
        $title = $row2['title'];
        $description = $row2['description'];
        $current_image = $row2['image_name'];
        $W_current_image = $row2['W_image_name'];
        $current_area = $row2['area_id'];

    }
    else
    {
        //Redirect to Manage char
        header('location:'.SITEURL.'admin/manage-char.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Update char</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data" >
        
        <table class="tbl-30" >

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

    
            <tr>
                <td>Current Avartar Image: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            //Image not Available 
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/char/<?php echo $current_image; ?>" width="100%">
                            <?php
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Current  Wallpages Image: </td>
                <td>
                    <?php 
                        if($W_current_image == "")
                        {
                            //Image not Available 
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/char/<?php echo $W_current_image; ?>" width="100%">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select New Avatar Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Select New Wallpages Image: </td>
                <td>
                    <input type="file" name="W_image">
                </td>
            </tr>

            <tr>
                <td>area: </td>
                <td>
                    <select name="area">

                        <?php 
                            //Query to Get ACtive Categories
                            $sql = "SELECT * FROM tbl_area ";
                            //Execute the Query
                            $res = mysqli_query($conn, $sql);
                            //Count Rows
                            $count = mysqli_num_rows($res);

                            //Check whether area available or not
                            if($count>0)
                            {
                                //area Available
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $area_title = $row['title'];
                                    $area_id = $row['id'];
                                    
                                    //echo "<option value='$area_id'>$area_title</option>";
                                    ?>
                                    <option <?php if($current_area==$area_id){echo "selected";} ?> value="<?php echo $area_id; ?>"><?php echo $area_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                //area Not Available
                                echo "<option value='0'>area Not Available.</option>";
                            }

                        ?>

                    </select>
                </td>
            </tr>

           
    

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $W_current_image; ?>">


                    <input type="submit" name="submit" value="Update char" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //echo "Button Clicked";

                //1. Get all the details from the form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $current_image = $_POST['current_image'];
                $W_current_image = $_POST['W_current_image'];
                $area = $_POST['area'];
                //2. Upload the image if selected

                //CHeck whether upload button is clicked or not
                if(isset($_FILES['image']['name']))
                {
                    //Upload BUtton Clicked
                    $image_name = $_FILES['image']['name']; //New Image NAme

                    //CHeck whether th file is available or not
                    if($image_name!="")
                    {
                        //IMage is Available
                        //A. Uploading New Image

                        //REname the Image
                        $ext = end(explode('.', $image_name)); //Gets the extension of the image

                        $image_name = "char-Name-".rand(0000, 9999).'.'.$ext; //THis will be renamed image

                        //Get the Source Path and DEstination PAth
                        $src_path = $_FILES['image']['tmp_name']; //Source Path
                        $dest_path = "../images/char/".$image_name; //DEstination Path

                        //Upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        /// CHeck whether the image is uploaded or not
                        if($upload==false)
                        {
                            //FAiled to Upload
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            //REdirect to Manage char 
                            header('location:'.SITEURL.'admin/manage-char.php');
                            //Stop the Process
                            die();
                        }
                        //3. Remove the image if new image is uploaded and current image exists
                        //B. Remove current Image if Available
                        if($current_image!="")
                        {
                            //Current Image is Available
                            //REmove the image
                            $remove_path = "../images/char/".$current_image;

                            $remove = unlink($remove_path);

                            //Check whether the image is removed or not
                            if($remove==false)
                            {
                                //failed to remove current image
                                $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current image.</div>";
                                //redirect to manage char
                                header('location:'.SITEURL.'admin/manage-char.php');
                                //stop the process
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image; //Default Image when Image is Not Selected
                    }
                }
                else
                {
                    $image_name = $current_image; //Default Image when Button is not Clicked
                }

                if(isset($_FILES['W_image']['name']))
                {
                    //Get the details of the selected image
                    $W_image_name = $_FILES['W_image']['name'];

                    //Check Whether the Image is Selected or not and upload image only if selected
                    if($W_image_name!="")
                    {
                        // Image is SElected
                        //A. REnamge the Image
                        //Get the extension of selected image (jpg, png, gif, etc.) "vijay-thapa.jpg" vijay-thapa jpg
                        $W_ext = end(explode('.', $W_image_name));

                        // Create New Name for Image
                        $W_image_name = "W-char-Name-".rand(0000,9999).".".$ext; //New Image Name May Be "W-char-Name-657.jpg"

                        //B. Upload the Image
                        //Get the Src Path and DEstinaton path

                        // Source path is the current location of the image
                        $W_src = $_FILES['W_image']['tmp_name'];

                        //Destination Path for the image to be uploaded
                        $W_dst = "../images/char/".$W_image_name;

                        //Finally Uppload the char image
                        $W_upload = move_uploaded_file($W_src, $W_dst);

                        //check whether image uploaded of not
                        if($W_upload==false)
                        {
                            //Failed to Upload the image
                            //REdirect to Add char Page with Error Message
                            $_SESSION['W_upload'] = "<div class='error'>Failed to Upload  Wallpager Image.</div>";
                            header('location:'.SITEURL.'admin/add-char.php');
                            //STop the process
                            die();
                        }

                    }

                }
                else
                {
                    $W_image_name = ""; //SEtting DEfault Value as blank
                }

                //4. Update the char in Database
                $sql3 = "UPDATE tbl_char SET 
                    title = '$title',
                    description = '$description',
                    image_name = '$image_name',
                    W_image_name = '$W_image_name',
                    area_id = '$area'
                    WHERE id=$id
                ";

                //Execute the SQL Query
                $res3 = mysqli_query($conn, $sql3);

                //CHeck whether the query is executed or not 
                if($res3==true)
                {
                    //Query Exectued and char Updated
                    $_SESSION['update'] = "<div class='success'>char Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-char.php');
                }
                else
                {
                    //Failed to Update char
                    $_SESSION['update'] = "<div class='error'>Failed to Update char.</div>";
                    header('location:'.SITEURL.'admin/manage-char.php');
                }

                
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>