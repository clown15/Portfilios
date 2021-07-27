

<meta charset="UTF-8">
<?php
	//busRouteId(버스ID) = 
	$busRoute = "100100171"; //1164
	$GIRUEM = "107000239"; //길음역
	$BUKAK = "107000274"; //북악관

	 //길음역 정보 (stId)
	$query = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRouteAll?serviceKey=v%2Br7RiBgnB46KIkpgzFQwsR7Criyo6Qp9FaowpxZm0W7bJlJL1Kt7K%2F6ffMdWR4Ue4Y9fJul1JvsJ5LCML6sdQ%3D%3D&busRouteId=";


	
	
	//echo $hour;


	$url = $query.$busRoute;
	$html = file_get_contents($url);
	$xml = simplexml_load_string($html);

	$json=json_encode($xml, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	$result = json_decode($json,true);

	$itemList = $result['msgBody']['itemList'];
	$size = count($itemList);
	$hour = date("H");
	if($size){
	for($i=0; $i<$size; $i++) {

		$diff1 = $result['msgBody']['itemList'][$i]['stId']; //찾기
			if($hour >= 6 && $hour < 13) {
				// echo $hour;
				if($diff1 === $GIRUEM){
					//echo "true"."<br>";
					$stName = $result['msgBody']['itemList'][$i]['stNm'];
					$firstBus = $result['msgBody']['itemList'][$i]['arrmsg1'];
					$secondBus = $result['msgBody']['itemList'][$i]['arrmsg2'];
				}
			}
			else
			{
				if($diff1 === $BUKAK){
					//echo "true"."<br>";
					$stName = $result['msgBody']['itemList'][$i]['stNm'];
					$firstBus = $result['msgBody']['itemList'][$i]['arrmsg1'];
					$secondBus = $result['msgBody']['itemList'][$i]['arrmsg2'];
				}
			}
	}

	echo $stName."<br>";
	echo $firstBus."<br>";
	echo $secondBus."<br>";
		
}

?>
<!--$url = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRouteAll?serviceKey=v%2Br7RiBgnB46KIkpgzFQwsR7Criyo6Qp9FaowpxZm0W7bJlJL1Kt7K%2F6ffMdWR4Ue4Y9fJul1JvsJ5LCML6sdQ%3D%3D&busRouteId=100100171";
// $xml_string = file_get_contents($url);
// $object = simplexml_load_string($response);

// header('Access-Control-Allow-Origin: *');
// header("Content-Type: text/html; charset=UTF-8");
// header('Access-Control-Allow-Methods: GET, POST, PUT');
// header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');-->