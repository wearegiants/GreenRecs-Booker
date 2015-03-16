<?php

$params = array();
$params['token'] = $_GET['token'];
$res = $this->callYerbaVerde("verify/appointment", $params);

echo "<pre>".var_export($res,true)."</pre>";
$room = '';
// Validate hash back to Yerbaverde with post
if($res['status'] === -1) {
	$room = $res['room'];
	unset($res['status']);
	unset($res['room']);	
	setcookie('pat-info',base64_encode(json_encode($res)),time()+3600,'/');

	
	// do the magnolian stuff
	?>
<script type="text/javascript">
$(document).ready(function(){
    $('#mgVideoChat').mgVideoChat({
        wsURL: 'ws://local.wordpress-trunk.dev:8080?room=<?php echo $room; ?>' //domain:port and room id info
    });

    //on connections change remove text message option
    $('#mgVideoChat').mgVideoChat('on','connections',function(connections){
        console.log('[mgVideoChat.connections]firedx',connections);
        $(".chatMsg.btn").hide();
		$(".cmdBtn.call").hide();
    }); 
});
</script>

<div id="mgVideoChat"></div>
<?php
}

?>
