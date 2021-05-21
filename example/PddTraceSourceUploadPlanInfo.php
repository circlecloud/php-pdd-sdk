<?php
/**
 * 示例接口名称：pdd.trace.source.upload.plan.info
*/
require_once dirname(__FILE__).'/Config.php';
require_once dirname(__FILE__)."/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\PopHttpClient;
use Com\Pdd\Pop\Sdk\Api\Request\PddTraceSourceUploadPlanInfoRequest;
$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddTraceSourceUploadPlanInfoRequest();

$request->setArriveTime('str');
$request->setBillNo('str');
$request->setCiqDate('str');
$request->setCiqNo('str');
$request->setDealerOrg('str');
$request->setDeclareOrg('str');
$request->setDespPortName('str');
$request->setEntryDate('str');
$request->setEntryNo('str');
$request->setGoods();
$request->setListDate('str');
$request->setListNo('str');
$request->setLoadPort('str');
$request->setMallId(1);
$request->setMallName('str');
$request->setPlanActiveTime('str');
$request->setPlanCreatedTime('str');
$request->setPlanNo('str');
$request->setPort('str');
$request->setTransportMode('str');
$request->setWarehouseName('str');
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