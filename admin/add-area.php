<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add area</h1>

        <br><br>

        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br><br>

        <!-- Add area Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="area Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add area" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add area Form Ends -->

        <?php 
        
            //CHeck whether the Submit Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. Get the Value from area Form
                $title = $_POST['title'];

                
                //Check whether the image is selected or not and set the value for image name accoridingly
                //print_r($_FILES['image']);

                //die();//Break the Code Here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the Image
                    //To upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];
                    
                    // Upload the Image only if image is selected
                    if($image_name != "")
                    {

                        //Auto Rename our Image
                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the Image
                        $image_name = "Food_area_".rand(000, 999).'.'.$ext; // e.g. Food_area_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/area/".$image_name;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //Redirect to Add area Page
                            header('location:'.SITEURL.'admin/add-area.php');
                            //STop the Process
                            die();
                        }

                    }
                }
                else
                {
                    //Don't Upload Image and set the image_name value as blank
                    $image_name="";
                }

                //2. Create SQL Query to Insert area into Database
                $sql = "INSERT INTO tbl_area SET 
                    title='$title',
                    image_name='$image_name'
                ";

                //3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);

                //4. Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and area Added
                    $_SESSION['add'] = "<div class='success'>area Added Successfully.</div>";
                    //Redirect to Manage area Page
                    header('location:'.SITEURL.'admin/manage-area.php');
                }
                else
                {
                    //Failed to Add area
                    $_SESSION['add'] = "<div class='error'>Failed to Add area.</div>";
                    //Redirect to Manage area Page
                    header('location:'.SITEURL.'admin/add-area.php');
                }
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>