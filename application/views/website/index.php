<div class="row business-info m-0">
	<div class="col-sm-6" style="position:unset">
		<div class="head-para">
			<h4>The Trusted leader for Businesses</h4>
			<h1>#1 Online Company Setup
				Services in India</h1>
			<div class="get-free">
				<h5>Get Free Consultation Now</h5>
				<form action="" class="action-form">
					<div class="action-button-one col-sm-8">
						<input type="text" placeholder="Your Email Address" class="input-style-2">
						<a href="#" class="btn consult">Consult Online <img class="l-arraow" src="<?php echo base_url('assets/image/icon/next.png') ?>" alt="" height="12"> </a></div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-6" style="position:unset">
		<div><img src="<?php echo base_url('assets/image/index/bg2.png') ?>" alt="" height="" width="100%"></div>
	</div>
</div>

<!-- Register, Form, Build
Or Grow your Company in -->

<section class="">
	<div class="container city">
		<div class="row ">
			<div class="col-sm-3 pl-5">
				<h5 class="title-primary">Register, Form, Build Or Grow your Company in</h5>
				<p class="text-danger title-3 ">Trusted by over 10,000 business owners worldwide</p>

			</div>
			<div class="col-sm-9">
				<div class="recent-city">
					<?php if (isset($countries) && count($countries) > 0) {
						for ($i = 0; $i < count($countries); $i++) { ?>
							<div class="card">
								<img src="<?php echo base_url('assets/image/cityimages/india.jpg') ?>" alt="">
								<div class="title"><?php echo $countries[$i]['country_name'] ?></div>
							</div>
					<?php }
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Header End -->

<!-- Our services start -->
<section id="our-services" class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="sub-heading">
				<span class=" py-2 mt-5 what-we-do">What we Do</span>
			</div>
			<h2 class="section-heading-primary">Our Services</h2>

			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<?php if (isset($categories)) {
					for ($i = 0; $i < count($categories); $i++) { ?>
						<li class="nav-item">
							<a class="nav-link <?php echo $i == 0 ? 'active' : '' ?>" id="pills-tab<?php echo $i + 1 ?>" data-toggle="pill" href="#pills-area<?php echo $i + 1 ?>" role="tab" aria-controls="pills<?php echo $i + 1 ?>" aria-selected="<?php echo $i == 0 ? "true" : 'false' ?>">
								<?php echo $categories[$i]['category'] ?>
							</a>
						</li>

				<?php }
				} ?>
			</ul>
			<hr class="divider">

			<div class="tab-content" id="pills-tabContent">
				<?php if (isset($services) && isset($categories)) {
					for ($j = 0; $j < count($categories); $j++) { ?>
						<div class="tab-pane fade <?php echo $j == 0 ? 'show active' : '' ?>" id="pills-area<?php echo $j + 1 ?>" role="tabpanel" aria-labelledby="pills-tab<?php echo $j + 1 ?>">
							<div class="row">
								<?php for ($i = 0; $i < count($services); $i++) {
									if ($categories[$j]['id'] == $services[$i]['category_id']) { ?>
										<div class="col-sm-4">
											<div class="card">
												<a href="<?php echo base_url('ControlUnit/service/') . base64_encode($services[$i]['service_id']) ?>">
													<img class="card-img-top" src="<?php echo base_url('assets/image/services/p1.png') ?>" alt="Card image cap"></a>
												<div class="card-body">
													<h6 class="card-title"><?php echo $services[$i]['service_name'] ?></h6>
													<?php
													$packages = json_decode($services[$i]['packages'], true);
													if ($packages[0]['price'] != 0) { ?>
														<label for="packages">Packages</label>
														<form action="" class="p-form">
															<input type="radio" class="mr-1" name="packages" id="" checked> ₹ <?php echo $packages[0]['price'] ?>
															<input type="radio" class="mr-1" name="packages" id=""> ₹ <?php echo $packages[1]['price'] ?>
															<input type="radio" class="mr-1" name="packages" id=""> ₹ <?php echo $packages[2]['price'] ?>
															<div class="mt-2">
																<small>Prices Inclusive of all taxes</small>
																<a href="<?php echo base_url('ControlUnit/service/') . base64_encode($services[$i]['service_id']) ?>" class="c-btn">Get Started</a>
															</div>
														</form>
													<?php } else { ?>
														<span>Service Price</span>
														<span class="d-block float-right"> ₹ <?php echo $services[$i]['service_price'] ?></span>
														<div class="mt-2">
															<small>Prices Inclusive of all taxes</small>
															<a href="<?php echo base_url('ControlUnit/service/') . base64_encode($services[$i]['serviceId']) ?>" class="c-btn">Get Started</a>
														</div>
													<?php } ?>
												</div>
											</div>
										</div>
								<?php }
								} ?>
							</div>

						</div>
				<?php }
				} ?>

			</div>
		</div>
	</div>
</section>
<!-- Our services end -->

<!-- Counter start -->
<section class="bg-counter d-none">
	<h2 class="text-align-center">Counter</h2>
</section>
<!-- Counter end -->


<!-- Why choose us start -->
<section id="why-choose-us" class="container">
	<div class="row">
		<div class="col-sm-12 py-5">
			<div class="sub-heading">
				<span class="heading-why-us">TRUSTED BY 1200+ ORGANISATIONS IN INDIA</span>
			</div>

			<h2 class="section-heading-primary">Why Choose Us</h2>
		</div>
	</div>
	<div class="row" id="">
		<?php if (isset($featureLabel) && count($featureLabel) > 0) {
			for ($i = 0; $i < count($featureLabel); $i++) { ?>
				<div class="col-sm-4">
					<div class="card">
						<img class="card-img-top" src="<?php echo base_url('assets/image/') . $featureLabel[$i]['image'] ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><?php echo $featureLabel[$i]['label_heading'] . ($i + 1) ?></h5>
							<p class="card-text"><?php echo $featureLabel[$i]['label_description'] ?></p>

						</div>
					</div>
				</div>
		<?php }
		} ?>
	</div>

</section>
<!-- Why choose us end -->


<!-- Our client start -->
<section class="clients-container container">
	<div class="row">
		<div class="col-sm-12">
			<h2 class="section-heading-primary">Our Clients</h2>
		</div>
	</div>
	<div class="row">
		<?php if (isset($clients) && count($clients) > 0) {
			for ($i = 0; $i < count($clients); $i++) { ?>
				<div class="col-sm-3 border-right <?php echo $i < 4 ? 'border-bottom' : '' ?>">
					<img class="border-top-0" src="<?php echo base_url('assets/image/') . $clients[$i]['client_logo'] ?>" alt=""></div>
		<?php }
		} ?>
	</div>

</section>
<!-- Our client end -->


<!-- Our testimonial start -->
<section id="client-review" class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2 class="section-heading-primary">Customer Reviews</h2>
		</div>
	</div>
	<div class="row" id="testimonial">

		<?php if (isset($clients) && count($clients) > 0) {
			for ($i = 0; $i < count($clients); $i++) {
				if (!empty($clients[$i]['head_name'])) { ?>
					<div class="col-sm-3">
						<div class="card">
							<img class="card-img-top" src="<?php echo base_url('assets/image/') . $clients[$i]['head-img'] ?>" alt="Card image cap">
							<div class="card-body">
								<h6 class="card-title"><?php echo $clients[$i]['head_name'] ?></h6>
								<p class=""><?php echo $clients[$i]['designation'] ?></p>

								<p class="card-text"><?php echo $clients[$i]['message'] ?></p>
							</div>
							<div class="mb-2">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
					</div>
		<?php }
			}
		} ?>

	</div>
</section>
<!-- Our testimonial end -->


<!-- start Ready to get started? -->
<section id="contact-us">
	<div class="row">
		<div class="col-sm-12">
			<div class="call-to-action">
				<h2 class="">Ready to get started?</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, dolore.</p>
				<a class="a-btn-primary" data-toggle="modal" data-target="#exampleModal">Book A Free Video Consulation</a>
				<a class="a-btn-secondary" data-toggle="modal" data-target="#exampleModal">Contact Us</a>
			</div>

		</div>
	</div>
</section>
<!-- end Ready to get started? -->

<!-- Contact us form modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Contact US</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url('ControlUnit/contactUs')?>" method="post">
					<div class="md-form mb-5">
						<i class="fa fa-user-o prefix grey-text"></i>
						<input type="text" name="name" class="form-control validate" required placeholder="Your Name">

					</div>
					<div class="md-form mb-5">
						<i class="fa fa-envelope prefix grey-text"></i>
						<input type="email" name="email" class="form-control validate" required placeholder="Email">

					</div>

					<div class="md-form mb-4">
						<i class="fa fa-phone-square prefix grey-text"></i>
						<input type="number" name="phone" class="form-control validate" required placeholder='Phone No.'>

					</div>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-primary">Send</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>