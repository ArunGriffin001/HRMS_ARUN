
    <main>
        <!-- page-title-area start -->
        <div id="top-menu" class="page-title-area d-flex align-items-center">
            <div class="container text-center">
                <div class="page-title">
                    <h2>Pricing Plan</h2>
                        <!-- <div class="breadcrumb-menu">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Pricing Plan</li>
                                </ol>
                              </nav>
                        </div> -->
                </div>
            </div>
        </div>
        <!-- page-title-area start -->
        <!--what-we-do-area start-->
       <!--  <section class="what-do-area-02 service-pd pt-130 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 wow fadeInUp2 animated" data-wow-delay="0.1s">
                        <div class="section-title text-center pr-50 pl-50 mb-80">
                            <h5>What We Do</h5>
                            <h2 class="fsize">Awesome solutions for 
                                digital marketing</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.2s">
                        <div class="do_box do_box_02 grey-bg text-center mb-30">
                            <div class="do_box__icon mb-40">
                                <i class="flaticon-search-engine-optimization-1"></i>
                            </div>
                            <h4>SEO optimizations</h4>
                            <p>Quis autem vel eum reprehen
                                    derit quiea uptate </p>
                            <a href="<?php echo base_url('about'); ?>"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.2s">
                        <div class="do_box do_box_02 grey-bg text-center mb-30">
                            <div class="do_box__icon icon_02 mb-40">
                                <i class="flaticon-marketing"></i>
                            </div>
                            <h4>Media marketing</h4>
                            <p>Quis autem vel eum reprehen
                                    derit quiea uptate </p>
                            <a href="<?php echo base_url('about'); ?>"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.2s">
                        <div class="do_box do_box_02 grey-bg text-center mb-30">
                            <div class="do_box__icon icon_03 mb-40">
                                <i class="flaticon-social-media"></i>
                            </div>
                            <h4>Email marketing</h4>
                            <p>Quis autem vel eum reprehen
                                    derit quiea uptate </p>
                            <a href="<?php echo base_url('about'); ?>"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 wow fadeInUp2 animated" data-wow-delay="0.2s">
                        <div class="do_box do_box_02 grey-bg text-center mb-30">
                            <div class="do_box__icon icon_04 mb-40">
                                <i class="flaticon-bar-chart"></i>
                            </div>
                            <h4>Business strategy</h4>
                            <p>Quis autem vel eum reprehen
                                    derit quiea uptate </p>
                            <a href="<?php echo base_url('about'); ?>"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--what-we-do-area end-->
     

       <!--plan-area start-->
       <section class="plan-area pt-50">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xxl-6 col-xl-8">
                        <div class="section-title section-padding mb-80 text-center text-xl-start">
                            <h2>We provide awesome pricing 
                                plan for application</h2>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4">
                        <div class="dnxte-content-toggle">
                            <div class="dnxte-content-toggle-header">
                                <div class="dnxte-toggle mb-60">
                                    <div class="dnxte-toggle-left">
                                        <div class="dnxte-toggle-head-one">
                                            <label for="dnxte-input-1">Select for monthly</label>
                                        </div>
                                    </div>
                                    <div class="dnxte-toggle-btn">
                                        <label class="dnxte-switch-label"  for="dnxte-input-1">
                                            <input id="dnxte-input-1" class="dnxte-input dnxte-toggle-switch" type="checkbox">
                                            <span class="dnxte-switch-inner"></span>
                                        </label>
                                    </div>
                                    <div class="dnxte-toggle-right">
                                        <div class="dnxte-toggle-head-two">
                                            <label for="dnxte-input-1">yearly</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>
            </div>
            <div class="container dnxte-content-toggle">
                <div class="dnxte-content-toggle-body">
                    <div class="dnxte-content-toggle-front">
                        <div class="row pb-95">
                            <?php
                            if(!empty($plan_data)){
                                foreach ($plan_data as $monthly_rec) {
                                ?>
                                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                                    <div class="plan pos-rel <?php echo( $monthly_rec->is_popular == 'Yes' ? 'active' : ''); ?> text-center mb-30">
                                        <?php
                                        if($monthly_rec->is_popular == 'Yes'){
                                        ?>
                                            <div class="plan__tag">popular</div>
                                        <?php
                                        }
                                        ?>
                                        <div class="pr_head">
                                            <h3><?php echo (!empty($monthly_rec->title) ? $monthly_rec->title : ''); ?></h3>
                                            <h2><sup>$</sup><?php echo (!empty($monthly_rec->monthly_amount) ? $monthly_rec->monthly_amount : ''); ?></h2>
                                            <span><?php echo (!empty($monthly_rec->tag_line) ? $monthly_rec->tag_line : ''); ?></span>
                                        </div>
                                        <div class="pr_body mb-30">
                                            <ul class="pr_list">
                                                <?php echo (!empty($monthly_rec->description) ? $monthly_rec->description : ''); ?>
                                            </ul>
                                        </div>
                                        <div class="pr_footer">
                                            <a href="<?php echo base_url('signup'); ?>" class="theme_btn pr_btn">try this package <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="dnxte-content-toggle-back">
                        <div class="row border-bottom pb-100">
                            <?php
                             if(!empty($plan_data)){
                                foreach ($plan_data as $yearly_rec) {
                                ?>
                                 <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                                    <div class="plan pos-rel <?php echo( $yearly_rec->is_popular == 'Yes' ? 'active' : ''); ?> text-center mb-30">
                                        <?php
                                        if($yearly_rec->is_popular == 'Yes'){
                                            
                                        ?>
                                            <div class="plan__tag">popular</div>
                                        <?php
                                        }
                                        ?>
                                        <div class="pr_head">
                                            <h3><?php echo (!empty($yearly_rec->title) ? $yearly_rec->title : ''); ?></h3>
                                            <h2><sup>$</sup><?php echo (!empty($yearly_rec->yearly_amount   ) ? $yearly_rec->yearly_amount : ''); ?></h2>
                                            <span><?php echo (!empty($yearly_rec->tag_line) ? $yearly_rec->tag_line : ''); ?></span>
                                        </div>
                                        <div class="pr_body mb-30">
                                            <ul class="pr_list">
                                                <?php echo (!empty($yearly_rec->description) ? $yearly_rec->description : ''); ?>
                                            </ul>
                                        </div>
                                        <div class="pr_footer">
                                            <a href="<?php echo base_url('signup'); ?>" class="theme_btn pr_btn">try this package <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--plan-area end-->


       <!-- pricing-packeg-area-start -->
      <!--   <section class="pricing-package-area pricing-border pt-125 pb-100">
            <div class="container">
                <div class="row">
                     <div class="col-xxl-6 offset-xxl-3 wow fadeInUp2" data-wow-delay="0.1s">
                         <div class="section-title text-center green-title section-pd mb-175">
                             <h5>Pricing Package</h5>
                             <h2>We provide awesome <br> 
                                pricing package</h2>
                         </div>
                     </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-10 wow fadeInUp2" data-wow-delay="0.3s">
                        <div class="pricing-wrapper pricing-wrapper-02 text-center mb-30 ml-50">
                            <div class="pricing-type">
                                <h4>Basic plan</h4>
                            </div>
                            <div class="pricing-amount"> 
                             <h2><sup>$</sup>19.95<sub>monthly</sub></h2>
                            </div>
                            <div class="pricing-icon mt-35 mb-50">
                                <img src="<?php echo base_url('template/'); ?>web/assets/img/icon/19.png" alt="">
                            </div>
                            <div class="pricing-btn mb-25">
                             <a href="<?php echo base_url('signup'); ?>" class="theme_btn theme_btn_bg btn-grey-bg">try this package <i class="fas fa-chevron-right"></i></a>
                            </div>
                            <div class="pricing-content">
                                <p>But must explain how this mistaken 
                                 idea denouncing pleasurepraising pain 
                                 was born give complete</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-10 col-ordered wow fadeInUp2" data-wow-delay="0.5s">
                        <div class="pricing-wrapper pos-rel active text-center mb-30 mt-0">
                            <div class="pl-tag"><span class="pl-meta">popular</span></div>
                            <div class="pricing-type">
                                <h4>Regular plan</h4>
                            </div>
                            <div class="pricing-amount">
                             <h2><sup>$</sup>29.95<sub>monthly</sub></h2>
                            </div>
                            <div class="pricing-icon mt-35 mb-70">
                                <img src="<?php echo base_url('template/'); ?>web/assets/img/icon/20.png" alt="">
                            </div>
                            <div class="pricing-btn mb-25">
                             <a href="<?php echo base_url('signup'); ?>" class="theme_btn theme_btn_bg btn-grey-bg">try this package <i class="fas fa-chevron-right"></i></a>
                            </div>
                            <div class="pricing-content">
                                <p>But must explain how this mistaken 
                                 idea denouncing pleasurepraising pain 
                                 was born give complete</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-10 wow fadeInUp2" data-wow-delay="0.7s">
                        <div class="pricing-wrapper pricing-wrapper-02 text-center mb-30 mr-50">
                            <div class="pricing-type">
                                <h4>Gold plan</h4>
                            </div>
                            <div class="pricing-amount">
                             <h2><sup>$</sup>99.95<sub>monthly</sub></h2>
                            </div>
                            <div class="pricing-icon mt-35 mb-50">
                                <img src="<?php echo base_url('template/'); ?>web/assets/img/icon/21.png" alt="">
                            </div>
                            <div class="pricing-btn mb-25">
                             <a href="<?php echo base_url('signup'); ?>" class="theme_btn theme_btn_bg btn-grey-bg">try this package <i class="fas fa-chevron-right"></i></a>
                            </div>
                            <div class="pricing-content">
                                <p>But must explain how this mistaken 
                                 idea denouncing pleasurepraising pain 
                                 was born give complete</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- pricing-packeg-area-end -->

        <!-- subscribe-area-start -->
        <!-- <section class="subscribe-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 wow fadeInUp2  animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp2;">
                        <div class="section-title black-title text-center">
                            <h5>Newsletter Subscriptions</h5>
                            <h2>Get more update to<br>
                                join with us</h2>
                            <div class="foter-subscribe mt-60">
                                <form class="subscribe-form pricing-form" action="https://www.devsnews.com/template/koway/koway/form.php">
                                    <input type="text" placeholder="Email Your Address">
                                    <div class="subs-btn">
                                        <a class="theme_btn theme_btn_bg" href="<?php echo base_url('signup'); ?>">subscribe now <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- subscribe-area-end -->

        
    </main>
