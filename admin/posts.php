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
                        

    <?php       if(isset($_GET['source']))
                        {

                            $source = $_GET['source'];
                        }

                        else
                        {
                            $source = '';
                        }

                        switch ($source) 
                        {
                            case 'add_post':
                                include "includes/add_post.php";
                                break;

                            case '40':
                                echo "Nice 40";
                                break;
                            
                            default:
                                include "includes/view_all_posts.php";
                                break;
                        }


    ?>
                       

                        
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/index_footer.php";?>