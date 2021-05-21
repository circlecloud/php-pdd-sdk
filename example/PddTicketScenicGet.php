<?php
/**
 * 示例接口名称：pdd.ticket.scenic.get
*/
require_once dirname(__FILE__).'/Config.php';
require_once dirname(__FILE__)."/../vendor/autoload.php";

use Com\Pdd\Pop\Sdk\PopHttpClient;
use Com\Pdd\Pop\Sdk\Api\Request\PddTicketScenicGetRequest;
$client = new PopHttpClient(Config::$clientId, Config::$clientSecret);

$request = new PddTicketScenicGetRequest();

$request->setCityCode(1);
$request->setLocationType(1);
$request->setScenicId(1);
$request->setScenicName('str');
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