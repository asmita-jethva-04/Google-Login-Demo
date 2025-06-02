<html>  
<head>  
    <title>Login Form</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
</head>
<style>
 .box
 {
  width:100%;
  max-width:400px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
</style>
<body>  
<?php
require_once 'vendor/autoload.php';
include('db.php');

// init configuration
$clientID = '328388330812-gn6i43lr6tu4h5jrqtonef0k0gckv8ol.apps.googleusercontent.com';  //your client ID
$clientSecret = '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';    //your client secret
$redirectUri = 'http://localhost/phpMDIDM/google-login/';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();

  $name = $google_account_info->name ;
  $email = $google_account_info->email ;
  $password = 'Null' ;
  $address = 'Null' ;
  $mobno = 'Null' ;
  $country = 'Null' ;
  $city = 'Null' ;  
  $img = $google_account_info->picture ;
  

  // $img_file='http://www.somedomain.com/someimage.jpg'

  $img_file=file_get_contents($img);

  $file_loc=$_SERVER['DOCUMENT_ROOT'].'/phpMDIDM/images/'.time().'.jpg';

  $IMGNAME = time().'.jpg';

  $file_handler=fopen($file_loc,'w');

  if(fwrite($file_handler,$img_file)==false){
      echo 'error';
  }

  fclose($file_handler);

  // echo 'done';

  
  $type = 1 ;

  $sql = "INSERT INTO detail(name,email,password,address,mobno,country,city,img,type) VALUES ('$name' , '$email' , '$password ' , '$address' , '$mobno' , '$country' , '$city' , '$IMGNAME','$type')";

  $result = $conn->query($sql);


?>
<div class="container">
        <div class="box">
        <div class="form-group">
        <label for="email">Emailid: <?php echo $email; ?></label>
        <label for="name">Name: <?php echo $name; ?></label>
        </div>
        </div>
    </div>
<?php } else {?>
      <div class="container">  
        <form action="store.php" method="post">
        <div class="table-responsive">  
          <h3 align="center">Login using Google with PHP</h3>
          <div class="box">
            <div class="form-group">
              <label for="email">Emailid</label>
              <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="pwd" placeholder="Enter Password" class="form-control"/>
            </div>
            <div class="form-group">
              <input type="submit" id="login" name="login" value="Login" class="btn btn-success form-control"/>
              <hr>
              <center><a href="<?php echo $client->createAuthUrl() ?>"><img src="google-signin.png" width="256"></a></center>
            </div>
          </div>
        </div>  
      </div>
    </from>
       
<?php } ?>
 </body>  
</html>