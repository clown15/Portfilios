<?php
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: GET, POST, PUT');
	header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
	//busRouteId(버스ID) = 
	$hour = date("h");
	$busRoute = "100100171"; //1164
	$station = "107000239"; //길음역

	 //길음역 정보 (stId)
	$query = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRouteAll?serviceKey=v%2Br7RiBgnB46KIkpgzFQwsR7Criyo6Qp9FaowpxZm0W7bJlJL1Kt7K%2F6ffMdWR4Ue4Y9fJul1JvsJ5LCML6sdQ%3D%3D&busRouteId=";


	$url_1164 = $query.$busRoute;
	$html = file_get_contents($url_1164);
	$xml = simplexml_load_string($html);

	$json=json_encode($xml, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	$result = json_decode($json,true);

	$itemList = $result['msgBody']['itemList'];
	$size = count($itemList);
	
	if($hour < 13) {
		if($size){
			for($i=0; $i<$size; $i++) {
				$diff1 = $result['msgBody']['itemList'][$i]['stId']; //찾기

				if($diff1 === $station){
					//echo "true"."<br>";
					$stName = $result['msgBody']['itemList'][$i]['stNm'];
					$firstBus = $result['msgBody']['itemList'][$i]['arrmsg1'];
					$secondBus = $result['msgBody']['itemList'][$i]['arrmsg2'];
				}
			}
		}
	}


  echo "<p class=stName>".$stName."</p><br>";
  echo "<p class=arrTime>".$firstBus."<br>".$secondBus."</p>";

?>
