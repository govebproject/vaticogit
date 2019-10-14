<?php 

$post_data['name'] = $_POST['name'];
$post_data['phone'] = preg_replace('/[^0-9]/', '', $_POST['phone']);

if (isset($post_data['phone']) and ($post_data['phone'] !== '') ) {



	$post  = [
		'api_key' => 'qk93j-lQtMVNzqUgdyMKPR0QhhsL6D3l',
		'phone' => $post_data['phone'],
		'name' => $post_data['name'],
		'offer_id' => 884,
		'country' => 'ro',
		'lang' => 'ro',
		'ip' => $_SERVER["HTTP_CF_CONNECTING_IP"],
		'sub1' => $_SERVER['HTTP_HOST'],
		'sub2' => $post_data['phone'],
	];

	$api_reqest = curl('http://api.cpagetti.com/order/register', $post);

	$api_reqest = json_decode($api_reqest);

	if ($api_reqest->success) {
		require_once('ok.php');
		exit();
	} else {

	}

} else {
	echo 'Ошибка 2!';
}

function curl($url, $post = null, $head=0){
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

	if($head){
		curl_setopt($ch,CURLOPT_HTTPHEADER, $head);
	}else{
		curl_setopt($ch,CURLOPT_HEADER, 0);
	}

	if($post){
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	$response = curl_exec($ch);
	$header_data = curl_getinfo($ch);
	curl_close($ch);
	return $response;

}
