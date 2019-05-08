<?php
include('dealer_header.php');
?>

            <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <!-- <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">  Your Furnitures                     

                        </div> -->

                            <div class="card-body">
                            <div class="row m-t-30">
                            <div class="col-md-12">
                            <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>description</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        foreach($furniture as $row)
                                        {
                                            $name=$row->name;
                                            $price=$row->price;
                                            $desc=$row->description;
                                            ?>
                                            <tr>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $price; ?></td>
                                                <td><?php echo $desc; ?></td>
                                                
                                            </tr>
                                            <?php

                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div></div>
                            </div>
                   
            </div>
        </div>
    </div>


<?php
include('dealer_footer.php');
?>