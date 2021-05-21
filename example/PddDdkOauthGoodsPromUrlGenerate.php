<?php
/**
 * 示例接口名称：pdd.ddk.oauth.goods.prom.url.generate
*/
require_once dirname(__FILE__).'/Config.php';
require_once dirname(__FILE__)."/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\PopHttpClient;
use Com\Pdd\Pop\Sdk\Api\Request\PddDdkOauthGoodsPromUrlGenerateRequest;
$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkOauthGoodsPromUrlGenerateRequest();

$request->setCashGiftId(1);
$request->setCashGiftName('str');
$request->setCustomParameters('str');
$request->setForceDuoId(true);
$request->setGenerateAuthorityUrl(true);
$request->setGenerateMallCollectCoupon(true);
$request->setGenerateQqApp(true);
$request->setGenerateSchemaUrl(true);
$request->setGenerateShortUrl(true);
$request->setGenerateWeApp(true);
$request->setGoodsSignList(array('str'));
$request->setMultiGroup(true);
$request->setPId('str');
$request->setSearchId('str');
$request->setZsDuoId(1);
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