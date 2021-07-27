
function getdate() {
	var date=new Date();

	return format_date(date);
}
function format_date(date){
	var out=date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();

	return out;
}
window.onload=function(){
	var day=getdate();
		$.ajax({
			headers:{"accesstoken":"PFjg02izVgGD2nwaXzI07D9gYTcipIKgvAjOfhzQjPPESYsMOU"},//받아온 토큰값
			type:'GET', //get방식으로 받아오기
			dataType:'json',//json형식으로 파일받기
			url:'https://bablabs.com/openapi/v1/campuses/InIcJXLgkC/stores?date='+day,	//날짜부분 변수로 바꿔보기
			success:function(data){
				var out=new Array();
				$.each(data.stores,function(i,store){
					out[i]="<div class=\"font1\">"+store.name+"</div>"+day+"<br><ul>";
					if(store.menu_description==null){
						$.each(store.menus,function(j,value){
							out[i]+="<li class=\"font2\">"+value.description+"</li>";
						})
					} //json파일을 data로 칭함, data의2번째 stores의 배열 mensu의 descriptiond의 값들을 불러오기 위해 사용	
						//반복문을 통해 두번째 식당의 메뉴 정보 가져오기(menus가 배열)
					else
						out[i]+="<li id=\"font2\">식당에서 식단을 업로드하지 않았습니다.</li>";
						$('.dataArea'+i).append(out[i]+"</ul>");	//메뉴들이 저장된 변수 out를 dataArea id에 추가 하기
						// document.write(out[i]+"<br>");
				})

			},
			error:function(){
				alert("error");
			}
		});
}