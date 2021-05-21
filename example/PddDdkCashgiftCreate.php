<?php
/**
 * 示例接口名称：pdd.ddk.cashgift.create
*/
require_once dirname(__FILE__).'/Config.php';
require_once dirname(__FILE__)."/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\PopHttpClient;
use Com\Pdd\Pop\Sdk\Api\Request\PddDdkCashgiftCreateRequest;
$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddDdkCashgiftCreateRequest();

$request->setAcquireEndTime(1);
$request->setAcquireStartTime(1);
$request->setAutoTake(true);
$request->setCouponAmount(1);
$request->setDuration(1);
$request->setFetchRiskCheck(true);
$request->setLinkAcquireLimit(1);
$request->setName('str');
$request->setQuantity(1);
$request->setSourceUrl('str');
$request->setUserLimit(1);
$request->setValidityEndTime(1);
$request->setValidityStartTime(1);
$request->setValidityTimeType(1);
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