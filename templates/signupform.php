<form role="form" id="patientSignup" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" >
<?php echo $this->getSubmitFields('Signup');?>
<input type="hidden" name="data[appointment_hash]" value="<?php echo $_COOKIE['appointment_hash']; ?>">
<div class="col-md-10 col-centered">
    <!-- General Patient Information -->

    <div class="row">

        <div class="col-md-12">
            <h2>General Patient Information</h2>
            <p>* = Required</p>
        </div>

        <div class="col-md-4">
            <div class="input-group">
                <label for="data[first_name]">First Name</label>
                <input type="text" class="form-control" placeholder="First" name="data[first_name]" data-error="data[first_name]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-md-4">
            <div class="input-group">
                <label for="data[last_name]">Last Name</label>
                <input type="text" class="form-control" placeholder="Last" name="data[last_name]" data-error="data[last_name]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

        <!-- Month Buttons-->

        <div class="col-md-4">
            <div class="row">
                <label class="col-md-12  col-xs-12" for="data[dob]">Date of Birth</label>

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="input-group">
                        <div class="btn-group date">
                            <select name="data[dob-day]" role="menu" data-error="data[dob-day]">
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
                        <!-- Button Group -->
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="input-group">
                        <div class="btn-group date">
                            <select name="data[dob-month]" role="menu" data-error="data[dob-month]">
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
                        <!-- Button Group -->
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="input-group">
                        <div class="btn-group date">
                            <select name="data[dob-year]"  role="menu" data-error="data[dob-year]">
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
                        <!-- Button Group -->
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.col-lg-3 -->

    </div>
    <!-- /.row -->

    <div class="row">

        <div class="col-md-4">
            <div class="input-group">
                <label>Address*</label>
                <input type="text" name="data[address]" class="form-control" placeholder="Address 1" data-error="data[address]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-md-4">
            <div class="input-group">
                <label>City</label>
                <input type="text" name="data[city]" class="form-control" placeholder="Last" data-error="data[city]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-md-4">
            <div class="row">

                <div class="col-md-4">
                    <div class="input-group">
                        <label>State*</label>
                        <div class="btn-group date">
                            <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <select class="dropdown-menu" role="menu" name="data[state]" data-error="data[state]">
                              <option selected> CA </option>
                            </select>
                        </div>
                        <!-- Button Group -->
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-md-8">
                    <div class="input-group">
                        <label>Zip*</label>
                        <input type="text" class="form-control" name="data[zip]" placeholder="Last" data-error="data[zip]">
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-3 -->

            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" name="data[address2]" placeholder="Address 2" data-error="data[address2]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="input-group">
                <label>Email*</label>
                <input type="text" class="form-control" name="data[email]" placeholder="email@emailprovider.com" data-error="data[email]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-md-4">
            <div class="input-group">
                <label>Phone*</label>
                <input type="text" name="data[phone]" class="form-control" placeholder="888-555-5555" data-error="data[phone]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

    </div>
    <!-- Email, Phone -->

    <div class="row">

        <div class="col-md-12">
            <span class="input-group-title">Emergency Contact</span>
        </div>

        <div class="col-md-4">
            <div class="input-group">
                <label>Name*</label>
                <input type="text" name="data[emr_name]" class="form-control" data-error="data[emr_name]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-md-4">
            <div class="input-group">
                <label>Relationship*</label>
                <input type="text" name="data[emr_rel]" class="form-control" data-error="data[emr_rel]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-md-4">
            <div class="input-group">
                <label>Phone*</label>
                <input type="text" name="data[emr_phone]" class="form-control" data-error="data[emr_phone]">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-3 -->

    </div>
    <!-- Emergency Contact -->

    <div class="row questions nonlist">
        <div class="col-md-6 spacer">
            <span class="input-group-title" data-error="data[cal_id_bool]">Do you have a valid Calfornia ID?*</span>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary">
                    <input type="radio" name="data[cal_id_bool]" value="true">Yes
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="data[cal_id_bool]" value="false" checked>No
                </label>
            </div>
        </div>
        <div class="col-md-12">
            <p>Please provide a valid form of California identification. Please choose an acceptable form of identification from the types listed below. We do not accept birth certificates.*</p>
        </div>
        <ul class="col-md-6">
            <li>Valid California ID (DMV issued California driver’s license or Identification card)</li>
            <li>Valid Passport</li>
            <li>Out of State ID with proof of California residency  (utility bill, lease, car or voter registration</li>
            <li>Valid Passport or Out of State ID with temporary  DMV form</li>
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

<div class="col-md-10 col-centered">
<div class="row">

  <div class="col-md-12">
    <h2>Patient Medical Questions</h2>
    <p>* = Required</p>
  </div>
  
  <div class="clearfix"></div>
  
  <ul class="questions">
    <li>
      <div class="col-md-12">
        <p>
          <strong>Do you have a medical condition that could benefit from the use of cannabis?</strong>
          (AIDS, Cancer, Migraines, Glaucoma, Asthma, Chronic Pain, Multiple Sclerosis, Nausea, 
          Insomnia, depression, Anxiety, Anorexia or other serious illnesses) View full list 
          of conditions
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_bool]" value="false" checked> No
          </label>
        </div>
      </div>
    </li><!-- Question 1 -->
    
    <li>
      <div class="col-md-12">
        <p>
          <strong>What is the condition for which you are seeking a medical marijuana recommendation?</strong>
        </p>
        <div class="row">
          <div class="col-md-4">
            <input type="text" name="data[can_sympt_condition]" class="form-control" placeholder="Condition" data-error="data[can_sympt_condition]">
          </div>
        </div>
      </div>
    </li><!-- Question 2 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[can_sympt_diag_bool]">
          <strong>Have you been previously diagnosed for your condition?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_diag_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_diag_bool]" value="false" checked> No
          </label>
        </div>
      </div>
    </li><!-- Question 3 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[can_sympt_start_time]">
          <strong>When did this problem or condition start?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_start_time]" value="1 month" checked> 1 Month
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_start_time]" value="1 year"> 1 Year
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_start_time]" value="1-3 years"> 1-3 Years
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_start_time]" value="3-5 years"> 3-5 Years
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_start_time]" value="5-10 years"> 5-10 Years
          </label>
        </div>
      </div>
    </li><!-- Question 4 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[can_sympt_treat]" >Check the appropriate boxes for treatments that you have sought in treating your problem:</p>
        <div class="row input-group">
          <div class="col-md-4 col-sm-6">
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Medications">Medications</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Surgery">Surgery</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Therapeutic Injections">Therapeutic injections</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Physical Therapy">Physical Therapy</label>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Osteopathic Care">Osteopathic care </label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Chiropractic Care">Chiropractic Care</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Acupuncture">Acupuncture</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Counseling">Counseling</label>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-3">
            <div class="checkbox">
              <label><input type="checkbox" name="data[can_sympt_treat][]" value="Other">Other</label>
            </div>
            <input type="text" name="data[can_sympt_treat_other]" class="form-control">
          </div>
        </div>
      </div>
    </li><!-- Question 5 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[can_sympt_med]">
          <strong>Over-the-Counter and Herbal Medications:</strong>
          List products that you currently use or have used in the past for the 
          condition that you are seeking cannabis to   manage. (i.e. ibuprofen, 
          aspirin, glucosamine, milk thistle, etc..)
        </p>
        <div class="row input-group">
          <div class="col-md-6">
            <input type="text" name="data[can_sympt_med]" class="form-control">
          </div>
        </div>
      </div>
    </li><!-- Question 6 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[can_sympt_doc_time]">
          <strong>When did you last see your doctor or a specialist about this condition or complaint?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_doc_time]" value="1 month" checked> 1 Month
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_doc_time]" value="1 year"> 1 Year
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_doc_time]" value="1-3 years"> 1-3 Years
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_doc_time]" value="3-5 years"> 3-5 Years
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_doc_time]" value="5-10 years"> 5-10 Years
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_doc_time]" value="10+ years"> 5-10 Years
          </label>
        </div>
      </div>
    </li><!-- Question 7 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[can_sympt_prim_care]">
          <strong>Do you have the name and contact information for your 
          primary care physician or the doctor that diagnosed your condition?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_prim_care]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_prim_care]" value="false" checked> No
          </label>
        </div>
      </div>
    </li><!-- Question 8 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[can_sympt_prim_care_bool]">
          <strong>Do you have any medical paperwork to support your diagnosis?</strong>
          (x-rays, MRI’s, physician letters, diagnosis or any other documentation 
          showing that you have been to a doctor and have been diagnosed with your condition.)
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_prim_care_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[can_sympt_prim_care_bool]" value="false" checked> No
          </label>
        </div>
      </div>
    </li><!-- Question 9 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[can_sympt_phys_val]">
          <strong>When did this problem or condition start?</strong>
        </p>
        <div class="checkbox">
          <label><input name="data[can_sympt_phys_val]" type="checkbox" value="agree">I acknowledge here that the initial examination for the condition in which I am seeking a medical marijuana recommendation was in-person and performed by a licensed medical physician.</label>
        </div>
      </div>
    </li><!-- Question 9a -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[privacy_bool]">
          <strong>Have you read our privacy policy?</strong> 
          <a href="#">View PRIVACY POLICY</a>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[privacy_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[privacy_bool]" value="false" checked> No
          </label>
        </div>
      </div>
    </li><!-- Question 10 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[pain_area_img]">
          <strong>If you are seeking a medical marijuana recommendation to manage pain please clarify by marking an X on the 
            area that hurts the most. </strong> 
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[pain_area_img]" value=" Front"> Front
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[pain_area_img]" value=" Back"> Back
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[pain_area_img]" value=" Right"> Right
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[pain_area_img]" value=" Left" checked> Left
          </label>
        </div>
      </div>
    </li><!-- Question 11 -->
    
  </ul>

</div>
</div>

<div class="col-md-10 col-centered">

<div class="row">
  <div class="col-md-12">
    <h2>Medical Legal Questions</h2>
    <p>* = Required</p>
  </div>
  
  <div class="clearfix"></div>
  
  <ul class="questions">
    <li>
      <div class="col-md-12">
        <p data-error="data[legal_prob_bool]">
          <strong>Are you on probation or parole?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[legal_prob_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[legal_prob_bool]" value="false" checked> No
          </label>
        </div>
        <div class="row input-group">
          <div class="col-md-6">
            If yes, please explain (Case #, County)
            <input type="text" class="form-control" name="data[legal_prob]">
          </div>
        </div>
      </div>
    </li><!-- Question 1 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[legal_can_bool]">
          <strong>Do you have a pending legal cannabis case?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[legal_can_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[legal_can_bool]" value="false" checked> No
          </label>
        </div>
        <div class="row input-group">
          <div class="col-md-6">
            If yes, please explain (Case #, County)
            <input type="text" class="form-control" name="data[legal_can]">
          </div>
        </div>
      </div>
    </li><!-- Question 2 -->
    
  </ul>
  
</div>

</div>

<div class="col-md-10 col-centered">
<div class="row">
  <div class="col-md-12">
    <h2>Cannabis Use History / Pattern</h2>
    <p>* = Required</p>
  </div>
  
  <div class="clearfix"></div>
  
  <ul class="questions">
    
    <li>
      <div class="col-md-12">
        <p data-error="data[use_prev_bool]">
          <strong>Have you used cannabis</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[use_prev_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_prev_bool]" value="false" checked> No
          </label>
        </div>
      </div>
    </li><!-- Question 1 -->
    
    <li>
      <div class="col-md-12">
        <p data-error="data[use_med_bool]">
          <strong>If yes, did you discover that cannabis eased your medical symptoms?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[use_med_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_med_booll]" value="false" checked> No
          </label>
        </div>
      </div>
    </li><!-- Question 1a -->
    
    <li>
      <div class="col-md-12">
        <p>
          <strong>When did you last see your doctor or a specialist about this condition or complaint?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[use_med_time]" value="1 Times Per Month" checked> 1x per Month
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_med_time]" value="2-3 Times Per Week"> 2-3x per week
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_med_time]" value="1 Times Per Day"> 1x per day
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_med_time]" value="2 Times Per Day"> 2x per day
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_med_time]" value="3 Times Per Day"> 3x per day
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_med_time]" value="More"> More
          </label>
        </div>
      </div>
    </li><!-- Question 2 -->
    
    <li>
      <div class="col-md-12">
        <p>
          <strong>Estimate the average amount of cannabis you use per day.</strong>
          (Large joint = 1 gram, 1/8 oz. = 3.5 gm)
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[use_consumpt]" value="less than 1 gram" checked> &lt;1 gram
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_consumpt]" value="1 gram"> 1 gram
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_consumpt]" value="2 gram"> 2 grams
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_consumpt]" value="3 gram"> 3 grams
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_consumpt]" value="4 gram"> 4 grams
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_consumpt]" value="5 gram"> 5 grams
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_consumpt]" value="6 gram"> 6 grams
          </label>
        </div>
        <div class="row input-group">
          <div class="col-md-3">
            <label>Other</label>
            <input type="text" class="form-control" name="data[use_consumpt_other]">
          </div>
        </div>
      </div>
    </li><!-- Question 3 -->
    
    <li>
      <div class="col-md-12">
        <p>
          <strong>Has the amount of cannabis needed to manage your symptoms/condition changed over time?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[use_change]" value="Much More" checked> Much More
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_change]" value="Little More"> Little More
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_change]" value="About the Same"> About the Same
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_change]" value="Little Less"> Little Less
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_change]" value="Much Less"> Much Less
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_change]" value="Variable"> Variable
          </label>
        </div>
      </div>
    </li><!-- Question 4 -->
    
    <li>
      <div class="col-md-12">
        <p>
          <strong>How effective has cannabis been in treating your condition?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[use_condition]" value="Much better (very effective)"> Much better (very effective)
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_condition]" value="Better (effective)"> Better (effective)
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_condition]" value="Slightly better (somewhat effective)" checked> Slightly better (somewhat effective)
          </label>
        </div>
      </div>
    </li><!-- Question 5 -->
    
    <li>
      <div class="col-md-12">
        <p>
          <strong>Have you ever stopped using cannabis only to find that your symptoms have returned or have become worse?</strong>
        </p>
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="data[use_quit_bool]" value="true"> Yes
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="data[use_quit_bool]" value="false" checked> No
          </label>
        </div>
      </div>
    </li><!-- Question 5 -->
    
  </ul>
  
