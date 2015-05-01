<section class="form-part" id="ContactForm">
    <form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="contact">
    <?php echo $this->getSubmitFields('ContactForm');?>
    <input type="hidden" name="data[redirect_to]" value="<?php echo self::getPageUrl('SymptomForm'); ?>" />
        <div class="col-md-10 col-centered">
            <!-- General Patient Information -->

            <div class="row clearfix">

                <div class="col-md-12">
                    <h2>General Patient Information</h2>
                    <p>* = Required</p>
                </div>

                <div class="col-md-4">
                    <div class="input-group spacer">
                        <label for="data[first_name]">First Name*</label>
                        <input type="text" class="form-control" placeholder="First" name="data[first_name]" data-error="data[first_name]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-md-4">
                    <div class="input-group spacer">
                        <label for="data[last_name]">Last Name*</label>
                        <input type="text" class="form-control" placeholder="Last" name="data[last_name]" data-error="data[last_name]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

            </div>
            <!-- /.row -->

            <div class="row clearfix">

                <div class="col-md-4">
                    <div class="input-group spacer">
                        <label for="data[address]">Address*</label>
                        <input type="text" name="data[address]" class="spacer form-control" placeholder="Street Address" data-error="data[address]">
                        <input type="text" class="form-control spacer" name="data[address2]" placeholder="Apt #/Building # etc." data-error="data[address2]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-md-4">
                    <div class="input-group spacer">
                        <label for="data[city]">City*</label>
                        <input type="text" name="data[city]" class="form-control" placeholder="City Name" data-error="data[city]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for='data[state]'>State*</label>
                    <div class="input-group">
                        <select class="selectpicker" role="menu" name="data[state]" data-error="data[state]">
                          <option selected> CA </option>
                        </select>
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->
                <div class="col-md-4">
                    <div class="input-group">
                        <label for="data[zip]">Zip Code*</label>
                        <input type="text" class="form-control" name="data[zip]" placeholder="55555" data-error="data[zip]">
                    </div>
                    <!-- /input-group -->
                </div>
            </div>

            <div class="row">
                 <!-- Month Buttons-->

                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-12  col-xs-12" for="data[dob]">Date of Birth*</label>

                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="input-group spacer">
                                    <select class="selectpicker" name="data[dob-day]" role="menu" data-error="data[dob-day]">
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
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-3 -->

                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="input-group spacer">
                                    <select class="selectpicker" name="data[dob-month]" role="menu" data-error="data[dob-month]">
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
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-3 -->

                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="input-group spacer">
                                    <select class="selectpicker" name="data[dob-year]"  role="menu" data-error="data[dob-year]">
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
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-3 -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col-lg-3 -->
            </div>

            <div class="row spacer">

                <div class="col-md-4">
                    <div class="input-group">
                        <label for="data[email]">Email*</label>
                        <input type="email" class="form-control" name="data[email]" placeholder="email@emailprovider.com" data-error="data[email]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-md-4">
                    <div class="input-group">
                        <label for="data[phone]">Phone*</label>
                        <input type="text" name="data[phone]" class="form-control" placeholder="888-555-5555" data-error="data[phone]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

            </div>
            <!-- Email, Phone -->

            <div class="row clearfix">

                <div class="col-md-12 spacer">
                    <span class="input-group-title">Emergency Contact</span>
                </div>

                <div class="col-md-4">
                    <div class="input-group spacer">
                        <label for="data[emr_name]">Name*</label>
                        <input type="text" name="data[emr_name]" class="form-control" data-error="data[emr_name]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-md-4">
                    <div class="input-group spacer">
                        <label for="data[emr_relation]">Relationship*</label>
                        <input type="text" name="data[emr_relation]" class="form-control" data-error="data[emr_rel]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-md-4">
                    <div class="input-group spacer">
                        <label for="data[emr_phone]">Phone*</label>
                        <input type="text" name="data[emr_phone]" class="form-control" data-error="data[emr_phone]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

            </div>
            <!-- Emergency Contact -->

            <div class="row questions nonlist clearfix">
                <div class="col-md-6 spacer">
                    <label for="data[cal_id]" class="input-group-title">Do you have a valid Calfornia ID?*</label>
                    </br>
                    <div class="btn-group" data-error="data[cal_id]">
                        <label for="data[cal_id]" class="radio-inline">
                            <input type="radio" name="data[cal_id]" value="1">Yes
                        </label>
                        <label for="data[cal_id]" class="radio-inline">
                            <input type="radio" name="data[cal_id]" value="0">No
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Please provide a valid form of California identification. Please choose an acceptable form of identification from thetypes listed below. We do not accept birth certificates.*</p>
                </div>
                <ul class="col-md-6">
                    <li>Valid California ID (DMV issued California driver’s license or Identification card)</li>
                    <li>Valid Passport</li>
                    <li>Out of State ID with proof of California residency (utility bill, lease, car or voter registration</li>
                    <li>Valid Passport or Out of State ID with temporary DMV form</li>
                </ul>
                <ul class="col-md-6">
                    <li>Valid Government-issued ID</li>
                    <li>Valid Resident Card for California</li>
                    <li>Temporary DMV form with any photo ID</li>
                    <li>Military Card with proof of residency</li>
                    <li>Any “other” ID must be Government issued</li>
                </ul>
            </div>
            <!-- Do you have a California id? -->
        </div>
        <div class="text-center col-md-12 spacer"> 
          <input class="btn btn-primary btn-lg custom" data-form-id="contact" type="submit" value="Next" />
        </div>
    </form>
</section>
