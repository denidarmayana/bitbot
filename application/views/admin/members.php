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
								<th>Username</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0;
							foreach ($members as $key) {
								$no++;
								echo "<tr>
								<td>".$no."</td>
								<td>".$key->created_at."</td>
								<td>".$key->username."</td>
								<td>".$key->email."</td>
								</tr>";
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>