</div>

</div>

<div class="col-md-10 col-centered">

<div class="row">
  
  <div class="col-md-12">
    <h2>Patient Acknowledgements</h2>
    <p>All Required</p>
    <p>Please type your initials to confirm that you acknowledge and confirm the GreenRecs terms and conditions</p>
  </div>
  
  <div class="question col-md-12"><div class="row">
    <div class="input-group">
    <div class="col-md-2"><input type="text" class="form-control" name="data[sign1]"></div>
    <div class="col-md-10"><p>
    I understand that I must be a California State resident to obtain an approval or recommendation for the use of cannabis (medical marijuana) under California’s Compassionate Use Act of 1996 (Health &amp; Safety Code #11362.5).
    </p></div>
    </div>
  </div></div>
  
  <div class="question col-md-12"><div class="row">
    <div class="input-group">
    <div class="col-md-2"><input type="text" class="form-control" name="data[sign2]"></div>
    <div class="col-md-10"><p>
    I have provided an authentic, state or federal issued valid proof of my identity and/or California residency.
    </p></div>
    </div>
  </div></div>
  
  <div class="question col-md-12"><div class="row">
    <div class="input-group">
    <div class="col-md-2"><input type="text" class="form-control" name="data[sign3]"></div>
    <div class="col-md-10"><p>
    I am 18 years of age or older.
    </p></div>
    </div>
  </div></div>
  
  <div class="question col-md-12"><div class="row">
    <div class="input-group">
    <div class="col-md-2"><input type="text" class="form-control" name="data[sign4]"></div>
    <div class="col-md-10"><p>
    I acknowledge that GreenRecs or any and all doctors in the GreenRecs physicians network did
    has not directed, conspired, aid or assisted me (the patient) in obtaining medical marijuana.
    </p></div>
    </div>
  </div></div>
  
  <div class="question col-md-12"><div class="row">
    <div class="input-group">
    <div class="col-md-2"><input type="text" class="form-control" name="data[sign5]"></div>
    <div class="col-md-10"><p>
    Physician Release of Liability - Agreed &amp; Accepted By Patient <br>
    <a href="#">Please read in full. Click here to view.</a>
    </p></div>
    </div>
  </div></div>
  
  <div class="question col-md-12"><div class="row">
    <div class="input-group">
    <div class="col-md-2"><input type="text" class="form-control" name="data[sign6]"></div>
    <div class="col-md-10"><p>
    I have read and accept the GreenRecs terms and conditions in full.<br>
    <a href="#">Please read in full. Click here to view.</a>
    </p></div>
    </div>
  </div></div>
  
  <div class="question col-md-12"><div class="row">
    <div class="input-group">
    <div class="col-md-2"><input type="text" class="form-control" name="data[sign7]"></div>
    <div class="col-md-10"><p>
    I acknowledge that the information provided is true and correct and under the penalty of perjury
    etc...etc... (final verbiage pending)
    </p></div>
    </div>
  </div></div>
      
  <div class="question text-center col-md-12"> 
  <div class="spacer"></div>
  <input class="btn btn-primary btn-lg custom" data-form-id="patientSignup" type="submit" value="Submit" />
  </div>
</div>
</div>
</form>
