<section class="form-part" id="LegalForm">
  <form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="legal">
  <?php echo $this->getSubmitFields('Signup');?>
  <input type="hidden" name="data[redirect_to]" value="<?php echo self::getPageUrl('HistoryForm'); ?>" />

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

        <div class="text-center col-md-12 spacer"> 
          <input class="btn btn-primary btn-lg custom" data-form-id="legal" type="submit" value="Next" />
        </div>
        
      </div>
    </div>
  </form>
</section>
