<?php
/**
 * 示例接口名称：pdd.ddk.oauth.goods.pid.generate
*/
require_once dirname(__FILE__).'/Config.php';
require_once dirname(__FILE__)."/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\PopHttpClient;
use Com\Pdd\Pop\Sdk\Api\Request\PddDdkOauthGoodsPidGenerateRequest;
$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkOauthGoodsPidGenerateRequest();

$request->setMediaId(1);
$request->setNumber(1);
$request->setPIdNameList(array('str'));
try{
	$response = $client->syncInvoke($request, Config::$accessToken);
} catch(Com\Pdd\Pop\Sdk\PopHttpException $e){
	echo $e->getMessage();
	exit;
}
$content = $response->getContent();
if(isset($content['error_response'])){
	echo "异常返回";
}
echo json_encode($content,JSON_UNESCAPED_UNICODE);