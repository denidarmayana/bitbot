<div class="row">
  <div class="col-xl-6">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="any-card">
          <div class="c-con">
            <h4 class="heading mb-0">Welcone <strong><?=$this->session->userdata('username') ?>!!</strong><img src="<?=base_url('assets/') ?>images/crm/party-popper.png" alt=""></h4>
            <span></span>
            <p class="mt-3">BitBot is a platform that you can use to make profits easily and quickly</p>
             
            <a href="#" class="btn btn-primary btn-sm">View Profile</a>
          </div>
          <img src="<?=base_url('assets/') ?>images/analytics/developer_male.png" class="harry-img" alt="">
          
        </div>  
      </div>
    </div>
  </div>
  <div class="col-xl-6">
    <div class="card overflow-hidden">
      <div class="text-center p-5 overlay-box" style="background-image: url(images/big/img5.jpg);">
        <img src="<?=base_url('assets/') ?>images/profile/profile.png" width="100" class="img-fluid rounded-circle" alt="">
        <h3 class="mt-3 mb-0 text-white"><?=$this->session->userdata('username') ?></h3>
      </div>
                    <div class="card-body">
        <div class="row text-center">
          <div class="col-6">
            <div class="bgl-primary rounded p-3">
              <h4 class="mb-0">Email</h4>
              <small><?=$user->email ?></small>
            </div>
          </div>
          <div class="col-6">
            <div class="bgl-primary rounded p-3">
              <h4 class="mb-0">Last Login</h4>
              <small><?=$login->last_login ?></small>
            </div>
          </div>
        </div>
                    </div>
      <div class="card-footer mt-0">                
        <button class="btn btn-primary btn-lg btn-block">Share Link Reff</button>   
                    </div>
                </div>
  </div>
  
</div>