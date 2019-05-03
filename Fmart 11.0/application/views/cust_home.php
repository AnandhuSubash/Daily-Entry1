<?php
$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{
?>

<html>
<head>
</head>
<body>
<?php 

echo $data->log_id;

?>
<label><a href="<?php echo site_url("Fmartctrl/logout"); ?>">Logout</a></label>
  
</body>
</html>
<?php
}else{
    $CI->login();
}
?>
