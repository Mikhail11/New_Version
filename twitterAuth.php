<?php
include 'includes/core/session.php';
require_once ('includes/core/codebird.php');

	$post = $database->getValuesForParentByShortName('POST');
	
	// Содержание текста для постов
	$postContent = $post['POST_TEXT']['VALUE'];

	//Ссылки на изображения для постов
	$photoVK = $baseUrl.$post['POST_IMG']['VALUE'];

\Codebird\Codebird::setConsumerKey('hDjNYebSdey05mAxvmhJOWP8H', 'ZnXkLXc0yT5QTAXEcDNJHetfTZj2qhszs02MmT2ROGrdWL7zYS'); // static, see 'Using multiple Codebird instances'

$cb = \Codebird\Codebird::getInstance();

// session_start();

if (! isset($_SESSION['oauth_token'])) {
    // get the request token
    $reply = $cb->oauth_requestToken([
        'oauth_callback' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
    ]);

    // store the token
    $cb->setToken($reply->oauth_token, $reply->oauth_token_secret);
    $_SESSION['oauth_token'] = $reply->oauth_token;
    $_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;
    $_SESSION['oauth_verify'] = true;

    // redirect to auth website
    $auth_url = $cb->oauth_authorize();
    header('Location: ' . $auth_url);
    die();

} elseif (isset($_GET['oauth_verifier']) && isset($_SESSION['oauth_verify'])) {
    // verify the token
    $cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    unset($_SESSION['oauth_verify']);

    // get the access token
    $reply = $cb->oauth_accessToken([
        'oauth_verifier' => $_GET['oauth_verifier']
    ]);

    // store the token (which is different from the request token!)
    $_SESSION['oauth_token'] = $reply->oauth_token;
    $_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;

    // send to same URL, without oauth GET parameters
    header('Location: ' . basename(__FILE__));
    die();
}
	// assign access token on each page load
	$cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

	$response = $cb->account_verifyCredentials();
	$profileURL = (property_exists($response,'screen_name'))?("http://twitter.com/".$response->screen_name):"";
	$firstName = (property_exists($response,'name'))?$response->name:"";
	$friendsCount = (property_exists($response,'followers_count'))?$response->followers_count:"";
	$logOpt = 'twitter';
	$database->addUser($firstName,'',$profileURL,$logOpt,null,$friendsCount,'');


	$reply = $cb->media_upload(array(
	    'media' => $photoVK
	));
	$media_ids[] = $reply->media_id_string;
	$media_ids = implode(',', $media_ids);
	$reply = $cb->statuses_update([
	    'status' => $postContent,
	    'media_ids' => $media_ids
	]);

    echo $media_ids;
	// header("Location:$routerAdmin");

?>