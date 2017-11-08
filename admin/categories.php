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

                        <?php  insert_category();   ?>
                                    <!-- Adding Category Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add New Category                              
                              </label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">                
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">

                            </div>      
                        </form>

                        <hr>

                        <!-- Update And Include -->

                        <?php
                          if (isset($_GET['edit'])) 
                            {
                            $cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
  }?>
                            
                  <!--     }
                     ?> -->
                         
                    </div>

                    <!-- End Adding Categories Form -->

                    
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
                                 <!-- adding All Categories -->

                                <?php FindAllCategories(); ?>
                                  <!-- Deleting Categories Function -->
                                <?php DeleteCategories();  ?>
            
                                
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