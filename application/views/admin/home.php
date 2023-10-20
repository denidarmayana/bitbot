<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header border-0">
				<div>
					<h4 class="heading mb-0">Members Today</h4>

				</div>	
				<span class="float-end"><?=$count ?> Members</span>
			</div>
			<div class="card-body">
				<ul class="country-sale dz-scroll">
					<?php
					foreach ($new as $key) { ?>
					<li class="d-flex">
						<div class="country-flag">
						  <img src="<?=base_url('assets/') ?>images/icon.png" alt="BitBot">
						</div>
						<div class="d-flex flex-wrap align-items-center justify-content-between w-100">
						  <div class="ms-2">
							<h6 class="mb-0"><?=$key->username ?></h6>
							<small><?=$key->email ?></small>
						  </div>
							<span class="badge badge-success  border-0 ms-2"><?=$key->created_at ?></span>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header border-0">
				<div>
					<h4 class="heading mb-0">Withdrawal Today</h4>
				</div>	
			</div>
			<div class="card-body">
				<ul class="country-sale dz-scroll">
					<?php
					foreach ($wd as $keys) { ?>
					<li class="d-flex">
						<div class="country-flag">
						  <img src="<?=base_url('assets/') ?>images/icon.png" alt="BitBot">
						</div>
						<div class="d-flex flex-wrap align-items-center justify-content-between w-100">
						  <div class="ms-2">
							<h6 class="mb-0"><?=$keys->members ?></h6>
							<small><?=$keys->amount ?></small>
						  </div>
							<span class="badge badge-success  border-0 ms-2"><?=$keys->coin ?></span>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>