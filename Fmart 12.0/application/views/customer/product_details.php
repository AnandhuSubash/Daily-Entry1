<?php

$CI =&get_instance();
$a=$CI->sessionin();
$cust_id=$CI->cust_id();

if($a==1)
{
    include('cust_header.php');
?>

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                                <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">white modern chair</li>
                            </ol>
                        </nav>
                    </div>
                </div>
<?php
foreach($product as $row)
{
$f_id=$row->furniture_id;
$deal_id=$row->deal_id;
$name=$row->name;
$price=$row->price;
$desc=$row->description;
$image=$row->image;

}
?>

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
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?php echo base_url(); ?>images/home/<?php echo $image; ?>");">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                            <img class="d-block w-100"  src="<?php echo base_url(); ?>images/home/<?php echo $image; ?>" alt="First slide">
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
                                    <h6><?php echo $name; ?></h6>
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
                                <p>Height <?php echo $height; ?>cm<br>
                                Width <?php echo $width; ?>cm<br>
                                Depth <?php echo $depth; ?>cm<br>
                                Weight <?php echo $weight; ?>kg</p>

                            </div>
                            <div class="short_overview my-5">
                                <p><?php echo $desc; ?></p>
                            </div>
                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" action="<?php echo site_url("Custctrl/add_cart"); ?>" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                <input type="hidden" name="f_id" value="<?php echo $f_id; ?>">
                                <input type="hidden" name="deal_id" value="<?php echo $deal_id; ?>">
                                <input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">
                                <input type="hidden" name="image" value="<?php echo $image; ?>">

                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                <input type="hidden" name="rate" value="<?php echo $price; ?>">

                                <input type="hidden" name="name" value="<?php echo $name; ?>">



                                </div>
                                <?php 
                                if($flag==0)
                                {
                                    ?>
                                <input type="submit" name="add" class="btn amado-btn" value="Add to Cart">
                                <?php
                                }
                                else
                                {
                                ?>
                                <input type="submit" name="go" class="btn amado-btn" value="Go to Cart">
                                <?php
                                }
                                ?>
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
include('cust_footer.php');
}else{
    $CI->login();
}
?>  