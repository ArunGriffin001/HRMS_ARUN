<div class="auth">
    <div class="auth_left">
        <div class="card">
            <div class="text-center mb-2">
               <!--  <a class="header-brand" href="#"><i class="fe fe-command brand-logo"></i></a> -->
               <h3>Super Admin Login</h3>
            </div>

            <div class="card-body">
                <div class="card-title">Login to your account</div>
                 <?php
                 if($this->session->flashdata('errorclass') !='')
                 {
                   $error_class = $this->session->flashdata('errorclass');
                  
                  echo'<div class="text-left alert alert-'.$error_class.'">';
                  if(is_array($this->session->flashdata('error_message'))){
                       foreach ($this->session->flashdata('error_message') as $error_message) {
                       ?>
                           <?php echo $error_message.'</br>'; ?>
                   <?php
                       }
                   }else{
                       echo $this->session->flashdata('error_message');
                   }
                   echo '</div>';
                 }
               ?>
                <form method="post" action="<?php echo base_url('login-submit'); ?>" data-parsley-validate="">
                    <!-- <div class="form-group">
                        <select class="custom-select" name="login_type">
                            <option>HR Dashboard</option>
                            <option>Project Dashboard</option>
                            <option>Job Portal</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                    </div>
                    <div class="form-group">
                        <!-- <label class="form-label">Password<a href="#" class="float-right small">I forgot password</a></label> -->
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                    </div>
                   <!--  <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" />
                            <span class="custom-control-label">Remember me</span>
                        </label>
                    </div> -->
                    <div class="form-footer">
                        <button type="submit" name="sign_in" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
            <!-- <div class="text-center text-muted">Don't have account yet? <a href="#">Sign up</a></div> -->
        </div>
    </div>
    <div class="auth_right">
        <div class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo base_url('template/'); ?>/login/assets/images/slider1.svg" class="img-fluid" alt="login page" />
                    <div class="px-4 mt-4">
                        <h4>Fully Responsive</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url('template/'); ?>/login/assets/images/slider2.svg" class="img-fluid" alt="login page" />
                    <div class="px-4 mt-4">
                        <h4>Quality Code and Easy Customizability</h4>
                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url('template/'); ?>/login/assets/images/slider3.svg" class="img-fluid" alt="login page" />
                    <div class="px-4 mt-4">
                        <h4>Cross Browser Compatibility</h4>
                        <p>Overview We're a group of women who want to learn JavaScript.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
