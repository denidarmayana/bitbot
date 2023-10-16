<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-12 col-md-4">
      <div class="card info-card customers-card">
          <div class="card-body p-3">
            <div class="form-group row mb-3">
              <div class="col-12">
                <select class="form-select" aria-label="Default select example" id="coin">
                  <option>Select Coin Type</option>
                  <option>MBIT</option>
                  <option>BTC</option>
                  <option>ETH</option>
                  <option>DOGE</option>
                  <option>TRX</option>
                  <option>USDT</option>
                  <option>BTT</option>
                  <option>BNB</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <input type="number" disabled value="0.00000000" class="form-control" id="balance">
              </div>
            </div>
            
          </div>
        </div>
      </div><!-- End Customers Card -->
      <div class="col-12 col-md-8">
      <div class="card info-card customers-card">
          <div class="card-body p-3">
            
            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Deposit</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Withdrawal</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                  <div id="loading">
                    
                  </div>
                  <div class="input-group has-validation">
                    <input type="text" disabled class="form-control" id="address" >
                    <span class="input-group-text" id="copy_address"><i class="bi bi-copy"></i>&nbsp; Copy </span>
                  </div>
                  <center>
                    <img id="qr">
                  </center>
                </div>
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                  
                </div>
                
              </div><!-- End Bordered Tabs -->
            
          </div>
        </div>
      </div><!-- End Customers Card -->
    </div>
</section>