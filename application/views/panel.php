
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.w3itexpert.com/xhtml/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Oct 2023 13:48:34 GMT -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- PAGE TITLE HERE -->
	<title>Admin Panel | BitBot Crypoto Trading Bot</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?=base_url('assets/') ?>images/icon.png">
	<link rel="stylesheet" href="<?=base_url('assets/') ?>vendor/toastr/css/toastr.min.css?=<?=time() ?>">
	<link href="<?=base_url('assets/') ?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css?=<?=time() ?>" rel="stylesheet">
	<link href="<?=base_url('assets/') ?>vendor/swiper/css/swiper-bundle.min.css?=<?=time() ?>" rel="stylesheet">
	<link href="<?=base_url('assets/') ?>vendor/swiper/css/swiper-bundle.min.css?=<?=time() ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('assets/') ?>cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css?=<?=time() ?>">
	<link href="<?=base_url('assets/') ?>vendor/datatables/css/jquery.dataTables.min.css?=<?=time() ?>" rel="stylesheet">
	<link href="<?=base_url('assets/') ?>cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css?=<?=time() ?>" rel="stylesheet">
	<link href="<?=base_url('assets/') ?>vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css?=<?=time() ?>" rel="stylesheet">
	
	<!-- tagify-css -->
	<link href="<?=base_url('assets/') ?>vendor/tagify/dist/tagify.css?=<?=time() ?>" rel="stylesheet">
	<link href="<?=base_url('assets/') ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<!-- Style css -->
    <link href="<?=base_url('assets/') ?>css/style.css?=<?=time() ?>" rel="stylesheet">
	
