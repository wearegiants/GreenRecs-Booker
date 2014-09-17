<div class='col-md-6 col-md-offset-3 ' style='padding-top: 40px; margin-bottom: 30px;'>
	<form role="form" id="verifyPatient" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" >
		<?php echo $this->getSubmitFields('verify');?>
	<div class="row" style="margin-bottom:30px;">
	        <div class="col-md-12">
	            <p>* = Required</p>
	        </div>
		<div class="col-md-6">
			<div class="form-group form-group-lg">
			<label for='data[approval_hash]'>Patient's Approval Number*</label>
				<div class="input-group">
					<div class="input-group-addon">#</div> 
					<input type='text' name='data[approval_hash]' class='form-control' placeholder='eg. 4eh432ba' />
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group form-group-lg">
			                <label class="col-md-12  col-xs-12" for="data[dob]">Date of Birth*</label>
			                <div class="col-md-4">
			                            <select name="data[dob-day]" class="form-control" data-error="data[dob-day]">
			                            <?php 
			                                for ($day = 01; $day < 32; $day++) {
			                                    $selected = '';
			                                    if ($day < 10) {
			                                        if ($day == 01) {
			                                            $selected = 'selected';
			                                        }
			                                        $day = 0 . $day;
			                                    }
			                                    echo "<option " . $selected ." value='" . $day . "'>" . $day . "</option>";

			                                }
			                            ?>
			                            </select>
			                        </div>
			                        <div class="col-md-4">
			                            <select name="data[dob-month]" class="form-control col-md-2" data-error="data[dob-month]">
			                                <option selected value="01">January</option>
			                                <option value="02">February</option>
			                                <option value="03">March</option>
			                                <option value="04">April</option>
			                                <option value="05">May</option>
			                                <option value="06">June</option>
			                                <option value="07">July</option>
			                                <option value="08">August</option>
			                                <option value="09">September</option>
			                                <option value="10">October</option>
			                                <option value="11">November</option>
			                                <option value="12">December</option>
			                            </select>
			                        </div>
			                        <div class="col-md-4">
			                            <select name="data[dob-year]" class="form-control col-md-2"  data-error="data[dob-year]">
			                            <?php 
			                            for ($iter = (date('Y') - 18); $iter > 1910; $iter--) {
			                                $selected = '';
			                                if ($iter == (date('Y') - 18)) {
			                                    $selected ="selected";
			                                }
			                                 echo "<option ". $selected ." value='" .  $iter . "'>" . $iter . "</option>";
			                                } 
			                                ?>
			                                
			                            </select>
			                        </div>
			            </div>
			</div>
		</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4 ">
			<input class="btn btn-primary btn-lg custom" data-form-id="verifyPatient" type="submit" value="Verify Patient" />
		</div>
	</div>

	</form>
</div>