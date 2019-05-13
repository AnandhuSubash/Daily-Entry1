<?php
include('dealer_header.php');
?>

            <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">



                            <div class="card-body">
                            <div class="row m-t-30">
                            <div class="col-md-12">
                           
                                <h3 class="title-5 m-b-35">Furnitures</h3>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                
                                                <th>Product</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                               
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <?php

                                            foreach($furniture as $row)
                                            {
                                                $f_id=$row->furniture_id;
                                                $name=$row->name;
                                                $price=$row->price;
                                                $desc=$row->description;
                                                ?>
                                            <tbody>
                                            <tr class="tr-shadow">
                                               
                                              
                                                <td><?php echo $name; ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $name; ?></span>
                                                </td>
                                                <td class="desc"><?php echo $price; ?></td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                       
                                                        <form action="<?php echo site_url('Dealerctrl/update_furniture');?>" method="post">
                                                        <input type="hidden" name="f_id" value="<?php echo $f_id?>">
                                                        <button type="submit"class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-mail-send fa-picture-o"></i>
                                                        </button>
                                                            
                                                         </form>
                                                        <form action="">
                                                        <button class="item zmdi-delete" data-toggle="tooltip" data-placement="top" title="Block">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        </form>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                           
                                            <?php
                                              }
                                            ?>
                                    </table>
                                </div>
                                </div>
                                </div>
                            </div>
                   
            </div>
        </div>
    </div>


<?php
include('dealer_footer.php');

?>