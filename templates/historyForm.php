<section class="form-part" id="HistoryForm">
  <form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="history">
    <?php echo $this->getSubmitFields('HistoryForm');?>
    <input type="hidden" name="data[redirect_to]" value="<?php echo self::getPageUrl('CalendarForm'); ?>" />

    <div class="fs-row">
      <div class="fs-cell fs-full-all text-center">
        <h2>Cannabis Use History / Pattern</h2>
        <p>* = Required</p>
      </div>
    </div>

    <ol class="questions">

      <li>
        <div class="fs-cell fs-full-all">
          <label for="data[use_prev_bool]">
            <p><strong>Have you ever you used medical cannabis</strong></p>
          </label>
          <div data-error="data[use_prev_bool]">
            <label class="radio-inline">
              <input  type="radio" name="data[use_prev_bool]" value="1"> Yes
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_prev_bool]" value="0"> No
            </label>
          </div>
        </div>
      </li><!-- Question 1 -->

      <li>
        <div class="fs-cell fs-full-all">
          <label for="data[use_med_bool]">
            <p>
              <strong>If you answered yes to question #1, did you discover that medical cannabis eased your symptoms or pain?</strong>
            </p>
          </label>
          <div class="" data-error="data[use_med_bool]">
            <label class="radio-inline">
              <input type="radio"  name="data[use_med_bool]" value="1"> Yes
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_med_bool]" value="0"> No
            </label>
          </div>
        </div>
      </li><!-- Question 1a -->

<!--
<li>
<div class=" fs-full-all">
<label for="data[use_med_time]">
<p >
<strong>When did you last see your doctor or a specialist about this condition or complaint?</strong>
</p>
</label>
<div class="" data-error="data[use_med_time]">
<label class="radio-inline">
<input type="radio" name="data[use_med_time]" value="1 Times Per Month"> 1x per Month
</label>
<label class="radio-inline">
<input type="radio" name="data[use_med_time]" value="2-3 Times Per Week"> 2-3x per week
</label>
<label class="radio-inline">
<input type="radio" name="data[use_med_time]" value="1 Times Per Day"> 1x per day
</label>
<label class="radio-inline">
<input type="radio" name="data[use_med_time]" value="2 Times Per Day"> 2x per day
</label>
<label class="radio-inline">
<input type="radio" name="data[use_med_time]" value="3 Times Per Day"> 3x per day
</label>
<label class="radio-inline">
<input type="radio" name="data[use_med_time]" value="More"> More
</label>
</div>
</div>
</li>-->
<!-- Question 2 -->


      <li>
        <div class="fs-cell fs-full-all">
          <label for="data[use_consumpt]">
            <p >
              <strong>If you answered yes to question #2, estimate the average of medical cannabis you use per day.</strong>
              (Large joint = 1 gram, 1/8 oz. = 3.5 gm)
            </p>
          </label>
          <div class="spacer" data-error="data[use_consumpt]">
            <label class="radio-inline">
              <input type="radio" data-error="data[use_consumpt]" name="data[use_consumpt]" value="None"> None
            </label>
            <label class="radio-inline">
              <input type="radio" data-error="data[use_consumpt]" name="data[use_consumpt]" value="1-3 grams"> 1-3 grams
            </label>
            <label class="radio-inline">
              <input type="radio" data-error="data[use_consumpt]" name="data[use_consumpt]" value="4-6 grams"> 4-6 grams
            </label>
          </div>
          <div class="fs-row input-group spacer">
            <div class="fs-cell fs-lg-6 fs-md-4 fs-sm-3">
              <label for="data[use_consumpt_other]"><p>Other</p></label>
              <input type="text" data-error="data[use_consumpt_other]" class="form-control" name="data[use_consumpt_other]">
            </div>
          </div>
        </div>
      </li><!-- Question 3 -->

      <li>
        <div class="fs-cell fs-full-all">
          <label for="data[use_change]">
            <p >
              <strong>If currently using medical cannabis, has the amount needed to manage your condition/symptoms changed over time.</strong>
            </p>
          </label>
          <div class="" data-error="data[use_change]">
            <label class="radio-inline">
              <input type="radio"  name="data[use_change]" value="Much More"> Much More
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_change]" value="Little More"> Little More
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_change]" value="About the Same"> About the Same
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_change]" value="Little Less"> Little Less
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_change]" value="Much Less"> Much Less
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_change]" value="Variable"> Variable
            </label>
          </div>
        </div>
      </li><!-- Question 4 -->

      <li>
        <div class="fs-cell fs-full-all">
          <label for="data[use_condition]">
            <p >
              <strong>Please rate the effectiveness of medical cannabis in treating your condition.</strong>
            </p>
          </label>
          <div class="" data-error="data[use_condition]">
            <label class="radio-inline">
              <input type="radio"  name="data[use_condition]" value="Much better (very effective)"> Much better (very effective)
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_condition]" value="Better (effective)"> Better (effective)
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_condition]" value="Slightly better (somewhat effective)"> Slightly better (somewhat effective)
            </label>
          </div>
        </div>
      </li><!-- Question 5 -->

      <li>
        <div class="fs-cell fs-full-all">
          <label for="data[use_quit_bool]">
            <p >
              <strong>Have you ever stopped using medical cannabis only to find that your symptoms have returned or have become worse?</strong>
            </p>
          </label>
          <div class="" data-error="data[use_quit_bool]">
            <label class="radio-inline">
              <input type="radio"  name="data[use_quit_bool]" value="1"> Yes
            </label>
            <label class="radio-inline">
              <input type="radio" name="data[use_quit_bool]" value="0"> No
            </label>
          </div>
        </div>
      </li><!-- Question 5 -->
    </ol>       
  <!--</div>-->

      <div class="text-center fs-cell fs-full-all spacer"> 
        <input class="btn btn-primary btn-lg cta custom" data-form-id="history" type="submit" value="Next" />
        <hr class="invisible">
      </div>
    <!--</div>-->
  </form>
</section>
