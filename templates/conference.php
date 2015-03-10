<section>
<?php echo var_dump($_GET); 
// $params = $this->getSubmitFields('conference');
$params = [];
$params['token']= $_GET['token']; ?>
<?php $api_result = $this->callYerbaVerde("verify/appointment", $params); 
var_dump($api_result); ?>

<p> Hey Miles do your magic. </p>
</section>