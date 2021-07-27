<%@ page language="java" contentType="text/html; charset=utf-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap - 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<!-- Bootstrap - 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- css -->
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/index.css?v=1">
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/semi_modal_size.css">
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/back_ground.css">

<script type="text/javascript">
$(document).ready(function() { 
	$('div.modal').modal();
});
console.log("${result}");
console.log("${id}");
if("${result}"=="false") {
	alert("아이디가 존재하지 않습니다.");
	location.href="./";
}
else if("${result}"!="") {
	
}
</script>
</head>
<body>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#my80sizeCenterModal" style="display:none">
		  아이디/비밀번호 찾기
		</button>
<div class="modal modal-center fade" id="my80sizeCenterModal" tabindex="-1" role="dialog" aria-labelledby="my80sizeCenterModalLabel">
  <div class="modal-dialog modal-80size modal-center" role="document">
    <div class="modal-content modal-80size">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">비밀번호 변경</h4>
      </div>
      <div class="modal-body">
        <form action="s_pw" method="post">
	        <div class="forform-group row">
				<div class="col-sm-10">
	        		<input type="password" name="pw" class="form-control form-modal" placeholder="비밀번호를 입력하세요."/>
	        	</div>
	        </div>
			<input type="hidden" name="result" value="${result }"/>
			<input type="hidden" name="id" value="${id }"/>
			<input type="submit" value="변경" class="btn btn-primary"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href='index'">닫기</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>