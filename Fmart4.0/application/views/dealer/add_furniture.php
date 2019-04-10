<?php

$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{
    include('dealer_header.php');
?>


            <!-- MAIN CONTENT-->
           

<?php
include('dealer_footer.php');
}
else{
    $CI->login();
}
?>