<?php
/**
 * 示例接口名称：pdd.ddk.rp.prom.url.generate
*/
require_once dirname(__FILE__).'/Config.php';
require_once dirname(__FILE__)."/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\PopHttpClient;
use Com\Pdd\Pop\Sdk\Api\Request\PddDdkRpPromUrlGenerateRequest;
$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkRpPromUrlGenerateRequest();

$request->setAmount(1);
$request->setChannelType(1);
$request->setCustomParameters('str');
$request->setDiyLotteryParam();
$request->setDiyRedPacketParam();
$request->setGenerateQqApp(true);
$request->setGenerateSchemaUrl(true);
$request->setGenerateShortUrl(true);
$request->setGenerateWeApp(true);
$request->setPIdList(array('str'));
$request->setScratchCardAmount(1);
try{
	$response = $client->syncInvoke($request);
} catch(Com\Pdd\Pop\Sdk\PopHttpException $e){
	echo $e->getMessage();
	exit;
}
$content = $response->getContent();
if(isset($content['error_response'])){
	echo "异常返回";
}
echo json_encode($content,JSON_UNESCAPED_UNICODE);