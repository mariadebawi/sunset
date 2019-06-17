<form id="Sunset_contactform" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php') ;?>">

	<div class="form-group">
		<input type="text" class="form-control" placeholder="Your Name" id="name" name="name" >
		<small class="text-danger form-control-msg"> Your name is required</small>
	</div>

	<div class="form-group">
		<input type="email" class="form-control" placeholder="Your Email" id="email" name="email" >
		<small class="text-danger form-control-msg"> Your email is required</small>

	</div>

	<div class="form-group">
		<textarea name="message" id="message" class="form-control"  placeholder="Your Message"></textarea>
		<small class="text-danger form-control-msg"> Your Message is required</small>

	</div>

	<button type="stubmit" class="btn btn-default">Submit</button>
	<small class="text-info form-control-msg js-form-submission"> Submission in process , please wait ...</small>
	<small class="text-success form-control-msg js-form-success"> Message Successfully Submitted , thank you !</small>
	<small class="text-danger form-control-msg js-form-error"> There was a problem , please try again !</small>

</form>