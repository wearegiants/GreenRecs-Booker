<section class="form-part" id="">

	<div class="col-md-8"> 
		<p>
			Thanks for scheduling an appointment, we're reviewing your files and will be sending you an email confirming your appointment date, time and doctor shortly. 
			Please check your spam folder. 
		</p>
		<p>
		<br />
		Payment must be made before your appointment time.<br />
		<?php
		if(isset($_COOKIE['pid'])) {
// Currently this is a sandbox paypal button 
// Where should they return to?
			?>

			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="7MC598YRMX3JG">
				<input type="hidden" name="custom" value="<?php echo $_COOKIE['pid']; ?>">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>

			<?php


		}
		

		?>
		
		</p>
	</div>

</section>