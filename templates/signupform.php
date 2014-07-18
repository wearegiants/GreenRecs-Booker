<form role="form" id="patientSignup" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" >
<?php echo $this->getSubmitFields('Signup');?>
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
                                <option selected value="01"> 01</option>
                                <option value="02"> 02</option>
                                <option value="03">03</option>
                                <option value="04">04 </option>
                                <option value="05">05 </option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option> 
                                <option value="26">26</option> 
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
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
                                <option selected value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                 <option value="1964">1964</option>
                                 <option value="1963">1963</option>
                                 <option value="1962">1962</option>
                                 <option value="1961">1961</option>
                                 <option value="1960">1960</option>
                                 <option value="1959">1959</option>
                                 <option value="1958">1958</option>
                                 <option value="1957">1957</option>
                                 <option value="1956">1956</option>
                                 <option value="1955">1955</option>
                                 <option value="1954">1954</option>
                                 <option value="1953">1953</option>
                                 <option value="1952">1952</option>
                                 <option value="1951">1951</option>
                                 <option value="1950">1950</option>
                                 <option value="1949">1949</option>
                                 <option value="1948">1948</option>
                                 <option value="1947">1947</option>
                                 <option value="1946">1946</option>
                                 <option value="1945">1945</option>
                                 <option value="1944">1944</option>
                                 <option value="1943">1943</option>
                                 <option value="1942">1942</option>
                                 <option value="1941">1941</option>
                                 <option value="1940">1940</option>
                                 <option value="1939">1939</option>
                                 <option value="1938">1938</option>
                                 <option value="1937">1937</option>
                                 <option value="1936">1936</option>
                                 <option value="1935">1935</option>
                                 <option value="1934">1934</option>
                                 <option value="1933">1933</option>
                                 <option value="1932">1932</option>
                                 <option value="1931">1931</option>
                                 <option value="1930">1930</option>
                                 <option value="1929">1929</option>
                                 <option value="1928">1928</option>
                                 <option value="1927">1927</option>
                                 <option value="1926">1926</option>
                                 <option value="1925">1925</option>
                                 <option value="1924">1924</option>
                                 <option value="1923">1923</option>
                                 <option value="1922">1922</option>
                                 <option value="1921">1921</option>
                                 <option value="1920">1920</option>
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
                    <input type="radio" name="data[cal_id_bool]" value="false">No
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
            <input type="radio" name="data[can_sympt_bool]" value="false"> No
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
            <input type="radio" name="data[can_sympt_diag_bool]" value="false"> No
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
            <input type="radio" name="data[can_sympt_start_time]" value="1 month"> 1 Month
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
            <input type="radio" name="data[can_sympt_doc_time]" value="1 month"> 1 Month
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
            <input type="radio" name="data[can_sympt_prim_care]" value="false"> No
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
            <input type="radio" name="data[can_sympt_prim_care_bool]" value="false"> No
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
            <input type="radio" name="data[privacy_bool]" value="false"> No
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
            <input type="radio" name="data[pain_area_img]" value=" Left"> Left
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
            <input type="radio" name="data[legal_prob_bool]" value="false"> No
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
            <input type="radio" name="data[legal_can_bool]" value="false"> No
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
            <input type="radio" name="data[use_prev_bool]" value="false"> No
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
            <input type="radio" name="data[use_med_booll]" value="false"> No
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
            <input type="radio" name="data[use_med_time]" value="1 Times Per Month"> 1x per Month
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
            <input type="radio" name="data[use_consumpt]" value="less than 1 gram"> &lt;1 gram
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
            <input type="radio" name="data[use_change]" value="Much More"> Much More
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
            <input type="radio" name="data[use_condition]" value="Slightly better (somewhat effective)"> Slightly better (somewhat effective)
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
            <input type="radio" name="data[use_quit_bool]" value="false"> No
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
