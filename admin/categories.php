<?php include "includes/index_header.php"; ?>

<?php                          // Getting Values Categories Into Table
                              $query = "SELECT cat_id,cat_title FROM categories ORDER BY cat_id ASC";
                              $select_categories = $connection->query($query); 
?>

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
                    
                    <div class="col-xs-4"><!-- Adding Categories Form -->

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
                                    $query = "INSERT INTO categories(cat_title) VALUES('$cat_title') ";
                                    $create_category_query = $connection->query($query); 
                                    if (mysqli_affected_rows($connection) == 1) 
                                    {
                                        redirectMe (APP_URL.'admin/categories.php');
                                    }
                                }
                        }

                         ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add New Category</label>
                                <input class="form-control" type="text" name="cat_title">

                            </div>

                            <div class="form-group">
                                
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">

                            </div>      
                        </form>

                    </div><!-- End Adding Categories Form -->

                    
                    <div class="col-xs-8"><!-- Category Table -->

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
                                while($row = $select_categories->fetch_assoc()) 
                               { 
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                              ?>    
                                    <tr>                                
                                     <td><?php echo $cat_id; ?></td>
                                     <td><?php echo $cat_title; ?></td>
                                     <td><a href ='categories.php?delete=<?$cat_id;?>'> Delete </a>
                                     </td>
                                    </tr>

                            <?php } ?>
            
                                
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