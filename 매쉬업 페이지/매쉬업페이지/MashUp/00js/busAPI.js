		function time() {
		 //time을 다뤄주는 함수 Date() 객체에서 현재 시간 얻어오기
	
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			makeTable(h,m);	//셔틀버스 남는 시간 나타내주는 함수
		}

		function checkTime(i) { //필요없을 수도..
			if (i<10) { i = "0" +i};
			return i;
		}

		function makeTable(h,m) { //셔틀버스 남는 시간 계산 함수
			var eight=[10,22,30,37,44,50]; //8시의 분단위 ex) 8:10, 8:22, 8:30...
			var nine=[5,25,45,55]; //9시
			var ten=[10,17,24,35,50];
			var eleven=[5,20,30,40,50];
			var twelve=[0,20,40];

			var diff= ''; //시간 차이
			var alert2 =''; //문서에 붙일 문장 ex) 출발 약 ____분 전
			var alert_1 ='';
			var _h;
			var busMin;

			if( h>=8 && h<13) { //셔틀버스 정보가 뜨는 시간(8시~ 13시)
				if(h >=8 && h< 9) { //만약 8시 이후라면
					for(var i=0; i<eight.length; i++) {
						if(m>=eight[i] && m < eight[i+1]){//전 시간대보다는 크면서 다음 버스 시간대보다는 작아야함.
							diff = eight[i] - m;
							busMin = eight[i];
							_h = h;

						}
						else if(m<=eight[0]) { //현재시간이 8시 5분이라면 10분에서 현재분 뺴주기
							diff = eight[0] -m;
							busMin = eight[0];
							_h = h;

						}
						else if(m>=eight[0] && m<=eight[1]) //ex) 8:15 분일 경우 배열의 0과 1만 탐색하도록
						{
							diff = eight[1] - m; 
							busMin = eight[1];
							_h = h;
						}
						else if(m > eight[eight.length - 1]){ //8시 55분일 경우 (마지막 배열보다 클 때)
							diff = (60-m) + nine[0];
							busMin = nine[0];
							_h = h+1;

						}
				}}
				else if(h>=9 && h<10) { //만약 9시 이후라면
					for(var i=0; i<nine.length; i++) {
						if(m > nine[i-1] && m<=nine[i]){
							diff = nine[i] - m;
							busMin = nine[i];
							_h = h;
						}
						else if(m<=nine[0]) {
							diff = nine[0] -m;
							busMin = nine[0];
							_h = h;
						}
						else if(m>=nine[0] && m<=nine[1])
						{
							diff = nine[1] - m;
							busMin = nine[1];
							_h = h;
						}
						else if(m > nine[nine.length - 1]){
							diff = (60-m) + ten[0];
							busMin = ten[0];
							_h = h+1;
						}
				}}			
				else if(h >=10 && h< 11) { //만약 10시 이후라면
					//var ten=[10,17,24,35,50];
					for(var i=0; i<ten.length; i++) {
						if(m > ten[i-1] && m<=ten[i]){
							diff = ten[i] - m;
							busMin = ten[i];
							_h = h;
						}
						else if (m<ten[0]) {
							diff = ten[0] - m;
							busMin = ten[0];
							_h = h;
						}
						else if(m>=ten[0] && m<=ten[1])
						{
							diff = ten[1] - m;
							busMin = ten[1];
							_h = h;
						}
						else if(m > ten[ten.length - 1]){
							diff = (60-m) + eleven[0];
							busMin = eleven[0];
							_h = h+1;

						}
				}}
				else if(h >=11 && h < 12) { //만약 11시 이후라면
					for(var i=0; i<eleven.length; i++) {
						if( m> eleven[i-1]&&m<=eleven[i]){ 
							diff = eleven[i] - m;
							busMin = eleven[i];
							_h = h;
						}
						else if (m<=eleven[0]) {
							diff = eleven[0] - m;
							busMin = eleven[0];
							_h = h;
						}
						else if(m>=eleven[0] && m<=eleven[1])
						{
							diff = eleven[1] - m;
							busMin = eleven[1];
							_h = h;
						}
						else if(m > eleven[eleven.length - 1]){
							diff = (60-m) + twelve[0];
							busMin = twelve[0];
							_h = h+1;
						}
				}}
			
			else if(h>=16 && h <17) { //만약 12시 이후라면
				for(var i=0; i<twelve.length; i++) {
					if(m<=twelve[i] && m> twelve[i-1]) {
						diff = twelve[i] - m;
						busMin = twelve[i];
							_h = h;
					}
					else if (m<=twelve[0]) {
						diff = twelve[0] - m;
						busMin = twelve[0];
							_h = h;
					}
					else if(m>=twelve[0] && m<=twelve[1])
					{
						diff = twelve[1] - m;
						busMin = twelve[1];
							_h = h;
					}
					else if(m > twelve[twelve.length - 1]){
						diff = (60-m);
						busMin = 0;
							_h = h+1;
					}
			}}
				alert2 = _h + '시 '+ busMin + '분 버스 대기 중</br>'+'약 ' + diff +'분 후 출발</br>'; //해당 시간차(diff)를 받아 남는 시간 문장 작성
			}	
			else {
				alert2 = '등교시간 셔틀버스는 종료되었습니다.</br>'; //13시 이후에는 제공하지 않음
			}							

		$('#shuttle').html(alert2); //남는 시간 문장을 html 코드에 붙여줌.
	}

