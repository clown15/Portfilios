<!DOCTYPE HTML>
<!-- 웹파일 가기 ****\\210.110.36.134\Web -->
<html lang="ko">
<head>
  <link rel="shortcut icon" href="./favicon.ico">
  <!-- 메타 태그들 입니다 --> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>카드 레이아웃 </title>

  <!-- script 파일들 입니다. -->
  <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=27f695eb4274a012e115634b366ae323&libraries=services">
  </script>
  <script src="./jquery.js"></script>
  <script type="text/javascript" src="busAPI.js"></script>
  
  <script type="text/javascript" src="hide.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> <!--드롭 다운 사용하기 위해-->
  <script src="dist/js/bootstrap.min.js"></script> 

  <!-- css 파일들 입니다 -->
  <link rel="stylesheet" type="text/css" href="maps.css">
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="test.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="api2.css">
  <link rel="stylesheet" type="text/css" href="Weather.css">
  <!--<link rel="stylesheet" type="text/css" href="floatingbar.css">-->
  <link rel="stylesheet" type="text/css" href="footer.css"> 

  <!-- 스프레드 시트 팀 작업입니다... -->
  <link rel="stylesheet" type="text/css" href="foodtable.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> <!--구글api -->
  <script type="text/javascript" src="LoadFoodTable.js"></script><!--스프레드 정보 읽어 와서 태그 작업 통해 테이블로 만든 뒤 해당 id 값의 div 에 추가하는 script -->
  <script src="https://spreadsheets.google.com/feeds/cells/1tD9YnPmeUysPGJ_eMPbctq-UGbFwySU5d1DXISjzVok/2/public/values?alt=json-in-script&callback=DoData"></script>
  <!--<script src="https://spreadsheets.google.com/feeds/cells/1fwII8ZPj0R7LxKqPqJrrakBWwvY0VLO8QvXMNE1xGQc/2/public/values?alt=json-in-script&callback=DoData"></script>--> <!-- 해당 url을 통해 위에 추가한 api통해서 JS파일의 DoData 호출 -->
  <script type="text/javascript" src="footer_script.js"></script>
  <script src="https://spreadsheets.google.com/feeds/cells/1tD9YnPmeUysPGJ_eMPbctq-UGbFwySU5d1DXISjzVok/1/public/values?alt=json-in-script&callback=doData2"></script>
  <script type="text/javascript" src="Weather.js"></script>

</head>

<body onload="time()">

  <!-- 헤더 부분 입니다 --> 
  <div class="container-fluid">
    <div id="hd">   
      <div class="link">
        <h5> <a href="skuniv.ac.kr"> 서경대학교 </a> <a href="skuniv.ac.kr"> 서경포탈 </a> <a href="skuniv.ac.kr"> 학술정보관 </a></h5></div>
      </div> 
      <!-- 드롭다운메뉴  -->
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Quick
      <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#dropdown-weather">날씨</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#dropdown-bus">버스</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#dropdown-bab">학식</a></li>
        <li role="presentation" class="divider"></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#dropdown-library">도서관 좌석 정보</a></li> 
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#dropdown-notice">공지 사항</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#dropdown-map">지도</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#dropdown-todaymenu">오늘의 점심?</a></li>   
      </ul>
    </div><br>
  </div>

  <script>
    $(document).ready(function(){
      $(".dropdown-toggle").dropdown();
    });
  </script>
    </div>

    <!-- 버튼 클릭시 부드럽게 스크롤하기


    <script>
      function scrolling(pos) {
        $('html, body').animate({scrollTop : $(pos).offset().top}, 500);
      }
    </script>
  -->

  

  <!-- floating menu -->
      <!--<div class="floating-bar">
      </div>-->
      <!-- 카드들 입니다. -->
      <div class="container">
        <!-- 날씨 부분 입니다 -->
        <div class="card border-secondary mb-3" id="dropdown-weather">
         <h5 class="card-header">날씨</h5>
         <div class="card-body">
           <div class="component__weather-box">
             <div class="component__weather-content">
              <div class="weather-content__overview"></div>
              <div class="weather-content__temp"></div>
            </div>
            <div class=component_forecast-box></div>
          </div>
        </div>
        <a href="#" class="btn btn-secondary">더보기 버튼</a>
      </div>

      <!-- 학식 부분 입니다 -->
      <div class="card border-secondary mb-3" id="dropdown-bab">
        <section class="card-header">
          <h5>오늘뭐먹지?</h5>
          <ul class="nav nav-tabs">
            <li class="active nav-item">
              <a href="#ftab1" data-toggle="tab" class="nav-link">북악관</a></li>
              <li class="nav-item">
                <a href="#ftab2" data-toggle="tab" class="nav-link">한림관</a></li>
                <li class="nav-item">
                  <a href="#ftab3" data-toggle="tab" class="nav-link">청운관</a></li>
                <li class="nav-item">
                  <a href="#ftab4" data-toggle="tab" class="nav-link">배달</a></li>
                </ul>
              </section>
              <div class="tab-content card-body">
                <div class="tab-pane active" id="ftab1">
                  <div class="dataArea0"></div> 
                  <a href="#" class="btn btn-secondary">2-3일치 학식정보</a>
                </div>
                <div class="tab-pane" id="ftab2">
                  <div class="dataArea1"></div> 
                  <a href="#" class="btn btn-secondary">2-3일치 학식정보</a>
                </div>
                <div class="tab-pane" id="ftab3">
                  <div class="dataArea2"></div> 
                  <a href="#" class="btn btn-secondary">2-3일치 학식정보</a>
                </div>
                <div class="tab-pane" id="ftab4">
                </div>
              </div>
            </div>
            <script type="text/javascript" src="./api.js"></script>

      <!-- 버스 부분 입니다 -->
      <div class="card border-secondary mb-3" id="dropdown-bus">
        <h5 class="card-header">버스</h5>

        <div class="card-body">   
          <p class="busName">1164</p>
          <?php

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
  echo "<p class=arrTime>".$firstBus."</p><br>";
  echo "<p class=arrTime>".$secondBus."</p><br>";

