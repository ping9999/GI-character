<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Add char</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the char">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the char."></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>area: </td>
                    <td>
                        <select name="area">
                            <?php 
                                $sql = "SELECT * FROM tbl_area ";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                            ?>
                                     <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No area Found</option>
                                    <?php
                                }
                            ?>

                        </select>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add char" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 

            //CHeck whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the char in Database
                //echo "Clicked";
                
                //1. Get the DAta from Form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $area = $_POST['area'];
                //2. Upload the Image if selected
                //Check whether the select image is clicked or not and upload the image only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //Get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //Check Whether the Image is Selected or not and upload image only if selected
                    if($image_name!="")
                    {
                        // Image is SElected
                        //A. REnamge the Image
                        //Get the extension of selected image (jpg, png, gif, etc.) "vijay-thapa.jpg" vijay-thapa jpg
                        $ext = end(explode('.', $image_name));

                        // Create New Name for Image
                        $image_name = "char-Name-".rand(0000,9999).".".$ext; //New Image Name May Be "char-Name-657.jpg"

                        //B. Upload the Image
                        //Get the Src Path and DEstinaton path

                        // Source path is the current location of the image
                        $src = $_FILES['image']['tmp_name'];

                        //Destination Path for the image to be uploaded
                        $dst = "../images/char/".$image_name;

                        //Finally Uppload the char image
                        $upload = move_uploaded_file($src, $dst);

                        //check whether image uploaded of not
                        if($upload==false)
                        {
                            //Failed to Upload the image
                            //REdirect to Add char Page with Error Message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-char.php');
                            //STop the process
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; //SEtting DEfault Value as blank
                }

                //3. Insert Into Database

                //Create a SQL Query to Save or Add char
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO tbl_char SET 
                    title = '$title',
                    description = '$description',
                    image_name = '$image_name',
                    area_id = $area
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);
                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>char Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-char.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to Add char.</div>";
                    header('location:'.SITEURL.'admin/manage-char.php');
                }

                
            }

        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>