$(document).ready(function() {
			alert("hello");
			$.ajaxSetup({
				beforeSend:function(request) {
					request.setRequestHeader("key":"Accesstoken","value":"PFjg02izVgGD2nwaXzI07D9gYTcipIKgvAjOfhzQjPPESYsMOU","key":"keyword","value":null);
				}
			})
			$.ajax({
				type : "get",
				url : "https://bablabs.com/openapi/v1/campuses",
				dataType : "json",
				// query {
				// 	keyword:null
				// },
				erroe : function() {
					alert('통신실패');
				},
				success : function(data) {
					alert("통신 데이터 값: "+data);
					$("#dataArea").html(data);
				}
			})
		})