<?php
include('admin_header.php');
$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{

?>



            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row m-t-30">
                            <div class="col-md-12">
                            <h3 class="title-5 m-b-35">data table</h3>

                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                    <thead>
                                            <tr>
                                                <th>Fname</th>
                                                <th>Lname</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th></th>
                                                <th></th>

                                                <th>Block</th>
                                                <!-- <th>Unblock</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                            foreach($list as $row)

                                            {
                                                ?>
                                                <form action='<?php echo site_url("Adminctrl/deal_block");?>' method='post'>
                                                <?php

                                                $id=$row->log_id;
                                                $status=$row->status;
                                                echo "<tr>";
                                                echo "<td>".$row->fname."</td>";
                                                echo "<td>".$row->lname."</td>";
                                                echo "<td>".$row->mobile."</td>";
                                                echo "<td>".$row->email."</td>";
                                                echo "<td><input type='hidden' name='status' value='$status'></td>";



                                                if($status==0)
                                                {
                                                echo "<td><input type='hidden' name='logid' value='$id'></td>";
                                                echo "<td><input type='submit' class='btn btn-primary btn-sm ' name='unblock' value='Unblock'></td>  ";
                                                }
                                                else
                                                {
                                                echo "<td><input type='hidden' name='logid' value='$id'></td>";
                                                echo "<td><input type='submit' class='btn btn-danger btn-sm' name='block' value='Block'></td>  ";
                                                }
                                                echo "</tr>";

                                               echo "</form>";
                                            }
                                        ?>
                                       

                                        </tbody>
                                        
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
       
<?php
include('admin_footer.php');
}else{
    $CI->login();
}
?>