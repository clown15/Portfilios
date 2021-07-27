<!DOCTYPE HTML>
<!-- 웹파일 가기 ****\\210.110.36.134\Web -->
<html lang="ko">
<head>
  <!-- 상단바 아이콘 입니다 -->
  <link rel="shortcut icon" href="./00image/favicon.ico">
  <!-- 메타 태그들 입니다 --> 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SKU MOA</title>

  <!-- css 파일들 입니다 -->
  <!-- 메인페이지 관련 -->
  <link rel="stylesheet" type="text/css" href="./00css/test.css?ver=1">
  <link rel="stylesheet" type="text/css" href="./00css/footer.css?ver=1">
  <!-- 네비게이션 관련 -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!--<link rel="stylesheet" type="text/css" href="floatingbar.css">-->
  <!-- 부트스트랩 관련 --> 
  <link href="./00plugin/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- API 관련 -->
  <link rel="stylesheet" type="text/css" href="./00css/maps.css?ver=1">  
  <link rel="stylesheet" type="text/css" href="./00css/api3day.css?ver=2">
  <link rel="stylesheet" type="text/css" href="./00css/Weather.css?ver=1">
  <link rel="stylesheet" type="text/css" href="./00css/library.css">
  <!-- 플러그인 관련 -->
  <link rel="stylesheet" href="./00plugin/swiper/dist/css/swiper.min.css?ver=1">
  <link rel="stylesheet" type="text/css" href="./00css/CustomSwiper.css?ver=2">
  
  <!-- script 파일들 입니다. -->
  <!-- 메인페이지 관련 --> 
  <script src="./00js/jquery.js"></script>
  <script type="text/javascript" src="./00js/hide.js"></script>
  <!--드롭 다운 사용하기 위해-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> 
  <!-- 부트스트랩 관련 --> 
  <script src="./00plugin/dist/js/bootstrap.min.js"></script>
  <script src="./00plugin/swiper/dist/js/swiper.min.js"></script>
  <!-- API 관련 -->
  <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=27f695eb4274a012e115634b366ae323&libraries=services">
  </script>
  <script type="text/javascript" src="./00js/busAPI.js?ver=1"></script>
  <script type="text/javascript" src="./00js/Weather.js?ver=1"></script>  
  <!-- 네비게이션 관련 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  

  <!-- 스프레드 시트 팀 작업입니다... -->
  <!--<link rel="stylesheet" type="text/css" href="./00css/foodtable.css?ver=1">-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> <!--구글api -->
  <script type="text/javascript" src="./00js/LoadFoodTable.js?ver=1"></script><!--스프레드 정보 읽어 와서 태그 작업 통해 테이블로 만든 뒤 해당 id 값의 div 에 추가하는 script -->
  <script src="https://spreadsheets.google.com/feeds/cells/1tD9YnPmeUysPGJ_eMPbctq-UGbFwySU5d1DXISjzVok/2/public/values?alt=json-in-script&callback=DoData"></script>
  <!--<script src="https://spreadsheets.google.com/feeds/cells/1fwII8ZPj0R7LxKqPqJrrakBWwvY0VLO8QvXMNE1xGQc/2/public/values?alt=json-in-script&callback=DoData"></script>--> <!-- 해당 url을 통해 위에 추가한 api통해서 JS파일의 DoData 호출 -->
  <script type="text/javascript" src="./00js/quicklink.js"></script>
  <script src="https://spreadsheets.google.com/feeds/cells/1tD9YnPmeUysPGJ_eMPbctq-UGbFwySU5d1DXISjzVok/1/public/values?alt=json-in-script&callback=doData2"></script>


  <!--sns post -->
  <script type="text/javascript" src="./00js/LoadSnsPost.js?v=<%=System.currentTimeMillis() %"></script>
  <link rel="stylesheet" type="text/css" href="./00css/SnsPost.css?ver=123">
</head>

