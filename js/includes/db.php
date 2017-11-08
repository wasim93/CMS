<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'cms';
define('APP_URL', 'http://localhost/oct_workshops/cms/');


foreach($db as $key => $value){

define(strtoupper($key), $value);


}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


/* if($connection){

 echo "We Are Connected";

}
 */

function redirectMe($loc)
  { ?>
        <script>
            window.location = '<?php echo $loc; ?>';
        </script>
        <?php
  }
