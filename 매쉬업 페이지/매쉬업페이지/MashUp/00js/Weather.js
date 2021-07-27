//아이콘 적용 
function applyIcon(icon) {
  let selectedIcon;
  switch (icon) {
    case '01d':
      selectedIcon = "sun.png"
      break;
    case '01n':
      selectedIcon = "moon.png"
      break;
    case '02d':
    case '02n':
      selectedIcon = "cloudy.png"
      break;
    case '03d':
    case '03n':
    case '04d':
    case '04n':
      selectedIcon = "cloudy(1).png"
      break;
    case '09d':
    case '09n':
      selectedIcon = "light.png"
      break;
    case '10d':
    case '10n':
      selectedIcon = "umbrella.png"
      break;
    case '11d':
    case '11n':
      selectedIcon = "storm.png"
      break;
    case '13d':
    case '13n':
      selectedIcon = "snow.png"
      break;
    case '50d':
    case '50n':
      selectedIcon = "cloudy(2).png"
      break;
    default:
      selectedIcon = "rainbow.png"
  }
  return selectedIcon;
}


function parseWeather() 
{   
      loadJSON(function(response) 
      { 
          const CURRENT_LOCATION = document.getElementsByClassName('weather-content__overview')[0];  //현재 위치 클래스
          const CURRENT_TEMP = document.getElementsByClassName('weather-content__temp')[0];  //현재 온도 클래스
          const FORECAST = document.getElementsByClassName('component__forecast-box')[0];  //예보날씨 데이터 클래스
          var jsonData = JSON.parse(response);  //openweahtermap api 데이터 값 
          let city = jsonData["city"]; //지역 변수
          let dailyForecast = jsonData["list"];  //날씨 관련 변수
          let today_date = new Date();
          let today_month = today_date.getMonth()+1;
          let today__date = today_date.getDate();
          let days = ['일', '월', '화', '수', '목', '금', '토'];
          let today_day = days[today_date.getDay()];
         
           //현재 온도 클래스에 데이터 저장
          CURRENT_TEMP.innerHTML = `${Math.round(dailyForecast[0].temp.day)+"º"}<i class="wi ">${"<img src='./00image/"+applyIcon(dailyForecast[0].weather[0].icon)+"'>"}</i>
           <i class="wi wi-degrees"></i>`; 
          //현재 위치 클래스에 데이터 저장
          CURRENT_LOCATION.innerHTML = `<h1 id="today">${today_day+" "+today_month+"/"+today__date}</h1> <h2 id="current_location_h1">${city.name}</h2><br>
           <i class="current_location_small">${dailyForecast[0].weather[0].description}</i> `;

          //날짜별 데이터 
          dailyForecast.forEach(data => {
              let date = new Date(data.dt * 1000);
              let days = ['일', '월', '화', '수', '목', '금', '토'];
              let d_name = days[date.getDay()];
              let dayBlock = document.createElement("div");
              dayBlock.className = 'forecast__item ';
              dayBlock.innerHTML = `<div class="forecast-item__heading">${d_name}</div>
                <div class="forecast-item__info">
                <i class="wi ">${"<img src='./00image/"+applyIcon(data.weather[0].icon)+"'>"}</i> 
                <span class="degrees">${Math.round(data.temp.day)+"º"}
                <i class="wi wi-degrees"></i></span></div>`;
             
               $(FORECAST).append(dayBlock);
          });
                              
      });
}
function loadJSON(callback) //url의 json 데이터 불러오는 함수
{ 
  
  //geolocation API를 이용하여 위치값 받기 
/* if("geolocation" in navigator) {
    
    navigator.geolocation.getCurrentPosition(function(position) {
       lat = position.coords.latitude; //위도
       lon = position.coords.longitude;  //경도 
      
    })
  } else {
    alert("geolocation not available" + e);
  } */

     var url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=seoul,kr&cnt=7&units=metric&APPID=047ea91a02e19c4e493ceb04d81879f6";
     var request = new XMLHttpRequest();
     request.overrideMimeType("application/json"); //데이터를 json type으로 처리
     request.open('GET', url, true);
     request.onreadystatechange = function () 
      {
        if (request.readyState == 4 && request.status == "200") 
        {
          callback(request.responseText);
        }
      };

     request.send(null);

}

//시작시 실행 
$(document).ready( function()
{
  parseWeather();
});