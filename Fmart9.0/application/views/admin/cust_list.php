

<?php
include('admin_header.php');
$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{

?>
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
                                                <th>Exists</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            foreach($list as $row)
                                            {
                                                $y='Yes';
                                                $n='No';
                                                $status=$row->status;
                                                echo "<tr>";
                                                echo "<td>".$row->fname."</td>";
                                                echo "<td>".$row->lname."</td>";
                                                echo "<td>".$row->mobile."</td>";
                                                echo "<td>".$row->email."</td>";
                                                if($status==1)
                                                {
                                                 echo "<td>".$y."</td>";
  
                                                }
                                                else
                                                {
                                                    echo "<td>".$n."</td>";

                                                }
                                                echo "</tr>";
                                            }
                                            ?>    
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
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