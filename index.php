<?php
 $active='home';
 include("includes/header.php");
?>


    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="mycarousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="mycarousel" daya-slide-to="0" class="active"></li>
                    <li data-target="mycarousel" daya-slide-to="1"></li>
                    <li data-target="mycarousel" daya-slide-to="2"></li>
                    <li data-target="mycarousel" daya-slide-to="3"></li>
                    
                </ol>
                <div class="carousel-inner"><!--carousel-inner starts-->
                   <?php
                    $get_slides="select * from slider LIMIT 0,1";
                    $run_slides = mysqli_query($con,$get_slides);

                    while($row_slides=mysqli_fetch_array($run_slides)){
                        $slide_name=$row_slides['slide_name'];
                    $slide_image=$row_slides['slide_image'];
                    echo "<div class='item active'> 
                    <img src='admin_area/slider_images/$slide_image'>

                    </div>
                    ";

                    }
                     $get_slides="select * from slider LIMIT 1,3";
                    $run_slides = mysqli_query($con,$get_slides);

                    while($row_slides=mysqli_fetch_array($run_slides)){
                        $slide_name=$row_slides['slide_name'];
                    $slide_image=$row_slides['slide_image'];
                    echo "<div class='item'> 
                    <img src='admin_area/slider_images/$slide_image'>

                    </div>
                    ";

                    }


                   ?>
                </div><!--carousel-inner ends-->
                <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>       

                </a>
                <a href="#mycarousel" class="right carousel-control" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>       

                </a>
                
            </div>
            
        </div>
        
    </div>
    <div id="advantage">
        <div class="container">
            <div class="same-height-row">
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-tag"></i>
                        
                    </div>
                    <h3><a href="#">BEST PRICES</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    
                </div>
                
            </div>
            
        </div>
             <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                        
                    </div>
                    <h3><a href="#">BEST OFFER</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    
                </div>
                
            </div>
             <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        
                    </div>
                    <h3><a href="#">100% ORIGINAL</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2> OUR LATEST PRODUCTS </h2>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    <div id="content" class="container">
        <div class="row">
           <?php
            
            getPro();

           ?>

            
        </div>
        
    </div>
    
    <?php

    include("includes/footer.php");
    ?>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>