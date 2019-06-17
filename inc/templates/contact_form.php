<form id="Sunset_contactform" class="My-contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php') ;?>">

	<div class="form-group">
		<input type="text" class="form-control sunset-control-form" placeholder="Your Name" id="name" name="name" >
		<small class="text-danger form-control-msg"> Your name is required</small>
	</div>

	<div class="form-group">
		<input type="email" class="form-control sunset-control-form" placeholder="Your Email" id="email" name="email" >
		<small class="text-danger form-control-msg"> Your email is required</small>

	</div>

	<div class="form-group">
		<textarea name="message" id="message" class="form-control sunset-control-form"  placeholder="Your Message"></textarea>
		<small class="text-danger form-control-msg"> Your Message is required</small>

	</div>
    <div class="text-center">
		<button type="stubmit" class="btn btn-lg  btn-default sunset-btn-submit ">Submit</button>
		<small class="text-info form-control-msg js-form-submission"> Submission in process , Please wait ...</small>
		<small class="text-success form-control-msg js-form-success"> Message Successfully Submitted , Thank you !</small>
		<small class="text-danger form-control-msg js-form-error"> There was a problem , Please try again !</small>
    </div>

</form>