?>
          <!-- <embed src ='busAPI.php'> -->
          <hr>
          <p class="busName">2115</p>
<?php

  
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
  echo "<p class=arrTime>".$firstBus."</p><br>";
  echo "<p class=arrTime>".$secondBus."</p><br>";
?>
          <!-- <embed src ='busAPI2.php'> -->
          <hr>
          <p class="busName">셔틀버스</p>
          <div id="shuttle">
          </div>
          <br>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#shuttleTable" aria-expanded="false" aria-controls="shuttleTable">
               셔틀버스 시간표
          </button>
          <button class="btn btn-primary" type="button">새로고침</button>
<!--           <script type="text/javascript" src="$('#load_tweets').load('refresh.html').fadeIn("slow");">
            function() {

            }
          </script> -->
          <table class="collapse" id="shuttleTable">
            <thead>
              <th>1호</th>
              <th>2호</th>
              <th>3호</th>
              <th>4호</th>
            </thead>
            <tbody> 
              <tr> 
                <td>8:10</td>
                <td>8:22</td>
                <td>8:30</td>
                <td>8:37</td>
              </tr> 
              <tr>
                <td>8:44</td>
                <td>8:50</td> 
                <td>9:05</td>
                <td>9:25</td> 
              </tr> 
              <tr>
                <td>9:45</td> 
                <td>9:55</td>
                <td>10:10</td>
                <td>10:17</td>
              </tr> 
              <tr>
                <td>10:24</td>
                <td>10:35</td>
                <td>10:50</td>
                <td>11:05</td>
              </tr> 
              <tr>
                <td>11:20</td>
                <td>11:30</td>
                <td>11:40</td>
                <td>11:50</td>
              </tr>
              <tr>
                <td>12:00</td>
                <td>12:20</td>
                <td>12:40</td>
                <td>13:00</td>
              </tr> 
            </tbody> 
          </table>
        </div>
      </div>
   <!-- 지도 부분 입니다 -->
    <div class="card border-secondary mb-3" id="dropdown-map">
      <h5 class="card-header">지도</h5>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <input type="button" onclick="doDisplay()" value="category" class="btn btn-secondary">

        <div class="map_wrap">
          <div id="map"></div>
          <ul id="category">
            <li id="CE7" data-order="0">
             <span class="category_bg cafe"></span>
             카페 
           </li><br>
           <li id ="FD6" data-order="1">
            <span class="category_bg food"></span>
            음식점
          </li><br>
          <li id="MT1" data-order="2"> 
            <span class="category_bg mart"></span>
            마트
          </li><br>  
          <li id="CS2" data-order="3"> 
            <span class="category_bg store"></span>
            편의점
          </li><br>
          <li id="HP8" data-order="4"> 
            <span class="category_bg hospital"></span>
            병원
          </li><br>
          <li id="PM9" data-order="5"> 
            <span class="category_bg pharmacy"></span>
            약국
          </li><br>
          <li id="BK9" data-order="6"> 
            <span class="category_bg bank"></span>
            은행
          </li>           
        </ul>
        <div class="custom_zoomcontrol radius_border"> 
          <span onclick="zoomIn()"> <img src="http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/ico_plus.png" alt="확대"> </span>
          <!--         <span onclick="zoomIn()" src="http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/ico_plus.png"></span> -->
          <span onclick="zoomOut()"><img src="http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/ico_minus.png" alt="축소"></span>
        </div>
      </div>
    </div>
  </div>   

  <!-- 공지사항 바로가기 부분 입니다 -->
    <div class="card border-secondary mb-3" id="dropdown-notice">
      <h5 class="card-header">공지사항 바로가기</h5>
      <div class="card-body">

        <input type="button" onclick="window.open('https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%ED%9C%B4%ED%95%99&search_target=title')" value="#휴학" class="btn btn-secondary">
        <input type="button" onclick="window.open('https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%EB%B3%B5%ED%95%99&search_target=title')" value="#복학" class="btn btn-secondary">
        <input type="button" onclick="window.open('https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%EC%9E%A5%ED%95%99%EA%B8%88&search_target=title')" value="#장학금" class="btn btn-secondary">
        <input type="button" onclick="window.open('https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%EC%A1%B8%EC%97%85%EC%9A%94%EA%B1%B4&search_target=title')" value="#졸업요건" class="btn btn-secondary">
        <input type="button" onclick="window.open('https://www.skuniv.ac.kr/index.php?mid=notice&document_srl=135814')" value="#성적" class="btn btn-secondary"> 
        <p class="detail"> 셔틀버스시간표이미지
        </p>
      </div>
    </div>
            <!-- 도서관 좌석 부분 입니다 -->
      <div class="card border-secondary mb-3">
  <section class="card-header">
    <h5>도서관좌석정보</h5>
    <ul class="nav nav-tabs">
      <li class="active nav-item">
        <a href="#ltab1" data-toggle="tab" class="nav-link">GREEN</a></li>
      <li class="nav-item">
        <a href="#ltab2" data-toggle="tab" class="nav-link">BLUE</a></li>
      <li class="nav-item">
        <a href="#ltab3" data-toggle="tab" class="nav-link">RED</a></li>
      <li class="nav-item">
        <a href="#ltab4" data-toggle="tab" class="nav-link">ORANGE</a></li>
      <li class="nav-item">
        <a href="#ltab5" data-toggle="tab" class="nav-link">7층</a></li>
      <li class="nav-item">
        <a href="#ltab6" data-toggle="tab" class="nav-link">8층</a></li>
    </ul>
  </section>
      <div class="tab-content card-body">
        <div class="tab-pane active" id="ltab1">
          <article> 그린룸</article>
        </div>
        <div class="tab-pane" id="ltab2">
          <article> 블루룸</article>
        </div>
        <div class="tab-pane" id="ltab3">
          <article> 레드룸</article>
        </div>
        <div class="tab-pane" id="ltab4">
          <article> 오렌지룸</article>
        </div>
        <div class="tab-pane" id="ltab5">
          <article> 7층 </article>
        </div>
        <div class="tab-pane" id="ltab6">
          <article> 8층</article>
        </div> 
      </div>
    </div>

                      <!-- 디데이 부분 입니다 -->
<!--       <div class="card border-secondary mb-2">
        <h5 class="card-header">디데이 </h5>
        <div class="card-body ">
          <h5 class="card-title">개강 D-00</h5>
          <a href="#" class="btn-secondary">학사일정 ㄱ</a>
        </div>
      </div> -->

      <!-- ******여기부터 --> 

      <div class="card border-secondary mb-3" id="dropdown-todaymenu">
        <h5 class="card-header">오늘 점심은?</h5>
        <div id="data"></div>
      </div>
    </div>
    <!-- 여기까지 --> 

    
    <span class="dday"><h3> 종강 D-DAY00 </h3></span>
    <footer>
      <div id="footer_link"></div>
      <div id="footer_contents">
        <div id=footer_contents_text>
          <p class="footer_texts">[02713] 서울시 성북구 서경로 124(정릉동 16-1)</p>
          <p class="footer_texts">Tel : 02 940 7114</p>
          <p class="footer_texts">Fax : 02 919 0345</p>
        </div>
        <div id=footer_contents_logo>
          <img id="footer_logo_png" src="sku_footer_logo_skon.png">
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="map.js"></script>
  </body>
  </html>

