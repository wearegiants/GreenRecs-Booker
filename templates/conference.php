<?php
// $params = $this->getSubmitFields('conference');
$params = [];
$params['token']= $_GET['token'];
$params['method'] = 'conference';
$params['action'] = 'green_rec_form';
$params['gr_wp_nonce'] = wp_create_nonce('green_rec_form_nonce'); ?>
<?php 
$res = $this->callYerbaVerde("verify/appointment", $params); 

$room = '';
// Validate hash back to Yerbaverde with post
if(is_array($res)) {
	$room = $res['room'];
	unset($res['status']);
	unset($res['room']);	
	setcookie('pat-info',base64_encode(json_encode($res)),time()+3600,'/');
	$wsUrl = preg_replace('/(http(s)?)\:\/\//', 'ws://', getenv('WP_HOME'));


	// do the magnolian stuff
	?>
<div class="row" id="statusToken">
	<div class="col-md-4 col-md-offset-4" style="padding-top: 40px; padding-bottom: 40px; height: 400px;">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>Hi, <?php echo ucwords($res['name']); ?>!</h3>
					<p> This is temporary, but your token is valid and normally we would forward you from here on to the video conferencing suite.</p>
				</div>
			</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#mgVideoChat').mgVideoChat({
        wsURL: '<?php echo $wsUrl; ?>:8080/?room=<?php echo $room; ?>' //domain:port and room id info
    });

    //on connections change remove text message option
    $('#mgVideoChat').mgVideoChat('on','connections',function(connections){
        console.log('[mgVideoChat.connections]firedx',connections);
        $(".chatMsg.btn").hide();
		$(".cmdBtn.call").hide();
		$("#statusToken").hide();
    }); 
});
</script>

<div id="mgVideoChat" style="padding-top: 40px;"></div>
<?php 
	} else {
?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="padding-top: 40px; padding-bottom: 40px; height: 400px;">
			<div class="panel panel-default">
				<div class="panel-body">
					<p>Whoops, looks like you're a little early for your appointment. Please, check back within 20 minutes of your appointment's start time</p>
				</div>
			</div>
		</div>
	</div>
<?php  
	}
?>
