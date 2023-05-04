<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Authentication Page</title>
    <link rel="stylesheet" href="otp_verify.css">
    <!--font awesone is used to provide icons-->
    <script src="https://kit.fontawesome.com/97b8ba9787.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <form method="post">
    <div class="container">
        <div id="box" >
            <div class="reg">
                <label for="Registration Form"><h3><b>OTP Verification</b></h3></label> 
            </div>


            <div class="user first_box">
                <label for="Email">Enter Email:</label><br>
                <input type="text" name="email" id="email" ut="" placeholder="Enter Email" required><br>
                <span id="email_error" class="field_error"></span>
            </div>
            <div class="SubmitBtn first_box">
                <button id="SubmitBtn1" type="button"  onclick="send_otp()">Get OTP</button>
            </div>

            <div class="user second_box">
                <label for="otp">Enter OTP:</label><br>
                <input type="text" name="otp" id="otp" ut="" placeholder="Enter OTP" required><br>
                <span id="otp_error" class="field_error"></span>
            </div>
            <div class="SubmitBtn second_box">
                <button id="SubmitBtn2" type="button"  onclick="submit_otp()">SUBMIT</button>
            </div>

        </div>
    </div>
    </form>

    <script>
    function send_otp(){
        alert("OTP has been sent successfully on your email!");
        var email=jQuery('#email').val();
        jQuery.ajax({
            url:'send_otp.php',
            type:'post',
            data:'email='+email,
            success:function(result){
                
                if(result=='not_exist'){
                jQuery('#email_error').html('Please enter valid email address !');
			}
                else{
                    jQuery('.second_box').show();
                    jQuery('.first_box').hide();
                }
			
            }
        })
    }
    function submit_otp(){
	var otp=jQuery('#otp').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='dashboard.php'
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please enter valid otp !!');
			}
		}
	});
}
    </script>

</body>
</html>
