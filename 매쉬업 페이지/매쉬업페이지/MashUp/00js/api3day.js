//식당의 개수
const Term=3;
// 현재날짜로 부터 3일치의 정보를 배열에 저장
function week() {
	var date=new Array();
	for(var i=0;i<Term;i++) {
		date[i]=new Date();
		date[i].setDate(date[i].getDate()+i);	//date[0]에 저장되어있는 값을 일요일 날짜로 만들기 위함
		// date[0].getDay()
		//date.getDay를통해 요일차이를 해결
	}
	return format_date(date);
}
// 숫자로 이루어진 날짜 정보를 정해진 형태에 맞춰 문자열로 저장
// ex)2018-07-20
function format_date(curdate) {
	var outdate=new Array();
	for(var i=0;i<Term;i++)
		outdate[i]=(curdate[i].getFullYear()+'-'+(curdate[i].getMonth()+1)+'-'+curdate[i].getDate());
	return outdate;
}
window.onload=function() {
	var day=week();
	var out=new Array();
	for(var i=0;i<Term;i++) {
		out[i]=new Array();
		$.ajax({
			headers:{"accesstoken":"PFjg02izVgGD2nwaXzI07D9gYTcipIKgvAjOfhzQjPPESYsMOU"},//받아온 토큰값
			type:'GET', //get방식으로 받아오기
			dataType:'json',//json형식으로 파일받기
			async:false,
			// 현재 서경대 학식정보가 없기 때문에 테스트를 위해 서강대의 학식정보를 가져옴
			// 서경대의 정보를 얻기 위해선 InIcJXLgkC대신 5vHtoBrQ7Y을 사용
			url:'https://bablabs.com/openapi/v1/campuses/InIcJXLgkC/stores?date='+day[i],	
			//밥대생api를 사용하기 위한 url형식 https://bablabs.com/openapi/v1/campuses/학교id/stores?date=원하는 날짜
			success:function(data){
				$.each(data.stores,function(count,store){
					//날짜를 식단 내용과 다른 class로 묶기위함 날짜는 font1 식단 정보는 font2 class로 묶음
					out[i][count]="<div class=\"font1\">"+day[i]+"</div>";
					if(store.menu_description==null){
						$.each(store.menus,function(index,value){
							out[i][count]+="<li class=\"font2\">"+value.description+"</li><br>";
						})
					}
					//식단 정보가 없는경우
					else out[i][count]+="<li class=\"font2\">식당에서 식단을 업로드하지 않았습니다</li><br>";
				 //json파일을 data로 칭함, data의2번째 stores의 배열 mensu의 descriptiond의 값들을 불러오기 위해 사용	
				//반복문을 통해 두번째 식당의 메뉴 정보 가져오기(menus가 배열)
				//결과적으로 data.stores[0].menus[index].description의 값을 출력
				$('.dataArea'+i+count).append(out[i][count]);	//메뉴들이 저장된 변수 out를 dataArea id에 추가 하기
				})
			},
			error:function(){
				alert("error");
			}
		});
	}
}
//추가 2일치 정보를 감추었다가 버튼 클릭시 2일치 정보를 보여주기 위한 함수들
function openfood0(){
	var tag1=document.getElementById('tomorrow0');

	if(tag1.style.display == 'none'){
		tag1.style.display = 'inline-block';
	}
	else {
		tag1.style.display = 'none';
	}
}
function openfood1(){
	var tag1=document.getElementById('tomorrow1');

	if(tag1.style.display == 'none'){
		tag1.style.display = 'inline-block';
	}
	else {
		tag1.style.display = 'none';
	}
}
function openfood2(){
	var tag1=document.getElementById('tomorrow2');

	if(tag1.style.display == 'none'){
		tag1.style.display = 'inline-block';
	}
	else {
		tag1.style.display = 'none';
	}
}