<main>
    <!-- page-title-area start -->
    <div id="top-menu" class="page-title-area d-flex align-items-center">
        <div class="container text-center">
            <div class="page-title">
                <h2>Our Testimonials</h2>
            </div>
        </div>
    </div>
    <!-- page-title-area start -->

    <!--testimonial-area start-->
    <section class="testimonial-area-03 pos-rel grey-bg pt-125 pb-125">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3">
                    <div class="section-title text-center pr-20 pl-20 mb-80">
                        <h2>
                            Our customer say about 
                            our support</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-50">
                <?php
                $i = 1;
                if(!empty($record)){
                    foreach ($record as $key => $testimonial_val) {
                        if($i == 4 ){
                            echo'</div>';
                            echo '<div class="row mb-50">';
                        }
                        ?>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 testimonial-item">
                            <div class="text_inner text_inner_02 pos-rel white-bg">
                                <div class="testimonial-author d-flex align-items-center mb-30">
                                    <?php 
                                    $img =  base_url('uploads/superadmin/testimonial/').$testimonial_val->picture;
                                    $img2 =  base_url('template/').'web/assets/img/testimonial/03.png';
                                    ?>
                                    <div class="testimonial-author__img author-testi mr-20">
                                        <img src="<?php echo(!empty($testimonial_val->picture) ? $img : $img2) ?>" alt="" width="75" >
                                    </div>
                                    <div class="testimonial-author__content about-testi">
                                        <h4><?php echo (!empty($testimonial_val->name) ? $testimonial_val->name : ''); ?></h4>
                                        <span class="theme-color"><?php echo (!empty($testimonial_val->role_name) ? $testimonial_val->role_name : ''); ?></span>
                                    </div>
                                </div>
                                <?php echo (!empty($testimonial_val->description) ? $testimonial_val->description : ''); ?>
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