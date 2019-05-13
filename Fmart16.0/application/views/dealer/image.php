<html>
<body>
<?php
foreach ($img as $row) {
    # code...
$image=$row->image;

?>
<img src="<?php echo base_url(); ?>images/home/<?php echo $image; ?>" alt="">
<?php
}
?>
</body>

</html>