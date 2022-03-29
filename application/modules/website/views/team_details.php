<main>
    <!-- page-title-area start -->
    <div class="page-title-area d-flex align-items-center">
        <div class="container text-center">
            <div class="page-title">
                <h2>Team Details</h2>
            </div>
        </div>
    </div>
    <!-- page-title-area start -->

    <!-- team-area-start -->
    <section class="feature-area-03 pt-130">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                    <div class="feature_img_03 mb-30">
                        <img class="img-fluid" src="<?php echo base_url('template/'); ?>web/assets/img/team/team-work.jpg" alt="">
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-12">
                    <div class="feature_wrapper_03 mb-30 pl-60">
                        <div class="section-title blue-title text-left mb-45 wow fadeInUp2  animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                            <h5 class="wow fadeInUp2" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">WE OWN THE ORGANIZATION</h5>
                            <h2 class="wow fadeInUp2" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">Our people make all the difference</h2>
                            <p class="mt-30 wow fadeInUp2" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">Sed ut perspiciatis unde omnis natus error luptatem accusantium doloremque laudantium, totam rem apeam, eaque ipsa quae ab illo inventore veritatis et quasi artecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui raluptatem nesciunteque porro quisquam estque</p>
                            <p class="mt-30 wow fadeInUp2" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-area-end -->

    <!-- team-area-start -->
    <section class="team-area pt-125 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3">
                    <div class="section-title text-center mb-70">
                        <h5>Expert Team Member</h5>
                        <h2>Meet experience & successful
                            team member</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                foreach($team_member as $team):
                    $team=json_decode(json_encode($team));
                    $link=json_decode($team->social_links);
                ?>
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                    <div class="team-wrapper text-center mb-30">
                        <div class="team-img mb-40">
                            <img src="<?php echo base_url("uploads/images/team_member/".$team->picture); ?>" alt="<?php echo $team->name?>">
                        </div>
                        <h4><?php echo $team->name?></h4>
                        <h5><?php echo $team->role_name?></h5>
                        <div class="team-social">
                            <a class="facebook" href="<?php echo $link->facebook_link?>"><i class="fab fa-facebook"></i></a>
                            <a href="<?php echo $link->twitter_link?>"><i class="fab fa-twitter-square"></i></a>
                            <a href="<?php echo $link->youtube_link?>"><i class="fab fa-youtube"></i></a>
                            <a href="<?php echo $link->linkedin_link?>"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
    <!-- team-area-end -->
</main>
