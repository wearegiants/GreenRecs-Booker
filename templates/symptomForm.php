<form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="symptoms">
<?php echo $this->getSubmitFields('Signup');?>
<input type="hidden" name="data[redirect_to]" value="<?php echo self::getPageUrl('LegalForm'); ?>" />
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
            <strong>Do you have a medical condition that could benefit from the use of cannabis?</strong>
            (AIDS, Cancer, Migraines, Glaucoma, Asthma, Chronic Pain, Multiple Sclerosis, Nausea, 
            Insomnia, depression, Anxiety, Anorexia or other serious illnesses) View full list 
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
            <strong>Over-the-Counter and Herbal Medications:</strong>
            List products that you currently use or have used in the past for the 
            condition that you are seeking cannabis to manage. (i.e. ibuprofen, 
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
            <strong>Do you have any medical paperwork to support your diagnosis?</strong>
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
            <label><input name="data[can_sympt_phys_val]" type="checkbox" value="agree">I acknowledge here that the initial examination for the condition in which I am seeking a medical marijuana recommendation was in-person and performed by a licensed medical physician.</label>
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

    <div class="text-center col-md-12 spacer"> 
        <input class="btn btn-primary btn-lg custom" data-form-id="symptoms" type="submit" value="Next" />
    </div>

  </div>
</div>

</form>
