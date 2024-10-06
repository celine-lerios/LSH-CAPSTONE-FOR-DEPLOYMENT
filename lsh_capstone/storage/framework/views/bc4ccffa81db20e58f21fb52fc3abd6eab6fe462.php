<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>Labason Safe Haven</title>        
		
        <link rel="icon" type="image/png" href="<?php echo e(asset('uploads/'.$global_setting_data->favicon)); ?>">

        <?php echo $__env->make('front.layout.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('front.layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

        
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($global_setting_data->analytic_id); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo e($global_setting_data->analytic_id); ?>');
        </script>
        
        <style>
            .main-nav nav .navbar-nav .nav-item a:hover,
            .main-nav nav .navbar-nav .nav-item:hover a,
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .home-feature .inner .icon i,
            .home-rooms .inner .text .price,
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover {
                color: <?php echo e($global_setting_data->theme_color_1); ?>;
            }

            .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover,
            .primary-color {
                color: <?php echo e($global_setting_data->theme_color_1); ?>!important;
            }

            .testimonial-carousel .owl-dots .owl-dot,
            .footer ul.social li a,
            .footer input[type="submit"],
            .scroll-top,
            .room-detail .right .widget .book-now {
                background-color: <?php echo e($global_setting_data->theme_color_1); ?>;
            }

            .slider .text .button a,
            .search-section button[type="submit"],
            .home-rooms .big-button a,
            .bg-website {
                background-color: <?php echo e($global_setting_data->theme_color_1); ?>!important;
            }

            .slider .text .button a,
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .search-section button[type="submit"],
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover,
            .room-detail .amenity .item {
                border-color: <?php echo e($global_setting_data->theme_color_1); ?>!important;
            }

            .home-feature .inner .icon i,
            .room-detail .amenity .item,
            .cart .table-cart tr th {
                background-color: <?php echo e($global_setting_data->theme_color_2); ?>!important;
            }

            .home-rooms .inner .text .button a, .blog-item .inner .text .button a {
                background: <?php echo e($global_setting_data->theme_color_1); ?>;
            }
        </style>

    </head>
    <body>
        
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text"><?php echo e($global_setting_data->top_bar_phone); ?></li>
                            <li class="email-text"><?php echo e($global_setting_data->top_bar_email); ?></li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            <?php if($global_page_data->cart_status === 1): ?>
                            <li class="menu">
                                <a href="<?php echo e(route('cart')); ?>">
                                    <?php echo e($global_page_data->cart_heading); ?>

                                    <?php if(session()->has('cart_room_id')): ?>
                                    <sup class="text-danger"><?php echo e(count(session()->get('cart_room_id'))); ?></sup> 
                                    <?php endif; ?>
                                </a>
                            </li>

                            <?php endif; ?>
                            <?php if($global_page_data->checkout_status === 1): ?>
                            <li class="menu"><a href="<?php echo e(route('checkout')); ?>"><?php echo e($global_page_data->checkout_heading); ?></a></li>
                            <?php endif; ?>

                            <?php if(!Auth::guard('customer')->check()): ?>

                                <?php if($global_page_data->signup_status == 1): ?>
                                <li class="menu"><a href="<?php echo e(route('customer_signup')); ?>"><?php echo e($global_page_data->signup_heading); ?></a></li>
                                <?php endif; ?>

                                <?php if($global_page_data->signin_status == 1): ?>
                                <li class="menu"><a href="<?php echo e(route('customer_login')); ?>"><?php echo e($global_page_data->signin_heading); ?></a></li>
                                <?php endif; ?>

                            <?php else: ?>   

                                <li class="menu"><a href="<?php echo e(route('customer_home')); ?>">Dashboard</a></li>

                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="navbar-area" id="stickymenu">

            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="<?php echo e(route('home')); ?>" class="logo">
                    <img src="<?php echo e(asset('uploads/'.$global_setting_data->logo)); ?>" alt="">
                </a>
            </div>
        
            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(asset('uploads/'.$global_setting_data->logo )); ?>" alt="">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">        
                                <li class="nav-item">
                                    <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
                                </li>

                                <?php if($global_page_data->about_status === 1): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('about')); ?>" class="nav-link"><?php echo e($global_page_data->about_heading); ?></a>
                                </li>
                                <?php endif; ?>

                                <li class="nav-item">
                                    <a href="javascript:void;" class="nav-link dropdown-toggle">Accommodations</a>
                                    <ul class="dropdown-menu">
                                        <?php $__currentLoopData = $global_accommodation_type_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('accommodation_detail',$item->id )); ?>" class="nav-link"><?php echo e($item->name); ?></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                                    <ul class="dropdown-menu">
                                        <?php if($global_page_data->photo_gallery_status === 1): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('photo_gallery')); ?>" class="nav-link">Photo Gallery</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($global_page_data->video_gallery_status === 1): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('video_gallery')); ?>" class="nav-link">Video Gallery</a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <?php if($global_page_data->blog_status == 1): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('blog')); ?>" class="nav-link"><?php echo e($global_page_data->blog_heading); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if($global_page_data->contact_status === 1): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('contact')); ?>" class="nav-link"><?php echo e($global_page_data->contact_heading); ?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>



        <?php echo $__env->yieldContent('main_content'); ?>




        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Site Links</h2>
                            <ul class="useful-links">
                                <li><a href="<?php echo e(route('accommodation_types')); ?>">Accommodation Types</a></li>
                                <?php if($global_page_data->photo_gallery_status === 1): ?>
                                <li><a href="<?php echo e(route('photo_gallery')); ?>">Photo Gallery</a></li>
                                <?php endif; ?>
                                <?php if($global_page_data->video_gallery_status === 1): ?>
                                <li><a href="<?php echo e(route('video_gallery')); ?>">Video Gallery</a></li>
                                <?php endif; ?>
                                <?php if($global_page_data->blog_status === 1): ?>
                                <li><a href="<?php echo e(route('blog')); ?>">Blog</a></li>
                                <?php endif; ?>
                                <?php if($global_page_data->contact_status === 1): ?>
                                <li><a href="<?php echo e(route('contact')); ?>"><?php echo e($global_page_data->contact_heading); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Useful Links</h2>
                            <ul class="useful-links">
                                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                <?php if($global_page_data->terms_status === 1): ?>
                                <li><a href="<?php echo e(route('terms')); ?>">Terms and Conditions</a></li>
                                <?php endif; ?>
                                <?php if($global_page_data->privacy_status === 1): ?>
                                <li><a href="<?php echo e(route('privacy')); ?>">Privacy Policy</a></li>
                                <?php endif; ?>
                                <?php if($global_page_data->faq_status === 1): ?>
                                <li><a href="<?php echo e(route('faq')); ?>">FAQ</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="right">
                                    <?php echo e($global_setting_data->footer_address); ?>

                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-volume-control-phone"></i>
                                </div>
                                <div class="right">
                                    <?php echo e($global_setting_data->footer_email); ?>

                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="right">
                                    <?php echo e($global_setting_data->footer_phone); ?>

                                </div>
                            </div>
                            <ul class="social">
                                <li><a href=""><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                In order to get the latest news and other great opportunities at Labason Safe Haven, please subscribe us here: 
                            </p>
                            <form action="<?php echo e(route('subscriber_send_email')); ?>" method="post" class="form_subscribe_ajax">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright">
            <?php echo e($global_setting_data->copyright); ?>

        </div>
     
        <div class="scroll-top">
            <i class="fa fa-angle-up"></i>
        </div>
        
        <?php echo $__env->make('front.layout.scripts_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script>
            (function($){
                $(".form_subscribe_ajax").on('submit', function(e){
                    e.preventDefault();
                    $('#loader').show();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            $('#loader').hide();
                            if(data.code == 0)
                            {
                                $.each(data.error_message, function(prefix, val) {
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if(data.code == 1)
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }
                            
                        }
                    });
                });
            })(jQuery);
        </script>
        <div id="loader"></div>

        <?php if(session()->get('error')): ?>
        <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '<?php echo e(session()->get('error')); ?>',
        });
        </script>
        <?php endif; ?>
        <?php if(session()->get('success')): ?>
        <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '<?php echo e(session()->get('success')); ?>',
        });
        </script>
        <?php endif; ?>
		
   </body>
</html><?php /**PATH C:\Users\ASUS\OneDrive\Documents\GitHub\LSH-CAPSTONE-FOR-DEPLOYMENT\lsh_capstone\resources\views/front/layout/app.blade.php ENDPATH**/ ?>