<body>

  <!-- 헤더 부분 입니다 -->
  <header id="head">
    <!-- 네비게이션 메뉴입니다. -->
    <nav class="navbar navbar-default navbar navbar-expand-sm navbar navbar fixed-top"> 
      <div class="container-fluid"><!-- 컨테이너 값이 전체화면을 쓴다는 속성, width값이 100% -->
        <img src="./00image/skon.png" alt="" class="logo">
        <!-- <img src="./00image/COMPUTER SCIENCE.png" alt"" class="logo"> -->
        <div class="navbar-header">
          <a class="navbar-brand" href="mashup.php"><h1>서경모아</h1></a> <!-- 네비게이션 제목 -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
        </div>
      </div>

      <div class="nav_size">    <!-- collapse떨어지는메뉴들 -->
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#dropdown-notice" class="scroll"><h3>공지사항 바로가기</h3></a></li>
            <li><a href="#dropdown-weather" class="scroll"><h3>날씨</h3></a></li>
            <li><a href="#dropdown-bab" class="scroll"><h3>오늘 뭐 먹지?</h3></a></li>
            <li><a href="#dropdown-bus" class="scroll"><h3>버스</h3></a></li>
            <li><a href="#dropdown-map" class="scroll"><h3>지도</h3></a></li>
            <li><a href="#dropdown-library" class="scroll"><h3>도서관 좌석 정보</h3></a></li>
            <li><a href="#dropdwon-insta" class="scroll"><h3>서경INSTA</h3></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- 스크롤 부드럽게 하기 및 모바일에서 메뉴클릭했을때 메뉴접기-->
  <script>
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){            
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top -120}, 500);
        document.getElementById('myNavbar').setAttribute('aria-expanded', 'true');
        document.getElementById('myNavbar').setAttribute('style', 'height:1px;');
        document.getElementById('myNavbar').className = "collapse navbar-collapse";            
      });
    });
  </script>

  <!-- 스크롤 다운시 헤더 색 변경 -->
  <script>
    $(window).scroll(function() {

      if ( $(this).scrollTop() >= 10 ) {
        $('.navbar-default').css({ 'background-color': '#323232'});
        $('.navbar-default').css({ 'color': 'red'});
        
      } 
      else {
       $('.navbar-default').css({ 'background-color': 'white'});
       $('.navbar-default').css({ 'color': 'green'});
     }

   });
 </script>



 <!--  floating menu -->
 <div class="floating-bar">
 </div>
 <!-- 카드들 입니다. --> 
 <div class="container">
  <!-- 디데이 부분 입니다. -->
  <div class="card border-secondary mb-3" id="dropdown-dday">
    <section class="card-header">
      <!-- 디데이 부분 입니다 -->
      <?php
      $fname=date("Y").".csv";
      $path="./00csv/".$fname;
      $is_file=file_exists("$path");
      // 파일의 유무를 판단하고 파일이 없을경우 python을 실행시켜 csv파일 생성
      if(!$is_file){
        $command=escapeshellcmd('python ./00python/Dday.py');
        exec($command,$out,$stat);
      }
      $sep=",";
      $array_lines=file("$path");
      for($i=0;$i<count($array_lines);$i++) {
        $temp=[];
        $tok=strtok(iconv("EUC-KR","UTF-8",$array_lines[$i]),$sep);
        //한줄의 정보를 ,로 분리해 배열에 저장
        for($j=0;$j<4;$j++){
          $temp[$j]=$tok;
          $tok=strtok($sep);
        }
        
        $year=date("Y");
        $month='0';
        $day='0';
    //월구하기 년이 포함되어 있으면 년과월 구분해서 구함
        if(strpos($temp[0],"년")){
          $year=strtok($temp[0],"년");
          $month=strtok("년");
        }
        if($month=='0')
          $month=$temp[0];
    //날짜 구하기
        if(strpos($temp[1],"~")){
          $day=strtok($temp[1]," ~");
        }
        else{
          $day=$temp[1];
        }
        $target='';
        if($year=='0'){
          $target=date_create(date("Y").'-'.$month.'-'.$day);
        }
        else {
          $target=date_create($year.'-'.$month.'-'.$day);
        }
        
        $today=date_create(date("Y-m-d"));
         // csv에 들어있는 정보와 현재의 날짜를 비교해 가장 가까운 정보의 날짜와 남은날수 표시
        if($year>date("Y")) {
          $dday=date_diff($today,$target);
          echo "<span class=\"dday\"><h3>".$temp[3]."(".$month.'/'.$day.")&nbsp D-".$dday->days."</h3></span>";
          break;
        }
        else if($month>=date('m')) {
          if(($month==date('m'))&&($day>date('j'))) {
            $dday=date_diff($today,$target);
            echo "<span class=\"dday\"><h3>".$temp[3]."(".$month.'/'.$day.")&nbsp D-".$dday->days."</h3></span>";
            break;
          }
          else {
            $dday=date_diff($today,$target);
            echo "<span class=\"dday\"><h3>".$temp[3]."(".$month.'/'.$day.")&nbsp D-".$dday->days."</h3></span>";
            break;
          }
          
        }
      } 
      ?>
    </section>
  </div>

  <!-- 공지사항 바로가기 부분 입니다 -->
  <div class="card border-secondary mb-3" id="dropdown-notice">
    <section class="card-header">
      <h2><img src="./00image/information.png" class="info"> 공지사항 바로가기</h2>
      <ul class="nav nav-tabs">
        <li class="nav-item active">
          <a href="#ntab0" data-toggle="tab"><h3>공지 사항</h3></a>
        </li>
        <li>
          <a href="#ntab1" data-toggle="tab"><h3>퀵 링크</h3></a>
        </li>
      </ul>
    </section>
    <div class="tab-content card-body">
      <div class="tab-pane active" id="ntab0">
        <a class ="btn btn-outline-secondary" href="https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%ED%9C%B4%ED%95%99&search_target=title" role="button"><h4>#휴학</h4></a>
        <a class ="btn btn-outline-secondary" href="https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%EB%B3%B5%ED%95%99&search_target=title" role="button"><h4>#복학</h4></a>
        <a class ="btn btn-outline-secondary" href="https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%EC%9E%A5%ED%95%99%EA%B8%88&search_target=title" role="button"><h4>#장학금</h4></a>
        <a class ="btn btn-outline-secondary" href="https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%EC%A1%B8%EC%97%85%EC%9A%94%EA%B1%B4&search_target=title" role="button"><h4>#졸업요건</h4></a>
        <a class ="btn btn-outline-secondary" href="https://www.skuniv.ac.kr/index.php?mid=notice&document_srl=135814" role="button"><h4>#성적</h4></a>          
      </div>
      <div class="tab-pane" id="ntab1">
        <!-- 구글 스프레드에서 id를 통해 정보를 넘겨줍니다. -->
        <div class="card-body" id="button_link"></div>
      </div>
    </div>
  </div>       

  <!-- 날씨 부분 입니다 -->
  <div class="card border-secondary mb-3" id="dropdown-weather">
   <h2 class="card-header"><img src="./00image/overcast.png" class="cast">  날씨</h2>
   <div class="card-body">
     <div class="component__weather-box">
       <div class="component__weather-content">
        <div class="weather-content__overview"></div>
        <div class="weather-content__temp"></div>
      </div>
      <div class="component__forecast-box"></div>
    </div>
  </div>
