<section class="form-part" id="HistoryForm">
  <form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="history">
  <?php echo $this->getSubmitFields('HistoryForm');?>
   <input type="hidden" name="data[redirect_to]" value="<?php echo self::getPageUrl('CalendarForm'); ?>" />

    <div class="col-md-10 col-centered">
      <div class="row">
        <div class="col-md-12">
          <h2>Cannabis Use History / Pattern</h2>
          <p>* = Required</p>
        </div>
        
        <div class="clearfix"></div>
        
        <ol class="questions">
          
          <li>
            <div class="col-md-12">
               <label for="data[use_prev_bool]">
                <p><strong>Have you used cannabis</strong></p>
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
            <div class="col-md-12">
              <label for="data[use_med_bool]">
                <p >
                  <strong>If yes, did you discover that cannabis eased your medical symptoms?</strong>
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
          
          <li>
            <div class="col-md-12">
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
          </li><!-- Question 2 -->
          
          <li>
            <div class="col-md-12">
              <label for="data[use_consumpt]">
                <p >
                  <strong>Estimate the average amount of cannabis you use per day.</strong>
                  (Large joint = 1 gram, 1/8 oz. = 3.5 gm)
                </p>
              </label>
              <div class="spacer" data-error="data[use_consumpt]">
                <label class="radio-inline">
                  <input type="radio" name="data[use_consumpt]" value="less than 1 gram"> &lt;1 gram
                </label>
                <label class="radio-inline">
                  <input type="radio" name="data[use_consumpt]" value="1 gram"> 1 gram
                </label>
                <label class="radio-inline">
                  <input type="radio" name="data[use_consumpt]" value="2 gram"> 2 grams
                </label>
                <label class="radio-inline">
                  <input type="radio" name="data[use_consumpt]" value="3 gram"> 3 grams
                </label>
                <label class="radio-inline">
                  <input type="radio" name="data[use_consumpt]" value="4 gram"> 4 grams
                </label>
                <label class="radio-inline">
                  <input type="radio" name="data[use_consumpt]" value="5 gram"> 5 grams
                </label>
                <label class="radio-inline">
                  <input type="radio" name="data[use_consumpt]" value="6 gram"> 6 grams
                </label>
              </div>
              <div class="row input-group spacer">
                <div class="col-md-8">
                  <label for="data[use_consumpt_other]"><p>Other<p></label>
                  <input type="text" data-error="data[use_consumpt_other]" class="form-control" name="data[use_consumpt_other]">
                </div>
              </div>
            </div>
          </li><!-- Question 3 -->
          
          <li>
            <div class="col-md-12">
              <label for="data[use_change]">
                <p >
                  <strong>Has the amount of cannabis needed to manage your symptoms/condition changed over time?</strong>
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
            <div class="col-md-12">
              <label for="data[use_condition]">
                <p >
                  <strong>How effective has cannabis been in treating your condition?</strong>
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
            <div class="col-md-12">
              <label for="data[use_quit_bool]">
              <p >
                <strong>Have you ever stopped using cannabis only to find that your symptoms have returned or have become worse?</strong>
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
          
        </ul>       
      </div>
    </div>
    <div class="text-center col-md-12 spacer"> 
      <input class="btn btn-primary btn-lg custom" data-form-id="history" type="submit" value="Next" />
    </div>

  </form>
</section>
