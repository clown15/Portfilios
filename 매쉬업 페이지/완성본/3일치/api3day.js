const Term=3;
// $(document).ready(
function week() {
	var date=new Array();
	for(var i=0;i<Term;i++) {
		date[i]=new Date();
		date[i].setDate(date[i].getDate()+i-5);	//date[0]에 저장되어있는 값을 일요일 날짜로 만들기 위함
		// date[0].getDay()
		//date.getDay를통해 요일차이를 해결
	}
	return format_date(date);
}
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
			url:'https://bablabs.com/openapi/v1/campuses/InIcJXLgkC/stores?date='+day[i],	//날짜부분 변수로 바꿔보기
			success:function(data){
				$.each(data.stores,function(count,store){
					out[i][count]="<h2>"+store.name+"</h2>"+day[i]+"<br>";
					if(store.menu_description==null){
						$.each(store.menus,function(index,value){
							out[i][count]+=value.description+"<br>";
						})
					}
					else out[i][count]+="식당에서 식단을 업로드하지 않았습니다";
				 //json파일을 data로 칭함, data의2번째 stores의 배열 mensu의 descriptiond의 값들을 불러오기 위해 사용	
				//반복문을 통해 두번째 식당의 메뉴 정보 가져오기(menus가 배열)
				//결과적으로 data.stores[0].menus[index].description의 값을 출력
				$('#dataArea'+i+count).append(out[i][count]);	//메뉴들이 저장된 변수 out를 dataArea id에 추가 하기
				})
			},
			error:function(){
				alert("error");
			}
		});
	}
}