</div>

<!-- 학식 부분 입니다 -->
<!-- swiper을 통해 슬라이드 기능 구현 -->
<div class="card border-secondary mb-3 swiper-container" id="dropdown-bab">   
  <div class="card-header">
   <h2> <img src="./00image/bab.png" class="dish"> 오늘뭐먹지?</h2>
   <!-- 탭과 같은 기능을 이용하기 위해 사용 -->
   <div class="swiper-pagination"></div>
 </div>
 <div class="card-body swiper-wrapper">    
  <div class="swiper-slide " id="ftab1">
    <div class="dataArea0">
      <div class="dataArea00"></div>
      <div class="collapse" id="tomorrow0"> 
        <div class="dataArea10"></div>
        <div class="dataArea20"></div>
      </div>
    </div> 
    <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#tomorrow0" aria-expanded="false" aria-controls="tomorrow0">
     <h3> 2일치 정보 더보기 </h3>
   </button>
 </div>
 <div class="swiper-slide" id="ftab2">
  <div class="dataArea1">
    <div class="dataArea01"></div>
    <div class="collapse" id="tomorrow1"> 
      <div class="dataArea11"></div>
      <div class="dataArea21"></div>
    </div>
  </div> 
  <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#tomorrow1" aria-expanded="false" aria-controls="tomorrow1">
   <h3> 2일치 정보 더보기 </h3>
 </button>
</div>
<div class="swiper-slide" id="ftab3">
  <div class="dataArea2">
    <div class="dataArea02"></div>
    <div class="collapse" id="tomorrow2"> 
      <div class="dataArea12"></div>
      <div class="dataArea22"></div>
    </div>
  </div>
  <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#tomorrow2" aria-expanded="false" aria-controls="tomorrow2">
   <h3> 2일치 정보 더보기 </h3>
 </button>
