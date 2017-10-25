<?php include "includes/index_header.php"; ?>



<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/index_navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>
                    
                    <div class="col-xs-5"><!-- Adding Categories Form -->

                        <?php 

                        if(isset($_POST['submit']))
                        {

                            $cat_title = $_POST['cat_title'];

                                if(empty(trim($cat_title)))
                                {
                                    echo "Field Should Not Be Empty";
                                }
                                else
                                {
                                    $query = "INSERT INTO categories (cat_title) VALUES('$cat_title') ";
                                    $create_category_query = $connection->query($query); 
                                    header('location:categories.php');
                                    // if (mysqli_affected_rows($connection) == 1) 
                                    // {
                                    //     redirectMe (APP_URL.'admin/categories.php');
                                    // }
                                
                                }
                        }

                         ?>
                                    <!-- Adding Category Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add New Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">                
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">

                            </div>      
                        </form>

                        <hr>
                                    <!-- Updating Category Form -->
                         <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Edit Category</label>

                            <?php    //Update Query
                                      
                                    if (isset($_GET['edit'])) 
                                    {
                                     $cat_id = $_GET['edit'];
                                     $query = "SELECT cat_id,cat_title FROM categories WHERE cat_id = $cat_id";
                                     $select_categories = $connection->query($query);

                                     while($row = $select_categories->fetch_assoc()) 
                                        { 
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        
                            ?>
                                         <input type="text" name="cat_title" class="form-control" 
                                         value="<?php if(isset($cat_title))
                                         {
                                         echo $cat_title; }?>" >
                                         
                                        

                                       <?php }} ?> 
                            
                                
                                <!-- <input class="form-control" type="text" name="cat_title"> -->
                            </div>
                            <div class="form-group">                
                                <input class="btn btn-primary" type="submit" name="submit" value="Update">

                            </div>      
                        </form>

                    </div><!-- End Adding Categories Form -->

                    
                    <div class="col-xs-7"><!-- Category Table -->

                        <table class="table table-bordered table-hover">
                         
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                 // Getting Values Categories Into Table
                              $query = "SELECT cat_id,cat_title FROM categories ORDER BY cat_id ASC";
                              $select_categories = $connection->query($query); 
                                 while($row = $select_categories->fetch_assoc()) 
                               { 
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                              ?>    
                                    <tr>                                
                                     <td><?php echo $cat_id; ?></td>
                                     <td><?php echo $cat_title; ?></td>
                                     <td> 
                                     <a href ='categories.php?edit=<?php echo $cat_id;?> '>Edit |</a>
                                     <a href ='categories.php?delete=<?php echo $cat_id;?> '> Delete </a>
                                     </td>
                                    </tr>

                            <?php }

                                    // Delete Query
                                    if (isset($_GET['delete'])) {
                                        
                                       //$get_delete_id = $_GET['delete'];
                                       $query = "DELETE FROM categories WHERE cat_id = '".$_GET['delete']."' ";
                                       $delete_query = $connection->query($query); 
                                       if ($connection->query($query))
                                        {
                                            header('location:categories.php');
                                            exit();
                                        } else 
                                        {
                                        echo "Error: " . $query . "<br>" . $connection->error;
                                        }       
                                    }

                                            
                             ?>
            
                                
                            </tbody>
                        </table>


                    </div> <!-- End Category Table -->
                </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/index_footer.php";?>