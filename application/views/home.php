<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">
          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Link Referral</h5>
              <div class="input-group has-validation">
                  <input type="text" class="form-control" id="link_reff" readonly value="<?=base_url('reff/'.$this->session->userdata("username")) ?>" >
                  <span class="input-group-text" id="copy"><i class="bi bi-copy"></i></span>
              </div>
            </div>
          </div>
        </div><!-- End Customers Card -->
        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">
          <div class="card info-card customers-card">
            <div class="card-body">
              
                <div class="row mt-3">
                  <div class="col-6">
                    <h5 class="card-title">
                      Trading Board
                    </h5>
                  </div>
                  <div class="col-6">
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
              
              <div class="row">
                <div class="col-12">
                  <label for="yourPassword" class="form-label">Balance</label>
                  <input type="number" disabled class="form-control" id="balance" value="0.00000000" >
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Base Trade</label>
                    <input type="number" class="form-control" id="base" value="0.000001" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Chance</label>
                    <input type="number" class="form-control" id="chance" value="35" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Shoot</label>
                    <input type="number" class="form-control" id="shoot" value="1.00000" >
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Boom</label>
                    <input type="number" class="form-control" id="boom" value="10.000000" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Marti Win (%)</label>
                    <input type="number" class="form-control" id="m_win" value="100" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Marti Los (%)</label>
                    <input type="number" class="form-control" id="m_los" value="100" >
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">If Win</label>
                    <input type="number" class="form-control" id="if_win" value="1" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">If Los</label>
                    <input type="number" class="form-control" id="if_los" value="0" >
                  </div>
                </div>
                <div class="col-4">
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Profit Global</label>
                    <input type="number" class="form-control" id="global" value="0" >
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-4">
                  <button class="btn btn-success w-100" id="start">START</button>
                  <button class="btn btn-danger w-100" id="stop" style="display: none;">STOP</button>
                </div>
                <div class="col-4">
                  <button class="btn btn-warning w-100">SHOOT</button>
                </div>
                <div class="col-4">
                  <button class="btn btn-primary w-100">BOOM</button>
                </div>
              </div>
              <div class="row mt-2" style="height: 350px;overflow: scroll;">
                <table class="table table-bordered" id="table-trade" >
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Base</th>
                      <th>Profit</th>
                    </tr>
                  </thead>
                  <tbody id="table-body">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!-- End Customers Card -->
      </div>
    </div><!-- End Left side columns -->
  </div>
</section>