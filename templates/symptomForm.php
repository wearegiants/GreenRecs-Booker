<form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="symptoms">
<?php echo $this->getSubmitFields('SymptomForm');?>
<input type="hidden" name="data[redirect_to]" value="<?php echo self::getPageUrl('LegalForm'); ?>" />
<div class="col-md-10 col-centered">
  <div class="row">

    <div class="col-md-12">
      <h2>Tell us why you're here</h2>
      <p>* = Required</p>
    </div>
    
    <div class="clearfix"></div>
    
    <ul class="questions">
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_bool]"><p>
            <strong>Do you have a medical condition that could benefit from the use of cannabis?</strong>
            (Cancer, migraines, chronic pain, nausea, insomnia, low appetite, etc..) <a href="#">View full list 
            of conditions</a>*
          </p>
          </label>
          <div class="" data-error="data[can_sympt_bool]">
            <label for="data[can_sympt_bool]" class="radio-inline">
              <input type="radio" name="data[can_sympt_bool]" value="1"> Yes
            </label>
            <label for="data[can_sympt_bool]"  class="radio-inline">
              <input type="radio" name="data[can_sympt_bool]" value="0"> No
            </label>
          </div>
        </div>
      </li><!-- Question 1 -->
      
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_condition]">
          <p>
            <strong>What is the condition that you are seeking a physician’s medical marijuana recommendation?</strong>
          </p>
          </label>
          <div class="row">
            <div class="col-md-4">
              <input type="text" name="data[can_sympt_condition]" class="form-control" placeholder="Condition" data-error="data[can_sympt_condition]">
            </div>
          </div>
        </div>
      </li><!-- Question 2 -->
      
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_diag_bool]"><p>
            <strong> Have you been previously diagnosed for your condition "in person" by a licensed California medical physician?*</strong>
            <small>You must have been previously diagnosed "in person" by a licensed medical physician to be eligible to use the GreenRecs service.</small>
          </p>
          </label>
          <div class="" data-error="data[can_sympt_diag_bool]" >
            <label for="data[can_sympt_diag_bool]"class="radio-inline">
              <input type="radio" name="data[can_sympt_diag_bool]" value="1"> Yes
            </label>
            <label for="data[can_sympt_diag_bool]"  class="radio-inline">
              <input type="radio" name="data[can_sympt_diag_bool]" value="0"> No
            </label>
          </div>
          <div class="checkbox">
            <label><input name="data[privacy]" type="checkbox" value="1">I acknowledge here that the initial examination for the condition in which I am seeking a medical marijuana recommendation was in-person and performed by a licensed medical physician.</label>
          </div>
        </div>
      </li><!-- Question 3 -->
      
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_start_time]"><p>
            <strong>When did this problem or condition start?</strong>
          </p>
          </label>
          <div class="" data-error="data[can_sympt_start_time]">
            <label for="data[can_sympt_start_time]" class="radio-inline">
              <input type="radio" name="data[can_sympt_start_time]" value="1 month"> 1-6 months
            </label>
            <label for="data[can_sympt_start_time]" class="radio-inline">
              <input type="radio" name="data[can_sympt_start_time]" value="6 months - 1 Year">  6 months - 1 Year
            </label>
            <label for="data[can_sympt_start_time]" class="radio-inline">
              <input type="radio" name="data[can_sympt_start_time]" value="1-5 Years"> 1-5 Years
            </label>
            <label for="data[can_sympt_start_time]" class="radio-inline">
              <input type="radio" name="data[can_sympt_start_time]" value="5-10 Years"> 5-10 Years
            </label>
            <!--
            <label for="data[can_sympt_start_time]" class="radio-inline">
              <input type="radio" name="data[can_sympt_start_time]" value="5-10 years"> 5-10 Years
            </label>
            -->
          </div>
        </div>
      </li><!-- Question 4 -->
      
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_treat][]" >Check the appropriate boxes for treatments that you have sought in treating your problem:*</label>
          <div class="row" data-error="data[can_sympt_treat][]">
            <div class=" col-md-6">
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input type="checkbox" name="data[can_sympt_treat][]" value="Oral Medications">Oral Medications</label>
              </div>
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input type="checkbox" name="data[can_sympt_treat][]" value="Surgery">Surgery</label>
              </div>
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input type="checkbox" name="data[can_sympt_treat][]" value="Therapeutic Remedies (Yoga, Meditation, etc…)">Therapeutic Remedies (Yoga, Meditation, etc…)</label>
              </div>
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input type="checkbox" name="data[can_sympt_treat][]" value="Physical Therapy">Physical Therapy</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input type="checkbox" name="data[can_sympt_treat][]" value="Holistic Remedies (vitamins, herbs, etc…)">Holistic Remedies (vitamins, herbs, etc…)</label>
              </div>
              <!--
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input type="checkbox" name="data[can_sympt_treat][]" value="Chiropractic Care">Chiropractic Care</label>
              </div>
              --> 
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input type="checkbox" name="data[can_sympt_treat][]" value="Acupuncture">Acupuncture</label>
              </div>
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input type="checkbox" name="data[can_sympt_treat][]" value="Counseling/Therapy">Counseling/Therapy</label>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
              <div class="checkbox">
                <label for="data[can_sympt_treat][]"><input id="othercheckbox" type="checkbox" name="data[can_sympt_treat][]" value="Other">Other</label>
              </div>
              <input type="text" data-error="data[can_sympt_treat_other]" name="data[can_sympt_treat_other]" class="form-control">
            </div>
          </div>
        </div>
      </li><!-- Question 5 -->
      
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_med]">
          <p>
            <strong>Over-the-Counter and Herbal Medications:</strong>
            List products that you currently use or have used in the past for the 
            condition that you are seeking cannabis to manage. (i.e: ibuprofen, aspirin, vicodin, sleeping pills, milk thistle, etc...)
          </p>
          </label>
          <div class="row input-group">
            <div class="col-md-12">
              <input type="text" data-error="data[can_sympt_med]" name="data[can_sympt_med]" class="form-control">
            </div>
          </div>
        </div>
      </li><!-- Question 6 -->
      
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_doc_time]">
          <p>
            <strong>When did you last see your doctor or a specialist about your condition or complaint?</strong>
          </p>
          </label>
          <div class="btn-group" data-error="data[can_sympt_doc_time]">
           <label class="radio-inline">
              <input type="radio" name="data[can_sympt_doc_time]" value="< 1 month"> &lt; 1 Month
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[can_sympt_doc_time]" value="1 month"> 1 Month
            </label>
            <label for="data[can_sympt_start_time]" class="radio-inline">
              <input type="radio" name="data[can_sympt_start_time]" value="6 months - 1 Year">  6 months - 1 Year
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[can_sympt_doc_time]" value="1 year"> 1 Year
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[can_sympt_doc_time]" value="1-3 years"> 1-3 Years
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[can_sympt_doc_time]" value="3-5 years"> 3-5 Years
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[can_sympt_doc_time]" value="5-10 years"> 5-10 Years
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[can_sympt_doc_time]" value="10+ years"> 5-10 Years
            </label>
          </div>
        </div>
      </li><!-- Question 7 -->
      
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_prim_care]">
          <p>
            <strong>Do you have the name and contact information for your 
            primary care physician or the doctor that diagnosed your condition?</strong>
          </p>
          </label>
          <input type="text" data-error="data[can_sympt_prim_care]" name="data[can_sympt_prim_care]" class="form-control" />
        </div>
      </li><!-- Question 8 -->
      
      <li>
        <div class="col-md-12">
          <label for="data[can_sympt_prim_care_bool]">
          <p>
            <strong>Can you provide any medical documentation to support your diagnosis?</strong>
            <!--
            (x-rays, MRI’s, physician letters, diagnosis or any other documentation 
            showing that you have been to a doctor and have been diagnosed with your condition.)*
            -->
            (X-rays, MRI’s, physician’s letter or any other paperwork verifying your diagnosis)
          </p>
          </label>
          <div class="btn-group" data-error="data[can_sympt_prim_care_bool]">
            <label class="radio-inline">
              <input type="radio" name="data[can_sympt_prim_care_bool]" value="1"> Yes
            </label>
            <label class="radio-inline" >
              <input type="radio" name="data[can_sympt_prim_care_bool]" value="0"> No
            </label>
          </div>
        </div>
      </li><!-- Question 9 -->
      
      <!--<li>
        <div class="col-md-12">
          <label for="data[privacy]">
          <p>
            <strong>Have you read our privacy policy?*</strong> 
            <a target="_blank" href="/app/themes/GreenRecs/privacypolicy.pdf">View PRIVACY POLICY</a>
          </p>
          </label>
          <div class="checkbox" data-error="data[privacy]">
            <label><input name="data[privacy]" type="checkbox" value="1">I acknowledge here that the initial examination for the condition in which I am seeking a medical marijuana recommendation was in-person and performed by a licensed medical physician.</label>
          </div>
        </div>
      </li>-->
      
      <li>
        <div class="col-md-12">
          <label for="data[pain_area_img]">
          <p>
            <strong>If you are seeking medical marijuana to manage pain, please clarify by marking an “X” in the appropriate area(s).</strong> 
          </p>
          </label>
          <div class="btn-group" data-error="data[pain_area_img]">
          <div class="row spacer">
            <label class="radio-inline">
              <input type="radio" name="data[pain_area_img]" value="front"> Front
              <img src="http://placehold.it/140&text=Front+image" />
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[pain_area_img]" value="back"> Back
              <img src="http://placehold.it/140&text=Back+image" />
            </label>
          </div> 
          <div class="row spacer">
            <label class="radio-inline">
              <input type="radio" name="data[pain_area_img]" value="right"> Right
              <img src="http://placehold.it/140&text=Right+image" />
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[pain_area_img]" value="left"> Left
              <img src="http://placehold.it/140&text=Left+image" />
            </label>
          </div>
          </div>
        </div>
      </li><!-- Question 11 -->
      
    </ul>
    <div class="row spacer"></div>
    <div class="text-center col-md-12 spacer"> 
        <input class="btn btn-primary btn-lg custom" data-form-id="symptoms" type="submit" value="Next" />
    </div>

  </div>
</div>

</form>
