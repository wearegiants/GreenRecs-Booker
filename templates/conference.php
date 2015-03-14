<section>
<?php 
// $params = $this->getSubmitFields('conference');
$params = [];
$params['token']= $_GET['token'];
$params['method'] = 'conference';
$params['action'] = 'green_rec_form';
$params['gr_wp_nonce'] = wp_create_nonce('green_rec_form_nonce'); ?>
<?php $api_result = $this->callYerbaVerde("verify/appointment", $params); 
var_dump($api_result); ?>

<p> Hey Miles do your magic. </p>
</section>