</head>
<body data-typography="poppins" data-theme-version="dark">
	<!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div>
			<img src="<?=base_url('assets/') ?>images/icon.png" alt=""> 
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?=base_url() ?>" class="brand-logo">
				<img src="<?=base_url('assets/') ?>images/icon_home.png" alt="" class="width-230 dark-logo">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line">
						<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.7468 5.58925C11.0722 5.26381 11.0722 4.73617 10.7468 4.41073C10.4213 4.0853 9.89369 4.0853 9.56826 4.41073L4.56826 9.41073C4.25277 9.72622 4.24174 10.2342 4.54322 10.5631L9.12655 15.5631C9.43754 15.9024 9.96468 15.9253 10.3039 15.6143C10.6432 15.3033 10.6661 14.7762 10.3551 14.4369L6.31096 10.0251L10.7468 5.58925Z" fill="#452B90"/>
							<path opacity="0.3" d="M16.5801 5.58924C16.9056 5.26381 16.9056 4.73617 16.5801 4.41073C16.2547 4.0853 15.727 4.0853 15.4016 4.41073L10.4016 9.41073C10.0861 9.72622 10.0751 10.2342 10.3766 10.5631L14.9599 15.5631C15.2709 15.9024 15.798 15.9253 16.1373 15.6143C16.4766 15.3033 16.4995 14.7762 16.1885 14.4369L12.1443 10.0251L16.5801 5.58924Z" fill="#452B90"/>
						</svg>
					</span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		
		
		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
                                Panel Admin
                            </div>
						</div>
                        <div class="header-right d-flex align-items-center">
							
							<ul class="navbar-nav">
								
								<li class="nav-item ps-3">
									<div class="dropdown header-profile2">
										<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											<div class="header-info2 d-flex align-items-center">
												<div class="header-media">
													<img src="<?=base_url('assets/') ?>images/icon.png" alt="">
												</div>
											</div>
										</a>
										<div class="dropdown-menu dropdown-menu-end" style="">
											<div class="card border-0 mb-0">
												<div class="card-header py-2">
													<div class="products">
														<img src="<?=base_url('assets/') ?>images/icon.png" class="avatar avatar-md" alt="">
														<div>
															<h6>Galaxy Seven</h6>
															<span>Administrator</span>	
														</div>	
													</div>
												</div>
												
												<div class="card-footer px-0 py-2">
													<a href="<?=base_url('auth/logout') ?>" class="dropdown-item ai-icon">
														<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
														<span class="ms-2">Logout </span>
													</a>
												</div>
											</div>
											
										</div>
									</div>
								</li>
							</ul>
						</div>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
		<div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li><a href="<?=base_url('panel') ?>" aria-expanded="false">
						<div class="menu-icon">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.13478 20.7733V17.7156C9.13478 16.9351 9.77217 16.3023 10.5584 16.3023H13.4326C13.8102 16.3023 14.1723 16.4512 14.4393 16.7163C14.7063 16.9813 14.8563 17.3408 14.8563 17.7156V20.7733C14.8539 21.0978 14.9821 21.4099 15.2124 21.6402C15.4427 21.8705 15.756 22 16.0829 22H18.0438C18.9596 22.0024 19.8388 21.6428 20.4872 21.0008C21.1356 20.3588 21.5 19.487 21.5 18.5778V9.86686C21.5 9.13246 21.1721 8.43584 20.6046 7.96467L13.934 2.67587C12.7737 1.74856 11.1111 1.7785 9.98539 2.74698L3.46701 7.96467C2.87274 8.42195 2.51755 9.12064 2.5 9.86686V18.5689C2.5 20.4639 4.04738 22 5.95617 22H7.87229C8.55123 22 9.103 21.4562 9.10792 20.7822L9.13478 20.7733Z" fill="#90959F"/>
							</svg>
						</div>	
						<span class="nav-text">Dashboard</span>
						</a>
					</li>
					
					<li><a  href="<?=base_url('panel/members') ?>" aria-expanded="false">
						<div class="menu-icon">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g opacity="0.5">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M15.2428 4.73756C15.2428 6.95855 17.0459 8.75902 19.2702 8.75902C19.5151 8.75782 19.7594 8.73431 20 8.68878V16.6615C20 20.0156 18.0215 22 14.6624 22H7.34636C3.97851 22 2 20.0156 2 16.6615V9.3561C2 6.00195 3.97851 4 7.34636 4H15.3131C15.2659 4.243 15.2423 4.49001 15.2428 4.73756ZM13.15 14.8966L16.0078 11.2088V11.1912C16.2525 10.8625 16.1901 10.3989 15.8671 10.1463C15.7108 10.0257 15.5122 9.97345 15.3167 10.0016C15.1211 10.0297 14.9453 10.1358 14.8295 10.2956L12.4201 13.3951L9.6766 11.2351C9.51997 11.1131 9.32071 11.0592 9.12381 11.0856C8.92691 11.1121 8.74898 11.2166 8.63019 11.3756L5.67562 15.1863C5.57177 15.3158 5.51586 15.4771 5.51734 15.6429C5.5002 15.9781 5.71187 16.2826 6.03238 16.3838C6.35288 16.485 6.70138 16.3573 6.88031 16.0732L9.35125 12.8771L12.0948 15.0283C12.2508 15.1541 12.4514 15.2111 12.6504 15.1863C12.8494 15.1615 13.0297 15.0569 13.15 14.8966Z" fill="white"/>
									<circle opacity="0.4" cx="19.5" cy="4.5" r="2.5" fill="white"/>
									</g>
								</svg>
						</div>	
							<span class="nav-text">Members</span>
						</a>
					</li>
					<li><a  href="<?=base_url('panel/wd') ?>" aria-expanded="false">
						<div class="menu-icon">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g opacity="0.5">
								<path opacity="0.4" d="M11.776 21.8374C9.49292 20.4273 7.37062 18.7645 5.44789 16.8796C4.0905 15.5338 3.05386 13.8905 2.41716 12.0753C1.27953 8.53523 2.60381 4.48948 6.30111 3.2884C8.25262 2.67553 10.375 3.05175 12.007 4.29983C13.6396 3.05315 15.7614 2.67705 17.713 3.2884C21.4103 4.48948 22.7435 8.53523 21.6058 12.0753C20.9743 13.8888 19.9438 15.5319 18.5929 16.8796C16.6684 18.7625 14.5463 20.4251 12.2648 21.8374L12.0159 22L11.776 21.8374Z" fill="white"/>
								<path d="M12.0109 22L11.776 21.8374C9.49013 20.4274 7.36487 18.7647 5.43902 16.8796C4.0752 15.5356 3.03238 13.8922 2.39052 12.0753C1.26177 8.53523 2.58605 4.48948 6.28335 3.2884C8.23486 2.67553 10.3853 3.05204 12.0109 4.31057V22Z" fill="white"/>
								<path d="M18.2304 9.99922C18.0296 9.98629 17.8425 9.8859 17.7131 9.72157C17.5836 9.55723 17.5232 9.3434 17.5459 9.13016C17.5677 8.4278 17.168 7.78851 16.5517 7.53977C16.1609 7.43309 15.9243 7.00987 16.022 6.59249C16.1148 6.18182 16.4993 5.92647 16.8858 6.0189C16.9346 6.027 16.9816 6.04468 17.0244 6.07105C18.2601 6.54658 19.0601 7.82641 18.9965 9.22576C18.9944 9.43785 18.9117 9.63998 18.7673 9.78581C18.6229 9.93164 18.4291 10.0087 18.2304 9.99922Z" fill="white"/>
								</g>
							</svg>
						</div>
							<span class="nav-text">Withdrawal</span>
						</a>
						
					</li>
					
				</ul>
			</div>
        </div>
		
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<?=$contents ?>
			</div>
        </div>
		
        <!--**********************************
            Content body end
        ***********************************-->
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
               <p>Copyright &copy; <?=date("Y") ?> Developed by <a href="https://galaxy7.tech/" target="_blank">Galaxy Sevem</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?=base_url('assets/') ?>vendor/global/global.min.js?=<?=time() ?>"></script>
	<script src="<?=base_url('assets/') ?>vendor/chart.js/Chart.bundle.min.js?=<?=time() ?>"></script>
	<script src="<?=base_url('assets/') ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js?=<?=time() ?>"></script>		
	<script src="<?=base_url('assets/') ?>vendor/bootstrap-datetimepicker/js/moment.js?=<?=time() ?>"></script>
	<script src="<?=base_url('assets/') ?>vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js?=<?=time() ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/bignumber.js@9.0.0/bignumber.min.js"></script>
	<script src="<?=base_url('assets/') ?>vendor/toastr/js/toastr.min.js?=<?=time() ?>"></script>
	<!-- Vectormap -->
    <script src="<?=base_url('assets/') ?>js/custom.js?=<?=time() ?>"></script>
	<script src="<?=base_url('assets/') ?>js/deznav-init.js?=<?=time() ?>"></script>
	<script src="<?=base_url('assets/') ?>js/demo.js?=<?=time() ?>"></script>
	<!-- Datatable -->
    <script src="<?=base_url('assets/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/') ?>js/plugins-init/datatables.init.js"></script>

	<script>
		body.attr('data-theme-version', "dark");
	</script>
</body>
</html>