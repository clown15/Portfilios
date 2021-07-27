<script src="./jquery.js"></script>
/* 날짜 객체 받아서 문자열로 리턴하는 함수 */
function getDateStr(myDate){
	return (myDate.getFullYear() + '-' + (myDate.getMonth() + 1) + '-' + myDate.getDate())
}

/* 오늘 날짜를 문자열로 반환 */
function today() {
  var d = new Date()
  return getDateStr(d)
}

/* 오늘로부터 1주일전 날짜 반환 */
function lastWeek() {
  var d = new Date()
  var dayOfMonth = d.getDate()
  d.setDate(dayOfMonth - 7)
  return getDateStr(d)
}

/* 오늘로부터 1개월전 날짜 반환 */
function lastMonth() {
  var d = new Date()
  var monthOfYear = d.getMonth()
  d.setMonth(monthOfYear - 1)
  return getDateStr(d)
}
$(".srch_area :radio").click(function(){
  var rname = $(this).attr("name")
  $("#search_end_date").val(today())
	if( rname == "today"){
    $("#search_start_date").val(today())
  }else if(rname == "week") {
  	$("#search_start_date").val(lastWeek())
  }else{
  	$("#search_start_date").val(lastMonth())
  }
})
