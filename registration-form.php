<?php /* Template Name: RegistrationForm */ ?>
<?php
	if(!isset($_POST['course_name'])):
		header("Location: " . home_url( '/' ));
		exit();
	endif;
	//Redirect to homepage if no course is selected.
?>
<?php get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="main" role="main">
			<div class="jumbotron light-gradient">
				<div class="container">
					<h2 class="no-margin text-center">Register to <i><?php echo $_POST['course_name'];?></i></h2>
				</div>
			</div>
        	<div class="container">
	          	<div class="row">
		            <form id="registration_form" class="wells registration-form form-horizontal" data-toggle="validator" method="POST" action="javascript: sendRegistrationData()">
						<input id="course" type="hidden" name="course" value=<?php echo $_POST['course_name'];?> />
			            <div class="form-group">
			                <label class="control-label col-sm-4">First Name</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
			                        <input name="firstname" id="fname" data-minlength="2" placeholder="First Name" oninput="javascript: hideAlert();" maxlength="50" class="form-control" type="text" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Last Name</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
			                        <input name="lastname" id="lname" data-minlength="2" placeholder="Last Name" maxlength="50" oninput="javascript: hideAlert();" class="form-control" type="text" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Email Address</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			                        <input name="email" id="email" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" placeholder="Email Address" oninput="javascript: hideAlert();" maxlength="64" class="form-control" type="text" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Mobile Number</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
			                        <input name="mobile" id="mobile" placeholder="Mobile Number" pattern="^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$" oninput="javascript: hideAlert();" data-minlength="7" maxlength="20" class="form-control" type="tel" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Telephone Number</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
			                        <input name="telephone" id="telephone" placeholder="Telephone Number" pattern="^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$" oninput="javascript: hideAlert();" data-minlength="7" maxlength="20" class="form-control" type="text" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Billing Address</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
			                        <input name="address" id="address" placeholder="Billing Address" data-minlength="2" maxlength="200" class="form-control" oninput="javascript: hideAlert();" type="text" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Company Name</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
			                        <input name="cname" id="cname" placeholder="Company Name" data-minlength="2" maxlength="64" class="form-control" oninput="javascript: hideAlert();" type="text" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Job Title</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
			                        <input name="job" id="job" placeholder="Job Title" class="form-control" data-minlength="2" maxlength="64" oninput="javascript: hideAlert();" type="text" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Company Address</label>
			                <div class="inputGroupContainer col-sm-5">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
			                        <input name="caddress" id="caddress" placeholder="Company Address" data-minlength="2" maxlength="200" oninput="javascript: hideAlert();" class="form-control" type="text" data-error="Please fill this out" required>
								</div>
								<div class="help-block with-errors"></div>
			                </div>
			            </div>
						<div class="form-group">
							<label class="control-label col-sm-4">Class Date</label>
							<div class="inputGroupContainer col-sm-5">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<select id="date" name="date" class="form-control" data-error="Choose one date" required>
									<?php
									$day_schedule = show_date('course_day_schedule', ' (AM)');
									$night_schedule = show_date('course_night_schedule', ' (PM)');

									if(empty($day_schedule) && empty($night_schedule)):
										echo '<option>No schedule available</option>';
									endif;

									function show_date($id, $title) {
										$schedule = get_post_meta($_POST['course_id'], $id, true);
										if(!empty($schedule)):
											$schedule_filtered = array_filter($schedule, 'blank_filter');
											if(!empty($schedule_filtered)):
												foreach($schedule_filtered as $date):
													echo '<option>'.$date.$title.'</option>';
												endforeach;
											endif;
										endif;
										return $schedule_filtered;
									}
									?>
									</select>
								</div>
							</div>
						</div>
			            <div class="form-group">
			                <label class="control-label col-sm-4">Mode of Payment: <div class="help-block with-errors"></div></label>
			                <span class="radio col-sm-2">
			                    <label><input type="radio" id="mode" name="optradio" data-error="Choose one mode of payment" value="Paypal" required>Paypal</label>
			                </span>
			                <span class="radio col-sm-4">
			                    <label><input type="radio" id="mode" name="optradio" data-error="Choose one mode of payment" value="Bank Transfer" required>Bank Transfer</label>
			                </span>
			            </div>
						<div class="form-group">
							<div class="container-fluid" >
								<div class="row">
									<div class="col-md-7 col-md-offset-4">
										<div class="g-recaptcha" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback" data-sitekey="<?php echo get_theme_mod('alps_form_recaptcha'); ?>" ></div>
										<input type="hidden" class="form-control" data-recaptcha="true" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="container-fluid" >
								<div class="row">
									<div class="col-md-7 col-md-offset-4">
										<p>By clicking the register button, you agree to our <a href="#modalInquire" data-toggle="modal" data-target="#modalInquire">Terms &amp; Conditions</a></p>
										<button class="button button-primary" id="btnregister" type="submit">Register</button>
									</div>
								</div>
							</div>	
						</div>
					</form>
					<div class="container-fluid" >
					    <div class="row">
					        <div class="col-md-8 col-md-offset-2">
					            <div class="alert alert-success alert-dismissable fade in text-center" role="alert" id="success_message">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					                <strong>Success!</strong> <?php echo get_theme_mod('alps_form_registration_success'); ?>
					            </div>
					        </div>
					  	</div>
					</div><!--.container-fluid-->
	  			</div><!--.row-->
			</div><!--.container-->
			<div class="modal fade" id="modalInquire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header" style="background-color: rgb(204, 0, 0); color:white;">
							<button type="button" class="close"
							data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Terms and Condition
							</h4>
						</div><!--Modal Header-->
						<div class="modal-body">
							<?php $page = get_page_by_title('terms and conditions');
							$content = apply_filters('the_content', $page->post_content);
							echo $content; ?>
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div><!--.modal-->
		</main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer(); ?>
