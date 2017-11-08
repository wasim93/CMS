<?php 

function insert_category()
{
			if(isset($_POST['submit']))
                        {
                        	global $connection;

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
}



function FindAllCategories()
{
									global $connection;
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
                                     <a class="btn btn-primary btn-sm" href ='categories.php?edit=<?php echo $cat_id;?> '>Edit</a>
                                     <a class="btn btn-danger btn-sm" href ='categories.php?delete=<?php echo $cat_id;?> '> Delete </a>
                                     </td>
                                    </tr>

                            <?php } //end while 
}




function DeleteCategories()
{										
									global $connection;
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


}





 ?>