
<?php
include('admin_header.php');
$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{

?>


<?php
include('admin_footer.php');
}else{
    $CI->login();
}
?>