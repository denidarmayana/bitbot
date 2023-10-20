<div class="row">
	<div class="col-md-4 col-12">
		<div class="card">
			<div class="card-body">
				<div class="form-group row mb-3">
					<select class="form-control input-rounded" id="show_members">
					</select>
				</div>
				<div class="form-group row mb-4">
					<input type="number" placeholder="0" class="form-control input-rounded" id="amount_balance">
				</div>
				
				<div class="form-group row mt-3">
					<button class="btn btn-success w-100 btn-rounded" id="update_deposit">Update Balance</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8 col-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="display table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Date</th>
								<th>Members</th>
								<th>Coin</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0;
							foreach ($depo as $key) {
								$no++;
								echo "<tr>
								<td>".$no."</td>
								<td>".$key->created_at."</td>
								<td>".$key->members."</td>
								<td>".$key->coin."</td>
								<td>".$key->balance."</td>
								</tr>";
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>