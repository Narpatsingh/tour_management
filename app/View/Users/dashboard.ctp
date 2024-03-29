<body id="page-top">
    <?php echo $this->Session->flash(); ?>
    <!--Preload-->
    <div class="preloader">
        <?php echo $this->element('loader/loader') ?>  
    </div>
    <!--End Preload-->
    <!-- <div class="top-header">
        <div class="row">
            <div class="col-md-12">
                <div class="top-contact">
                    <span class="call"> Call <span class="number">+91 2358745824</span></span>
                </div>
            </div>
        </div>
    </div> -->
    
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container full_width" style="margin-left: 0px">
            <div class="row">
                <div class="col-xs-12">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand page-scroll TourLogo" href="/">
                             <?php
                                echo $this->Html->image(getLogo(), array('class' => 'img-responsive img-display silshine_logo'));
                            ?>
                        </a>    
                        <!-- <p class="site_name">Silshine Trip</p> -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a class="page-scroll" href="#home">Home</a>
                            </li>

                                <li class="dropdown mega-dropdown india">
                                    <a href="#" target="_blank" class="dropdown-toggle page-scroll" data-toggle="dropdown">India <span class="caret"></span></a>              
                                    <ul class="dropdown-menu mega-dropdown-menu">
                                      <?php  $count = 0;
                                        $state_count = count($states);
                                        if (!count($states)) { ?>   
                                            <h3 class='text-warning'><?php echo __('No record found.')?></h3>
                                        <?php }else {
                                        foreach ($states as $key => $value) {
                                            if($count == 0){
                                                echo '<li class="col-sm-12 col-sm-12 col-md-3 col-lg-2">';
                                                echo '<ul>';
                                                echo '<li class="dropdown-header">';
                                                echo $this->Html->link($value['State']['name'], array('controller' => 'tours', 'action' => 'state_detail',$value['State']['id']),array('class'=>'dropdown-header'));
                                                echo '</li>';
                                                foreach ($value['City'] as $key1 => $name) {
                                                    echo '<li>';
                                                    echo $this->Html->link($name['name'], array('controller' => 'tours', 'action' => 'city_detail',$name['id']));
                                                    echo '</li>';
                                                }
                                                $count++;   
                                            }elseif($count == 2){
                                                echo '<li class="dropdown-header">';
                                                echo $this->Html->link($value['State']['name'], array('controller' => 'tours', 'action' => 'state_detail',$value['State']['id']),array('class'=>'dropdown-header'));
                                                echo '</li>';
                                                foreach ($value['City'] as $key1 => $name) {
                                                    echo '<li>';
                                                    echo $this->Html->link($name['name'], array('controller' => 'tours', 'action' => 'city_detail',$name['id']));
                                                    echo '</li>';     
                                                }
                                                echo '</li>';
                                                echo '</ul>';
                                                $count = 0;
                                            }elseif($count < 2){
                                                echo '<li class="dropdown-header">';
                                                echo $this->Html->link($value['State']['name'], array('controller' => 'tours', 'action' => 'state_detail',$value['State']['id']),array('class'=>'dropdown-header'));
                                                echo '</li>';
                                                foreach ($value['City'] as $key1 => $name) {
                                                    echo '<li>';
                                                    echo $this->Html->link($name['name'], array('controller' => 'tours', 'action' => 'city_detail',$name['id']));
                                                    echo '</li>';       
                                                }
                                                $count++;
                                            }
                                            } 
                                        } 
                                        if($state_count % 3 != 0){
                                            echo '</li>';
                                            echo '</ul>';
                                    
                                        } ?>
                                    </ul>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#packages">Packages</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#hot-deals">Hot Deals</a>
                                </li>
                                
                                <li>
                                    <a class="page-scroll" href="#deals-discounts">Deals and Discounts</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#gallery">Gallery</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#blog">Blog</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#testimonials">Feedback</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#contact">Contact Us</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#about-us">About Us</a>
                                </li>
                                <?php if($this->Session->read('Auth.User.id')){ 
                                    $logUserName = $this->Session->read('Auth.User.name');
                                ?>
                                
                                <li>
                                  <div class="navbar-right" style="margin-top: -3px;">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown user user-menu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <?php
                                                  echo $this->Html->image(getUserPhoto($this->Session->read('Auth.User.id'),$this->Session->read('Auth.User.photo'), false, false), array('class' => 'img-circle'));
                                                ?>
                                                <span><?php echo $logUserName ?><i class="caret"></i></span>
                                            </a>
                                            <ul class="dropdown-menu" style="min-width: 220px;padding: 0px">
                                                <!-- Admin image -->
                                                <li class="user-header bg-danger">
                                                    <?php
                                                      echo $this->Html->image(getUserPhoto($this->Session->read('Auth.User.id'),$this->Session->read('Auth.User.photo'), false, false), array('class' => 'img-circle'));
                                                    ?>
                                                    <p><?php echo $logUserName ?><small></small>
                                                    </p>
                                                </li>
                                                <!-- Menu Body -->
                                                <li class="user-body">
                                                    <div class="col-xs-12 text-center">
                                                        <a href="/users/change_password" class="no-hover-text-decoration">Change Password</a>
                                                    </div>
                                                </li>
                                                <!-- Menu Footer-->
                                                <li class="user-footer">
                                                    <div class="pull-left">
                                                        <a href="/users/profile" class="btn btn-default btn-flat">Profile</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a href="/users/logout" class="btn btn-default btn-flat">Log out</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                  </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <!-- /.navbar-collapse -->
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        <!-- /.container -->
    </nav>
<!-- Banner Section -->
    <section id="home"> 
        <div id="banner" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
            <ol class="carousel-indicators">
                <li data-target="#banner" data-slide-to="0" class="active"></li>
                <li data-target="#banner" data-slide-to="1"></li>
                <li data-target="#banner" data-slide-to="2"></li>
                <li data-target="#banner" data-slide-to="3"></li>
                <li data-target="#banner" data-slide-to="4"></li>
                <li data-target="#banner" data-slide-to="5"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $i=0;
                if (!count($sliders)) { ?>   
                    <h3 class='text-warning'><?php echo __('No record found.')?></h3>
                <?php }else {
                foreach ($sliders as $key => $slider) { 
                        if($i == 0){$i++; ?>
                    <div class="item active" >
                        <img src="<?php echo  $slider['Tour']['img']; ?>" alt="" />
                        <div class="carousel-caption">
                            <h2><?php echo $slider['Slider']['title'];?> </h2>
                            <h4><?php echo $slider['Slider']['description']; ?></h4>
                            <h4><?php echo $slider['Slider']['price_text']; ?> &#x20b9;<?php echo $slider['Tour']['price']; ?></h4>
                            <a href="tours/details/<?php echo $slider['Tour']['id']; ?>" >View Package <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="item">
                        <img src="<?php echo  $slider['Tour']['img']; ?>" alt="" />
                        <div class="carousel-caption">
                            <h2><?php echo $slider['Slider']['title'];?> </h2>
                            <h4><?php echo $slider['Slider']['description']; ?></h4>
                            <h4><?php echo $slider['Slider']['price_text']; ?> &#x20b9;<?php echo $slider['Tour']['price']; ?></h4>
                            <a href="tours/details/<?php echo $slider['Tour']['id']; ?>" >View Package <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <?php } ?>    
                <?php } ?>
                <?php } ?>
            </div><!--end carousel-inner-->
            <!-- Controls -->
            <a class="control left" href="#banner" data-slide="prev"><i class="fa fa-long-arrow-left"></i></a>
            <a class="right control" href="#banner" data-slide="next"><i class="fa fa-long-arrow-right"></i></a>
        </div>      
    </section>
    <!--end Banner-->
    <section id="packages" class="inverse">
        <!-- <hr> -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <h1 class="visible-title">Special Packages</h1>
                    </div>
                </div>
            </div>
            <div id="package" class="carousel slide carousel-fade mb-2" data-ride="carousel">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="owl-carousel" id="packages-carousel">
                            <?php if (!count($specials)) { ?>   
                            <h3 class='text-warning'><?php echo __('No record found.')?></h3>
                            <?php } else {
                                foreach ($specials as $key => $special){ ?>
                                <div class="tour-item">
                                    <div class="thumb">
                                        <img src="<?php echo $special['Tour']['img']; ?>" alt="" />
                                    </div>
                                    <div class="discount-info">
                                        <h3 class="text-white"><?php echo $this->Text->truncate( $special['City']['name'],'30',array(
                                                                                      'ending' => '...', 
                                                                                      'exact' => true));?></h3>
                                        <a class="" href="tours/details/<?php echo $special['Tour']['id']; ?>">View Details <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <section class="parallax1">
    </section>
    <!-- end Packages -->
    <!-- Hot Deals Section -->
    <section id="hot-deals" class="inverse">
        <!-- <hr> -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <h1 class="visible-title">Hot Deals</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php $i=0; ?>
            <div class="row">
            <?php if (!count($hots)) { ?>   
                <h3 class='text-warning'><?php echo __('No record found.')?></h3>
                <?php } else {
                foreach ($hots as $key => $hot) { ?>
                    <?php if($i == 0){
                        $i++; ?>
                    <div class="col-md-8 my-3">
                        <a href="tours/details/<?php echo $hot['Tour']['id']; ?>">
                            <div class="hotdeal">
                                <div class="deal-pic">
                                    <img src="<?php echo $hot['Tour']['img']; ?>" alt="">
                                </div>
                                <div class="deal-content">
                                   <label class="hotdeal-label">Starts from &#x20b9;<?php echo $hot['Tour']['price']; ?></label>
                                   <h2 class="hotdeal-name"><?php echo $hot['Tour']['name']; ?></h2>
                                   <span class="hotdeal-days"><?php echo $hot['Tour']['days']; ?> Days</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php }else if($i == 1){ 
                        $i++;?>
                    <div class="col-md-4 my-3">
                        <div class="hotdeal">
                            <a href="tours/details/<?php echo $hot['Tour']['id']; ?>">
                                <div class="deal-pic">
                                    <img src="<?php echo $hot['Tour']['img']; ?>" alt="">
                                </div>
                                <div class="deal-content">
                                   <label class="hotdeal-label">Starts from &#x20b9;<?php echo $hot['Tour']['price']; ?></label>
                                   <h2 class="hotdeal-name"><?php echo $hot['Tour']['name']; ?></h2>
                                   <span class="hotdeal-days"><?php echo $hot['Tour']['days']; ?> Days</span>
                                </div>
                            </a>    
                        </div>
                    </div>
                    <?php }else if($i == 2){ 
                        $i++;?>
                    <div class="col-md-4 my-3">
                        <div class="hotdeal">
                            <a href="tours/details/<?php echo $hot['Tour']['id']; ?>">
                                <div class="deal-pic">
                                    <img src="<?php echo $hot['Tour']['img']; ?>" alt="">
                                </div>
                                <div class="deal-content">
                                   <label class="hotdeal-label">Starts from &#x20b9;<?php echo $hot['Tour']['price']; ?></label>
                                   <h2 class="hotdeal-name"><?php echo $hot['Tour']['name']; ?></h2>
                                   <span class="hotdeal-days"><?php echo $hot['Tour']['days']; ?> Days</span>
                                </div>
                            </a>   
                        </div>
                    </div>
                    <?php }else if($i == 3){ 
                        $i = 0;?>
                    <div class="col-md-8 my-3">
                        <div class="hotdeal">
                            <a href="tours/details/<?php echo $hot['Tour']['id']; ?>">
                                <div class="deal-pic">
                                    <img src="<?php echo $hot['Tour']['img']; ?>" alt="">
                                </div>
                                <div class="deal-content">
                                   <label class="hotdeal-label">Starts from &#x20b9;<?php echo $hot['Tour']['price']; ?></label>
                                   <h2 class="hotdeal-name"><?php echo $hot['Tour']['name']; ?></h2>
                                   <span class="hotdeal-days"><?php echo $hot['Tour']['days']; ?> Days</span>
                                </div>
                            </a>    
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>     
            </div>
        </div>        
        
    </section>
    <!--end hot-deals-->
    <section class="parallax2">
    </section>
    <!-- Deals and Discounts -->
    <section id="deals-discounts" class="inverse">
        <!-- <hr> -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <h1 class="visible-title">Deals and Discounts</h1>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <div class="owl-carousel" id="deals-discounts-carousel">
                        <?php if (!count($discounts)) { ?>   
                        <h3 class='text-warning'><?php echo __('No record found.')?></h3>
                        <?php } else {
                            foreach ($discounts as $key => $discount) {  ?>
                            <div class="tour-item">
                                <div class="thumb">
                                    <img src="<?php echo $discount['Tour']['img']; ?>" alt="" />
                                </div>
                                <div class="discount-info">
                                    <div class="price-info">
                                        <span class="regular-price">&#x20b9;<?php echo $discount['Tour']['discount']; ?></span>
                                        <span class="sale-price">&#x20b9;<?php echo $discount['Tour']['price']; ?></span>
                                    </div>
                                    <h3><?php echo $this->Text->truncate($discount['Tour']['name'],'30',array(
                                                                                      'ending' => '...', 
                                                                                      'exact' => true));?></h3>
                                    <!-- <p><?php echo $discount['Tour']['description']; ?></p> -->
                                    <a href="tours/details/<?php echo $discount['Tour']['id']; ?>">View Details <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    </div>  
                </div>
            </div>
            
        </div>
        
    </section>
    <!--end deals-discounts-->
    <section class="count-section parallax" data-stellar-background-ratio="0.5" style="background-image: url(img/bg/1.jpg);">
        <!-- <hr> -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="remove_list_style">
                        <li>
                            <i class="fa fa-heart-o"></i>
                            <h2><span class="counter count">2500</span></h2>
                            <h4>Happy Clients</h4>
                        </li>
                        <li>
                            <i class="fa fa-bed"></i>
                            <h2><span class="counter count">350</span></h2>
                            <h4>Popular Hotels</h4>
                        </li>
                        <li>
                            <i class="fa fa-flag-checkered"></i>
                            <h2><span class="counter count">520</span></h2>
                            <h4>Top Destinations</h4>
                        </li>
                        <li>
                            <i class="fa fa-ship"></i>
                            <h2><span class="counter count">120</span></h2>
                            <h4>Cruises</h4>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--end count-section-->
    <!-- Gallery Section -->
    <section id="gallery">
        <div class="container mb-2">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <h1 class="visible-title">Gallery</h1>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <ul id="filter-list">
                        <li class="filter" data-filter="all">ALL</li>
                        <?php foreach ($galleryTypes as $key => $value) { ?>
                            <li class="filter" data-filter="<?php echo  $value; ?>"><?php echo  $value; ?></li>    
                        <?php } ?>
                    </ul><!-- @end #filter-list -->
                </div>
            </div>
            <div class="row" style="overflow: hidden;">
                <ul class="gallery-item">
                    <?php foreach ($gallerys as $key => $gallery) { ?>
                    <li class="gallery <?php echo $gallery['GalleryType']['title'] ?> mix_all">
                        <div class="thumb">
                            <?php echo $this->Html->image(GALLERY_IMAGE.$gallery['Gallery']['id'].'/'.$gallery['Gallery']['photo'])?>
                            <!-- <img src="<?php echo $gallery['Gallery']['photo']; ?>" alt="" /> -->
                            <div class="gallery-overlay">
                                <div class="gallery-overlay-inner">
                                    <h2><?php echo $gallery['Gallery']['description']; ?></h2>
                                    <a href="<?php echo GALLERY_IMAGE_LINK.$gallery['Gallery']['id'].'/'.$gallery['Gallery']['photo']; ?>" class="fancybox"><i class="fa fa-camera"></i></a>
                                </div>
                            </div>
                        </div><!--end post thumb-->
                    </li>
                    <?php } ?>
                </ul>
            </div>   
        </div>     
        
    </section>
    <!-- end gallery-->
    <section class="parallax3">
    </section>
    <!-- Blog Section -->
    <section id="blog" class="inverse">
        <!-- <hr> -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <h1 class="visible-title">Recent Posts</h1>
                    </div>
                </div>
            </div>
            
            <div id="blog" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="row">
                    <div class="col-xs-12" style="padding: 0px 0px 10px 0px;">
                        <div class="owl-carousel" id="blogs-carousel">
                            <?php if (!count($blogs)) { ?>   
                            <h3 class='text-warning'><?php echo __('No record found.')?></h3>
                            <?php } else { 
                                foreach ($blogs as $key => $blog){ ?>
                                <div class="tour-item">
                                    <div class="thumb">
                                        <img src="<?php echo $blog['Tour']['img']; ?>" alt="" />
                                    </div>
                                    <div class="discount-info">
                                        <h3 class="text-white"><?php echo $this->Text->truncate( $blog['City']['name'],'30',array(
                                                                                      'ending' => '...', 
                                                                                      'exact' => true));?></h3>
                                        <a class="" href="tours/details/<?php echo $blog['Tour']['id']; ?>">View Details <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- <hr> -->
    </section>
    <!--end blog-->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center" style="padding: 0px;">
                        <h1 class="visible-title">Feedback</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="customers-testimonials" class="owl-carousel">
                        <!--TESTIMONIAL 1 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle img" src="images/bg_img/testimonial/technical-support.png" alt="">
                                <p>
                                    The telephone Customer service team was very
                                    supportive. Special mention about raj , who was
                                    very helpful and patient in handling all queries
                                    and all bookings were done professionally by
                                    him.
                                </p>
                            </div>
                            <div class="testimonial-name">Helpful Support</div>
                        </div>
                        <!--END OF TESTIMONIAL 1 -->
                        <!--TESTIMONIAL 2 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle img" src="images/bg_img/testimonial/effort.png" alt="">
                                <p>
                                    Many Thanks for your effort with me. Be sure for
                                    my coming trips it will be with you as i was very
                                    pleased with your professionalization. Once
                                    again thank you personally and thanks silshine
                                    Trip.
                                </p>
                            </div>
                            <div class="testimonial-name">Great Efforts</div>
                        </div>
                        <!--END OF TESTIMONIAL 2 -->
                        <!--TESTIMONIAL 3 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle img" src="images/bg_img/testimonial/help.png" alt="">
                                <p>
                                    What ends well is well done. Thanks again for all
                                    the help.Looking forward for further
                                    engagements.
                                </p>
                            </div>
                            <div class="testimonial-name">Great Help</div>
                        </div>
                        <!--END OF TESTIMONIAL 3 -->
                        <!--TESTIMONIAL 4 -->
                        <div class="item">
                            <div class="shadow-effect">
                                <img class="img-circle img" src="images/bg_img/testimonial/sun-umbrella.png" alt="">
                                <p>
                                    We are back from one of the most amazing
                                    vacations we've been on lately! It was indeed a
                                    great experience- right from the interactions with
                                    bhavsar at SST, which were always informative
                                    and usefull
                                </p>
                            </div>
                            <div class="testimonial-name">Amazing Vacations</div>
                        </div>
                        <!--END OF TESTIMONIAL 4 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end testimonials-->
        
    <section id="contact" style="padding: 0px">
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-4">
                        <div class="contact-text">
                            <h3>Contact</h3>
                            <address>
                                E-mail : Silshinetripbooking@gmail.com<br>
                                Contact No : 8733897945,8758368590<br>
                            </address>
                        </div>
                        <div class="contact-address">
                            <h3>Address</h3>
                            <address>
                                501/6,Bhakti dharm,<br>
                                Township Palanpur,<br>
                                Canal Road,<br>
                                Jahangirabad Surat.
                            </address>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div id="contact-section">
                            <h3>Send a message</h3>
                            <div class="status alert alert-success" style="display: none"></div>
                            <?php echo $this->Form->create('Contact',array('controller'=>'contacts','action'=>'add')); ?>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required="required" placeholder="Email ID">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="message" required="required" class="form-control" rows="4" placeholder="Enter your message"></textarea>
                                </div>                        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Send</button>
                                </div>
                            </form>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end contatcus-->

    <section id="about-us" style="background-image: url('https://s-media-cache-ak0.pinimg.com/736x/f4/ac/6a/f4ac6aac3afb587f6cae04155656fca3.jpg')">
        <div class="container">
            <!-- <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center" style="padding: 0px;">
                        <h1 class="visible-title">About Us</h1>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                    <div id="abt-cnt-2-img">
                        <img src="images/bg_img/about-content.png" class="img-responsive" alt="about-img">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8" style="padding-bottom: 50px;"">
                    <div id="abt-cnt-2-text">
                        <h2>About Us<span><span><i class="fa fa-plane"></i> SilShine</span> Trip</span></h2>
                        <p>    SilShine trip is Travel Company which motive to Innovation in Travel Industry. This is most
                            powerful Travel company give to customer a best service in traveling which made only for
                            customer to give Help in tourism in the sense of whose doesn’t know about the tourism. We
                            Give an Affordable tour with Beauty of Nature to our Customer.
                            <br/><br/>
                            SilShine trip is give a product of the Train ticket Booking , Flight ticket Booking , Hotel
                            booking, Cab Booking, Customize Tour Package, Group Tour Package, Bus ticket Booking etc.
                            Our Aim to become a number One travel company in the world. Which is do with ours best.
                        </p>
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="abt-cnt-2-ftr">
                                    <span><i class="fa fa-diamond"></i></span>
                                    <h3 class="visible-title">Best Service</h3>
                                </div>
                            </div>
                            
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="abt-cnt-2-ftr">
                                    <span><i class="fa fa-clock-o"></i></span>
                                    <h3 class="visible-title">24/7 Availability</h3>
                                </div>
                            </div>
                            
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="abt-cnt-2-ftr">
                                    <span><i class="fa fa-star"></i></span>
                                    <h3 class="visible-title">5 Star Rating</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div  class="no-padding" style="width:100%;margin-bottom: -5px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7438.906951197761!2d72.77224493252278!3d21.21385909032098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04c41f49e790b%3A0xc794ddaa38573360!2sBhakti+Dharm+Township!5e0!3m2!1sen!2sin!4v1549383934402" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>  
    </section>   
 
