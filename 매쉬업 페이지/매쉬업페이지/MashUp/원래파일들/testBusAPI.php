<?php
	header("Content-Type: text/html; charset=UTF-8");
	$searchURL = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRouteAll?serviceKey=";
 	$key = "v%2Br7RiBgnB46KIkpgzFQwsR7Criyo6Qp9FaowpxZm0W7bJlJL1Kt7K%2F6ffMdWR4Ue4Y9fJul1JvsJ5LCML6sdQ%3D%3D";
 	$target = "&busRouteId=";
 	$ONETWO = "100100171";
 	$GIRUEM = "107000239";

 	function query($query) {
 		$url = $searchURL.$key.$target.$ONETWO;
 		$data = file_get_contents($url);
 		$xml = simplexml_load_string($data);

 		return $xml;
 	}

 	function getBusTime($query){
 		$xml = $this->query($query);
 		$result = json_decode($xml);
 		
 		return $result;
 	}

 	echo getBusTime($_POST['query']);
?>

<!-- <?php
	
	$hour = date("h");
	$busRoute = "100100598"; //2115
	$station = "107000175"; //sungsin

	 //성신 정보 (stId)
	$query = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRouteAll?serviceKey=v%2Br7RiBgnB46KIkpgzFQwsR7Criyo6Qp9FaowpxZm0W7bJlJL1Kt7K%2F6ffMdWR4Ue4Y9fJul1JvsJ5LCML6sdQ%3D%3D&busRouteId=";


	$url_2115 = $query.$busRoute;
	$html = file_get_contents($url_2115);
	$xml = simplexml_load_string($html);

	$json=json_encode($xml, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
	$result = json_decode($json,true);

	$itemList = $result['msgBody']['itemList'];
	$size = count($itemList);
	
	if($hour < 13) {
		if($size){
			for($i=0; $i<$size; $i++) {
				$diff2 = $result['msgBody']['itemList'][$i]['stId']; //찾기

				if($diff2 === $station){
					//echo "true"."<br>";
					$stName = $result['msgBody']['itemList'][$i]['stNm'];
					$firstBus = $result['msgBody']['itemList'][$i]['arrmsg1'];
					$secondBus = $result['msgBody']['itemList'][$i]['arrmsg2'];
				}
			}
		}




	}


	echo $stName."<br>";
	echo $firstBus."<br>";
	echo $secondBus."<br>";
?> -->
<!--$url = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRouteAll?serviceKey=v%2Br7RiBgnB46KIkpgzFQwsR7Criyo6Qp9FaowpxZm0W7bJlJL1Kt7K%2F6ffMdWR4Ue4Y9fJul1JvsJ5LCML6sdQ%3D%3D&busRouteId=100100171";
// $xml_string = file_get_contents($url);
// $object = simplexml_load_string($response);

// header('Access-Control-Allow-Origin: *');
// header("Content-Type: text/html; charset=UTF-8");
// header('Access-Control-Allow-Methods: GET, POST, PUT');
// header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');-->
