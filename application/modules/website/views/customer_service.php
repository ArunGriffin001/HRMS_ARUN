<main>
    <!-- page-title-area start -->
    <div id="top-menu" class="page-title-area d-flex align-items-center">
        <div class="container text-center">
            <div class="page-title">
                <h2>Customer Experience</h2>
            </div>
        </div>
    </div>
    <!-- page-title-area start -->

    <!--video-area start-->
    <section class="video-area-02 video-pd pt-130 pb-95">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                    <div class="video-wrapper text-center pos-rel mb-30" style="background-image:url(<?php echo base_url('template/'); ?>web/assets/img/team/customer-expe.jpg">
                    </div>
                </div>
                <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6 col-md-12">
                    <div class="feature_wrapper_02 mb-30">
                        <div class="section-title text-left mb-40">
                            <h5>Our Client Experience</h5>
                            <h2>Growth & attractive 
                                your dream plan</h2>
                            <p class="mt-30">But must explain you how all this mistaken idea denouncing 
                                and praising pain was born and complete</p>
                        </div>
                        <ul class="features_list features_list_02 mb-40">
                            <li>Understanding CSS Grid Grid Template Areas</li>
                            <li>Appointments Events WordPress</li>
                        </ul>
                        <a href="<?php echo base_url('contact'); ?>" class="theme_btn theme_btn_bg theme-border-btn wd-70">Get Free Trial <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--video-area end-->

    <!--counter-area start-->
    <section class="counter-area theme-bg pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp2 animated" data-wow-delay=".1s">
                    <div class="counters d-flex align-items-center mb-30">
                        <div class="counters__icon pos-rel mr-25">
                            <i class="flaticon-monitoring"></i>
                        </div>
                        <div class="counters__content">
                            <h2 class="counter">3527</h2>
                            <p>Project Compalte</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp2 animated" data-wow-delay=".2s">
                    <div class="counters d-flex align-items-center mb-30">
                        <div class="counters__icon pos-rel mr-25">
                            <i class="flaticon-bar-chart"></i>
                        </div>
                        <div class="counters__content">
                            <h2><span class="counter">93</span>%</h2>
                            <p>Success History</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp2 animated" data-wow-delay=".3s">
                    <div class="counters d-flex align-items-center mb-30">
                        <div class="counters__icon pos-rel mr-25">
                            <i class="flaticon-trophy"></i>
                        </div>
                        <div class="counters__content">
                            <h2 class="counter">7456</h2>
                            <p>Awards Winning</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp2 animated" data-wow-delay=".4s">
                    <div class="counters d-flex align-items-center mb-30">
                        <div class="counters__icon pos-rel mr-25">
                            <i class="flaticon-technical-support"></i>
                        </div>
                        <div class="counters__content">
                            <h2 class="counter">99.93</h2>
                            <p>Services Rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--counter-area end-->
    <!--testimonial-area start-->
    <section class="testimonial-area-03 pos-rel grey-bg pt-125 pb-125">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3">
                    <div class="section-title text-center pr-20 pl-20 mb-80">
                        <h5>Customer Reviews</h5>
                        <h2>2356+ customer say about 
                            our support</h2>
                    </div>
                </div>
            </div>
            <div class="row testimonial-active-06 mb-90">
                 <?php
                $i = 1;
                if(!empty($record)){
                    foreach ($record as $key => $testimonial_val) {
                        $img =  base_url('uploads/superadmin/testimonial/').$testimonial_val->picture;
                        $img2 =  base_url('template/').'web/assets/img/testimonial/03.png';
                        ?>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 testimonial-item">
                            <div class="text_inner text_inner_02 pos-rel white-bg">
                                <div class="testimonial-author d-flex align-items-center mb-30">
                                    <div class="testimonial-author__img author-testi mr-20">
                                        <img src="<?php echo(!empty($testimonial_val->picture) ? $img : $img2) ?>" alt="" style="width:75px;height:75px;border-radius:100px" >
                                    </div>
                                    <div class="testimonial-author__content about-testi">
                                        <h4><?php echo (!empty($testimonial_val->name) ? $testimonial_val->name : ''); ?></h4>
                                        <span class="theme-color"><?php echo (!empty($testimonial_val->role_name) ? $testimonial_val->role_name : ''); ?></span>
                                    </div>
                                </div>
                                <p> <?php echo (!empty($testimonial_val->description) ? $testimonial_val->description : ''); ?></p>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!--testimonial-area end-->
    
</main>