<main>
    <!-- page-title-area start -->
    <div class="page-title-area d-flex align-items-center">
        <div class="container text-center">
            <div class="page-title">
                <h2>Blog</h2>
            </div>
        </div>
    </div>
    <!-- page-title-area start -->

    <!-- blog-strandard-area-start -->
    <section class="blog-area blog-strandard-area pt-130 pb-85">
        <div class="container">
            <div class="row gx-xxl-3">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="blog-strandard-content">
                        <?php
                        if(!empty($blog_data)){
                            foreach ($blog_data as $key => $blog_val) {
                            ?>
                            <div class="kblog mb-35">
                                <div class="kblog__img mb-35">
                                    <img class="img-fluid" src="<?php echo base_url('uploads/superadmin/blogs/').$blog_val->blog_img; ?>" alt="">
                                </div>
                                <div class="kblog__content">
                                    <div class="bl-meta mb-10">
                                        <ul>
                                            <li><span><i class="fal fa-user-circle"></i>By <span>David Max</span></span></li>
                                            <li><span><i class="fal fa-calendar-alt"></i>
                                                <?php echo date('d M Y',strtotime($blog_val->created_at)); ?></span></li>
                                        </ul>
                                    </div>
                                    <h4 class="k-blog-title"> <a href="#"><?php echo (!empty($blog_val->title) ? $blog_val->title : ''); ?></a></h4>
                                    <p class="pt-15"><?php echo (!empty($blog_val->description) ? $blog_val->description : ''); ?></p>
                                    <!-- <a href="<?php echo base_url('contact'); ?>" class="theme_btn theme_btn_bg theme-border-btn mt-30">Learn more <i class="fas fa-chevron-right"></i></a> -->
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>                       
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="widget mb-40">
                        <div class="widget-title-box mb-20">
                            <h3 class="widget-title">Search Here</h3>
                        </div>
                        <form class="search-form" action="#">
                            <input type="text" placeholder="Keywords">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                    <div class="widget widget-no-bg mb-40 p-0">
                        <ul class="widget-list">
                            <?php
                            if($blog_cats){
                                foreach ($blog_cats as $key => $cat_val) {
                                ?>
                                <li><a href="#"><?php echo (!empty($cat_val->title) ? $cat_val->title: ''); ?> <span class="float-end"><i class="far fa-chevron-right"></i></span></a></li>
                                <?php
                                }
                            }
                            ?>
                         </ul>
                    </div>

                    <div class="widget widget-02 mb-40">
                        <div class="widget-title-box mb-20">
                            <h3 class="widget-title">Recent News</h3>
                        </div>
                        <ul class="recent-post">
                             <?php
                            if($blog_data){
                                foreach ($blog_data as $key => $blog_val) {
                                ?>
                                <li>
                                    <div class="widget-post-img">
                                        <img src="<?php echo base_url('uploads/superadmin/blogs/').$blog_val->blog_img; ?>" alt="" width="85" height="68">
                                    </div>
                                    <div class="widget-post-body">
                                        <h6 class="widget-post-title"><a href="#"> <?php echo (!empty($blog_val->title) ? $blog_val->title : ''); ?></a></h6>
                                        <div class="widget-post-meta"><i class="far fa-angle-right"></i>By Silva Hola</div>
                                    </div>
                                </li>
                                <?php
                                if($key+1 == 4){
                                    break;
                                }
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="widget widget-gallery grey-bg mb-30">
                        <div class="widget-title-box mb-15">
                            <h3 class="widget-title">Photo Gallery</h3>
                        </div>
                        <ul class="instagram">
                            <li>
                                <a class="insta" href="#">
                                    <img class="img-fluid" src="<?php echo base_url('template/'); ?>web/assets/img/blog/b-14.jpg" alt="">
                                    <span><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li>
                                <a class="insta" href="#">
                                    <img class="img-fluid" src="<?php echo base_url('template/'); ?>web/assets/img/blog/b-15.jpg" alt="">
                                    <span><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li>
                                <a class="insta" href="#">
                                    <img class="img-fluid" src="<?php echo base_url('template/'); ?>web/assets/img/blog/b-16.jpg" alt="">
                                    <span><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li>
                                <a class="insta" href="#">
                                    <img class="img-fluid" src="<?php echo base_url('template/'); ?>web/assets/img/blog/b-17.jpg" alt="">
                                    <span><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li>
                                <a class="insta" href="#">
                                    <img class="img-fluid" src="<?php echo base_url('template/'); ?>web/assets/img/blog/b-18.jpg" alt="">
                                    <span><i class="fab fa-instagram"></i></span>
                                </a>
                            </li>
                            <li>
                                <a class="insta" href="#">
                                    <img class="img-fluid" src="<?php echo base_url('template/'); ?>web/assets/img/blog/b-19.jpg" alt="">
                                    <span><i class="fab fa-instagram"></i></span>
                                </a>
                            </li> 
                        </ul>
                    </div> 

                    <div class="widget widget-tag">
                        <div class="widget-title-box mb-20">
                            <h3 class="widget-title">Popular Tags</h3>
                        </div>
                        <div class="tag">
                            <?php
                            if($blog_tags){
                                foreach ($blog_tags as $key => $tag_val) {
                                ?>
                                 <a href="#"><?php echo (!empty($tag_val->title) ? $tag_val->title: ''); ?></a>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-strandard-area-end -->
</main>