</div>
<!-- 구글 스프레드에서 정보를 뿌려주는 부분 ftab4를 통해 정보를 뿌려준다 -->
<div class="swiper-slide" id="ftab4"></div>
</div>
</div>
<!-- 위에서 스크립트를 선언할시 스크립트가 적용되지않는 문제가 발생 -->
<script type="text/javascript" src="./00js/api3day.js"></script>
<!-- pagination과 슬라이더를 연결시키는 스크립트 -->
<script>
  var ftab=["북악관","한림관","청운관","배달"];
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + ftab[index] + '</span>';
      },
    },
  });
</script>

<!-- 버스 부분 입니다 -->
<div class="card border-secondary mb-3" id="dropdown-bus">
  <h2 class="card-header"><img src="./00image/bus.png" class="bus">  버스<button onclick="reLOAD()" class="btn btn-outline-secondary" id="reButton" type="button"><img src="./00image/reload.png" style="border:0px"/></button></h2>
  

  <div class="card-body">   
    <div class = "realBus">
      <span class="busName">1164</span><br>

      <?php
      
            $busRoute = "100100171"; //1164
            $GIRUEM = "107000239"; //길음역
            $BUKAK = "107000274"; //북악관

             //길음역 정보 (stId)
            $query = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRouteAll?serviceKey=v%2Br7RiBgnB46KIkpgzFQwsR7Criyo6Qp9FaowpxZm0W7bJlJL1Kt7K%2F6ffMdWR4Ue4Y9fJul1JvsJ5LCML6sdQ%3D%3D&busRouteId=";


            $url_1164 = $query.$busRoute;
            $html = file_get_contents($url_1164);
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
              }
              echo "<span class=stName>".$stName."</span><br>";
              echo "<div class=arrTime>".$firstBus."<br>".$secondBus."</div>";
              ?>
              <hr>

              <span class="busName">2115</span><br>
              <?php

            $busRoute = "100100598"; //2115
            $SUNGSIN = "107000175"; //sungsin
            $BUKAK_2115 = "107000274"; // 서경에서 성신으로

             //성신 정보 (stId)
            $query = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRouteAll?serviceKey=v%2Br7RiBgnB46KIkpgzFQwsR7Criyo6Qp9FaowpxZm0W7bJlJL1Kt7K%2F6ffMdWR4Ue4Y9fJul1JvsJ5LCML6sdQ%3D%3D&busRouteId=";


            $url_2115 = $query.$busRoute;
            $html = file_get_contents($url_2115);
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
                    if($diff1 === $SUNGSIN){
                      //echo "true"."<br>";
                      $stName = $result['msgBody']['itemList'][$i]['stNm'];
                      $firstBus = $result['msgBody']['itemList'][$i]['arrmsg1'];
                      $secondBus = $result['msgBody']['itemList'][$i]['arrmsg2'];
                    }
                  }
                  else
                  {
                    if($diff1 === $BUKAK_2115){
                      //echo "true"."<br>";
                      $stName = $result['msgBody']['itemList'][$i]['stNm'];
                      $firstBus = $result['msgBody']['itemList'][$i]['arrmsg1'];
                      $secondBus = $result['msgBody']['itemList'][$i]['arrmsg2'];
                    }
                  }
                }
              }
              echo "<span class=stName>".$stName."</span><br>";
              echo "<div class=arrTime>".$firstBus."<br>".$secondBus."</div>"; 
              ?>
              <hr>
            </div>
            <script type="text/javascript">
              function timer() {
                var now = new Date();
                var min = now.getMinutes();
                var sec = now.getSeconds();
                min = checkTime(min);
                sec = checkTime(sec);
                var timeAlert = now.getHours() + " : " + min + " : " + sec;
                document.getElementById('busTime').innerHTML=timeAlert;

                setTimeout("timer()", 1000); 
              }

              function checkTime(i) {
                if (i<10) { i = "0" +i};
                return i;
              }          
            </script>
            <div class="realBus2"> 
              <span class="busName">셔틀버스</span>
              <div id="busTime">
                <script>
                  timer();
                </script>
              </div>
              <div id="shuttle">
                <script type="text/javascript">
                  time();
                </script>
              </div>

            </div>
            <br/>

            <script>
              function reLOAD() {
                $('.realBus').fadeOut('slow').load(document.URL + ' .realBus').fadeIn('slow');
                $('.realBus2').fadeOut('slow').fadeIn('slow');
                time();
              }
            </script>
            

            <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#shuttleTable" aria-expanded="false" aria-controls="shuttleTable"><h3>셔틀버스 시간표</h3></button>
            <div class="collapse" id ="shuttleTable">
              <div class="table-responsive">
                <table class="table">
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
          </div>
        </div>
        <!-- 지도 부분 입니다 -->
        <div class="card border-secondary mb-3" id="dropdown-map">
          <h2 class="card-header"><img src="./00image/map-location.png" class="map">  지도   
            <!-- 카테고리 숨기기 버튼과 드래그 on off 버튼입니다. -->      
            <button class="btn btn-outline-secondary btn pull-right" onclick="doDisplay()"><h4>category</h4></button>
            <button class="btn btn-outline-secondary btn pull-right" onclick="changeDrag()"><h4>drag</h4></button>
          </h2>
          <div class="card-body">
            <div class="map_wrap">
              <div id="map"></div>
              <ul id="category"> <!-- 카테고리 출력 부분입니다 -->
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
            <!-- 줌 인 줌 아웃 부분입니다. -->
            <div class="custom_zoomcontrol radius_border"> 
             <span onclick="zoomIn()" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
             <span onclick="zoomOut()" class="glyphicon glyphicon-minus" aria-hidden="true"></span>
           </div>
         </div>
       </div>
     </div>   

     
     <!-- 도서관 좌석 부분 입니다 -->
     <div class="card border-secondary mb-3" id="dropdown-library">
      <section class="card-header">
        <h2><img src="./00image/reading.png" class="reading">  도서관좌석정보</h2>
        <ul class="nav nav-tabs">
          <li class="nav-item active">
            <a href="#ltab0" data-toggle="tab"><h3>7층</h3></a></li>
            <li>
              <a href="#ltab1" data-toggle="tab"><h3>8층</h3></a></li>
              <li>
                <a href="#ltab2" data-toggle="tab"><h3>Green</h3></a></li>
                <li>
                  <a href="#ltab3" data-toggle="tab"><h3>Blue</h3></a></li>
                  <li>
                    <a href="#ltab4" data-toggle="tab"><h3>Orange</h3></a></li>
                    <li>
                      <a href="#ltab5" data-toggle="tab"><h3>Red</h3></a></li>
                    </ul>
                  </section>
                  <div class="tab-content card-body">
                    <?php
                    $room_name=array("7층","8층","GREEN ROOM","BLUE ROOM","ORANGE ROOM","RED ROOM");
                    $room_stat=array("열람실 상태:","전체좌석 : ","사용좌석 : ","잔여좌석 : ","");
                    $command=escapeshellcmd('python ./00python/Library_seat.py');
                    exec($command,$out,$stat);
        
                    $number_of_room=count($room_name);
                    $number_of_info=5;
                    for($i=0;$i<$number_of_room;$i++) {
                      // 첫번째 탭을 active시키기 위해 조건으로 구분
                      if($i==0) echo "<div class=\"tab-pane active\" id=\"ltab".$i."\"><section>";
                      else echo "<div class=\"tab-pane\" id=\"ltab".$i."\"><article>";
                      // 전체 좌석정보가 일차원 배열로 저장되어 있으며 이를 구분해 출력
                      for($j=1;$j<=$number_of_info;$j++) {
                        echo "<article class=\"lib".($j-1)."\">".$room_stat[$j-1].iconv("EUC-KR","UTF-8",$out[($i*$number_of_info)+$j-1])."</article>";
                        if(($j%$number_of_info)==1) echo "<hr>";
                      }
                      echo "</section></div>";
                    }
                    ?>
                  </div>
                </div>


                <div class="card border-secondary mb-3" id="dropdwon-insta">
                  <h2 class="card-header"><img src="./00image/instagram.png" class="insta">  서경대학교 Instagram</h2>
                  <div id="snspost_body">
                  </div>   
                </div>

                <!-- ******여기부터 --> 

<!--       <div class="card border-secondary mb-3" id="dropdown-todaymenu">
        <h5 class="card-header">오늘 점심은?</h5>
        <div id="data"></div>
      </div> -->
    </div>
    <!-- 여기까지 --> 
    

    <footer>
      <div id="footer_contents">
        <div id=footer_contents_text>
          <p class="footer_texts">[02713] 서울시 성북구 서경로 124(정릉동 16-1)</p>
          <p class="footer_texts">Tel : 02 940 7114</p>
          <p class="footer_texts">Fax : 02 919 0345</p>
        </div>
        <div id=footer_contents_logo>
          <img id="footer_logo_png" src="./00image/logo_footer_kr.png">
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="./00js/map.js?ver=1"></script>
  </body>
  </html>

