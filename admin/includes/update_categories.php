<form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Edit Category</label>

                            <?php    //Edit Query
                                      
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
                                                                          

                                    <?php 
                                     }
                                     } 
                                    ?> 
                            
                            <?php 
                                    // Update Query
                                if (isset($_POST['update_category'])) 
                            {
                                        
                                       $get_edit_title = $_POST['cat_title'];
                                       $query1 = "UPDATE categories 
                                       SET cat_title = '".$get_edit_title."' 
                                       WHERE cat_id='".$_GET['edit']."'";
                                       echo $get_edit_title;
                                       echo $cat_id;
                                       echo $_GET['edit'];
                                       //$update_query = mysqli_query($connection,$query);
                                       if (!$query1) 
                                       {
                                          die("Query Failed ". mysqli_error($connection));
                                       } 


                            }?>
                                <!-- <input class="form-control" type="text" name="cat_title"> -->
                            </div>
                            <div class="form-group">                
                                <input class="btn btn-primary" type="submit" name="update_category" value="Update">

                            </div>      
                        </form>