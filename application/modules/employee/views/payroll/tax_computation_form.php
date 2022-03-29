<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="Accounts-Invoices" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tax Computations Form</h3>
                        
                    </div>
                    <div class="card-body">
                        <?php
                        if(!empty($form_16_info)){
                        ?>
                        <a class="btn btn-primary" href="<?php echo base_url();?>uploads/employer/users/form_16/<?php echo $form_16_info->doc_url; ?>" download>Download Tax Computations Form</a>
                        <?php
                        }else{
                            echo '<span>Tax Computations Form not available</span>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>