<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<div class="mb-3 row text-center">
	                <div class="col-sm-6 col-6">
	                	<label class="text-center text-info">Coin Trade</label>
	                    <select class="form-control input-rounded" aria-label="Default select example" id="coin">
		                  <option>Select Coin Type</option>
		                  <option>MBIT</option>
		                  <option>ETH</option>
		                  <option>DOGE</option>
		                  <option>TRX</option>
		                  <option>USDT</option>
		                  <option>BTT</option>
		                  <option>BNB</option>
		                </select>
	                </div>
	                <div class="col-sm-6 col-6">
	                    <label class="text-center text-primary">Base Trade</label>
	            		<input type="text" class="form-control input-rounded" id="base_trade" value="0.00000100">
	                </div>
	            </div>
	            <div class="row mb-3 text-center">
	            	<div class="col-sm-12 col-12">
	            		<label class="text-center">Chance</label>
	            		<table width="100%">
	            			<tr>
	            				<td>
	            					<input type="text" class="form-control input-rounded" id="chance_min" value="35">
	            				</td>
	            				<td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
	            				<td>
	            					<input type="text" class="form-control input-rounded" id="chance_max" value="45">
	            				</td>
	            			</tr>
	            		</table>
	            		
	            	</div>
	            </div>
	            <div class="mb-3 row text-center">
	            	
	            	<div class="col-sm-6 col-6">
	            		<label class="text-success">Marti Win</label>
	            		<table width="100%">
	            			<tr>
	            				<td><input type="text" class="form-control input-rounded" id="marti_win" value="100"></td>
	            				<td>&nbsp;&nbsp;%</td>
	            			</tr>

	            		</table>
	            	</div>
	            	<div class="col-sm-6 col-6">
	            		<label class="text-danger">Marti Los</label>
	            		<table width="100%">
	            			<tr>
	            				<td><input type="text" class="form-control input-rounded" id="marti_los" value="100"></td>
	            				<td>&nbsp;&nbsp;%</td>
	            			</tr>

	            		</table>
	            	</div>
	            </div>
	            <div class="mb-3 row text-center">
	            	<div class="col-sm-6 col-6">
	            		<label class="text-success">If Win</label>
	            		<table width="100%">
	            			<tr>
	            				<td><input type="text" class="form-control input-rounded" id="win_reset" value="1"></td>
	            				<td>&nbsp;&nbsp;Reset</td>
	            			</tr>

	            		</table>
	            	</div>
	            	<div class="col-sm-6 col-6">
	            		<label class="text-danger">If Los</label>
	            		<table width="100%">
	            			<tr>
	            				<td><input type="text" class="form-control input-rounded" id="los_reset" value="0"></td>
	            				<td>&nbsp;&nbsp;Reset</td>
	            			</tr>

	            		</table>
	            	</div>
	            </div>
	            <div class="mb-3 row text-center">
	                <div class="col-sm-6 col-6">
	                	<label class="text-center">Shot</label>
	                    <input type="text" class="form-control input-rounded" id="val_shot" value="1.00000000">
	                </div>
	                <div class="col-sm-6 col-6">
	                	<label class="text-center">Boom</label>
	                    <input type="text" class="form-control input-rounded" id="val_boom" value="10.00000000">
	                </div>
	            </div>
	            <div class="mb-3 row text-center">
	            	<div class="col-sm-4 col-4">
	            		<button class="btn btn-primary btn-sm w-100" id="start">START</button>
	            		<button class="btn btn-danger btn-sm w-100" id="stop">STOP</button>
	            	</div>
	            	<div class="col-sm-4 col-4">
	            		<button class="btn btn-success btn-sm w-100" id="shot">SHOT</button>
	            	</div>
	            	<div class="col-sm-4 col-4">
	            		<button class="btn btn-warning btn-sm w-100" id="boom">BOOM</button>
	            	</div>
	            </div>
	            <div class="row mb-3">
	            	<div class="col-12">
	            		<table class="table table-bordered">
	            			<thead>
	            				<tr>
			            			<th class="bg-info text-white text-center">BALANCE</th>
			            			<th class="bg-danger text-white text-center">LOS</th>
			            			<th class="bg-success text-white text-center">WIN</th>
			            			<th class="bg-dark text-white text-center">PROFIT GLOBAL</th>
			            		</tr>	
	            			</thead>
		            		<tbody>
		            			<tr>
		            				<td id="balance" class="text-info text-center">0.00000000</td>
		            				<td id="los" class="text-danger text-center">0</td>
		            				<td id="win" class="text-success text-center">0</td>
		            				<td id="profit_global" class="text-black text-center">0.00000000</td>
		            			</tr>
		            		</tbody>
		            	</table>	
	            	</div>
	            	
	            </div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-body" style="height:250px;overflow: scroll;">
				<table class="table table-bordered" id="tradeTable">
					<thead>
						<tr>
							<th>TYPE</th>
							<th>BASE</th>
							<th>PROFIT</th>
						</tr>
					</thead>
					<tbody id="tradeTable">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>