<div class="auth">
    <div class="auth_left">
        <div class="card">
            <div class="text-center mb-2">
               <!--  <a class="header-brand" href="#"><i class="fe fe-command brand-logo"></i></a> -->
               <h3>Get free trial</h3>
            </div>

            <div class="card-body">
                <div class="card-title">Signup to your account</div>
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
                <form method="post" action="<?php echo base_url('signup_submit'); ?>" data-parsley-validate="">

                    <div class="form-group">
                      <label for="first_name" class="form-label">First name</label>
                      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter first name" required="" />
                    </div>
                    <div class="form-group">
                      <label for="last_name" class="form-label">Last name</label>
                      <input type="text" name="last_name" class="form-control" id="last_name"  placeholder="Enter last name" required="" />
                    </div>
                    <div class="form-group">
                      <label for="email" class="form-label">email</label>
                      <input type="email" name="email" class="form-control" id="email"  placeholder="Enter email" required="" />
                    </div>
                    <div class="form-group">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="text" name="phone_number" class="form-control" id="phone" data-parsley-type="integer" minlength="10" maxlength="12" placeholder="Enter phone number" required="" />
                    </div>
                    <div class="form-group">
                      <label for="company_name" class="form-label">Company name</label>
                      <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter phone number" required="" />
                    </div>
                    <div class="form-group">
                      <label for="headcount" class="form-label">Company headcount</label>
                      <select class="custom-select form-control" name="head_count" id="headcount" required="">
                        <option value="5-10">5 to 50</option>
                        <option value="51-100">51 to 100</option>
                        <option value="101-500">101 to 500</option>
                        <option value="501-1500">501 to 1500</option>
                        <option value="1501-3000">1501 to 3000</option>
                        <option value="3000">Above 3000</option>
                      </select>
                    </div>
                    <div class="form-footer">
                        <button type="submit" name="sign_in" class="btn btn-primary btn-block">Sign Up</button>
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
