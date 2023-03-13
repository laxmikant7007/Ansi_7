<?php
if(isset($_POST['submit'])){
    $mobile = "91".$_POST['mobile'];
    $message = $_POST['message'];

    // Account details 
	$apiKey = urlencode('NDQ0Njc2NGI2YzUzMzM0NjZjNDc0OTU0NDUzNDZkNmQ=	');
	
	// Message details
	$numbers = array($mobile);
	$sender = urlencode('VERTEX');
	$message = rawurlencode($message);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS sending code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>

<body>
    <div class="container">
        <div class="form-center my-5">
            <h1 class="text-center">Send SMS</h1>
            <form action="" method="post">
                <div class="form-group">
                    <input type="Number" class="form-control" id="exampleInputEmail1" aria-describedby="numberHelp"
                        placeholder="Enter Mobile📱" name="mobile" required>
                </div>
                <div class="form-group my-4">
                    <div class="form-outline">
                        <textarea class="form-control" id="textAreaExample1" rows="4" placeholder="Enter Yr MessageⓂ️" name="message" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Send SMS</button>
            </form>
        </div>
    </div>
</body>

</html>