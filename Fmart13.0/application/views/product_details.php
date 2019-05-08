
<?php
include('fmart_header.php');
?>
        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
            <?php
foreach($product as $row)
{
    $fid=$row->furniture_id;
    $f_name=$row->name;
    $price=$row->price;
    $desc=$row->description;
    $img=$row->image;    
}
?>
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="<?php echo site_url("Fmartctrl/home"); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $f_name; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>



<?php 
foreach($dimension as $row)
{
$height=$row->height;
$width=$row->width;
$depth=$row->depth;
$weight=$row->weight;

}
?>
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?php echo base_url(); ?>images/home/<?php echo $img; ?>);">
                                    </li>
                                   
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                            <img class="d-block w-100"  src="<?php echo base_url(); ?>images/home/<?php echo $img; ?>" alt="First slide">
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">Rs <?php echo $price; ?></p>
                                <a href="product-details.html">
                                    <h6><?php echo $f_name; ?></h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p><?php echo $desc; ?></p>
                            </div>

                            <div>
                            <p>Material : <?php echo $material; ?><br>Ideal for : <?php echo $cat; ?><br>Type : <?php echo $type; ?></p>
                            
                            </div>
                            <div class="short_overview my-5">
                                <p>Height <?php echo $height; ?>cm<br>
                                Width <?php echo $width; ?>cm<br>
                                Depth <?php echo $depth; ?>cm<br>
                                Weight <?php echo $weight; ?>kg</p>

                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" action="<?php echo site_url("Fmartctrl/add_to_cart"); ?>" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <input type="hidden" name="f_id" value="<?php echo $fid; ?>">
                                <input type="hidden" name="f_name" value="<?php echo $f_name; ?>">

                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                <input type="hidden" name="rate" value="<?php echo $price; ?>">
                                <input type="hidden" name="image" value="<?php echo $img; ?>">

                                <button type="submit" name="addtocart" value="" class="btn amado-btn">Add to cart</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
<?php
include('fmart_footer.php');
?>
   