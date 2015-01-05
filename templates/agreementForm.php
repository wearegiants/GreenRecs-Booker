<section class="form-part" id="AgreementForm">
  <form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="agreement">
    <?php echo $this->getSubmitFields('AgreementForm');?>
    <input type="hidden" name="data[redirect_to]" value="" />
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
        <input class="btn btn-primary btn-lg custom" data-form-id="agreement" type="submit" value="Submit" />
        </div>
      </div>
    </div>
  </form>
</section>