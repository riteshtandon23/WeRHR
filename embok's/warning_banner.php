<script type="text/javascript">
	$(function() {
  	setTimeout(function() {
    	return $(".bar").animate({
      		height: "toggle"
    	}, "slow")
  	}, 450);
  	return $("#ok").on("click", function() {
    	$("#barwrap").css("margin-bottom", "0px");
    	$(".bar").animate({
      		height: "toggle"
    	}, "slow");
    	return !1
  		})
	});
</script>

<div id="barwrap">
  <div class="bar">
  <span id="head-image" class="fa fa-key"></span>
  <span id="text">Your account is not activated yet. Please check your Email and activate your account.</span>
  <span id="otherimg" class="fa fa-check"></span>
  <span id="ok"><a href="#">Dismiss</a></span>
  </div>
</div>