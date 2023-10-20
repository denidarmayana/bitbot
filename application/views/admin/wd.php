<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example" class="display table" style="min-width: 845px">
						<thead>
							<tr>
								<th>No</th>
								<th>Date</th>
								<th>Members</th>
								<th>Coin</th>
								<th>Amount</th>
								<th>Address</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0;
							foreach ($wd as $key) {
								$no++;
								echo "<tr>
								<td>".$no."</td>
								<td>".$key->created_at."</td>
								<td>".$key->members."</td>
								<td>".$key->coin."</td>
								<td>".$key->amount."</td>
								<td>".$key->address."</td>
								<td>".($key->status == 0 ? "Pending":"Success")."</td>
								<td></td>
								</tr>";
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>