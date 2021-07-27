<%@ page language="java" contentType="text/html; charset=utf-8"%>	
<%@ taglib prefix="c"   uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap - 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<!-- Bootstrap - 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- css -->
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/modal_size.css">
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/index.css?v=1">

<script type="text/javascript">
	if("${id}"==-1) alert("아이디가 존재하지 않습니다.");
	else if("${id}"!="") alert("아이디:${id} 입니다.");
	if("${ch_pw}"==1) alert("비밀번호가 변경되었습니다.");
</script>
</head>
<body>
<div id="out">
	<div id="center">
		<div id="form">
			<form action="logincheck" method="post">
				<div class="form-group row">
					<div class="col-sm-10">
						<input type="text" name="id" class="form-control form-control-lg text" placeholder="아이디를 입력하세요.">
					</div>
				</div>
				<div class="forform-group row">
					<div class="col-sm-10">
						<input type="password" name="pw" class="form-control form-control-lg" placeholder="비밀번호를 입력하세요."><br/>
					</div>
				</div>
				<input type="submit" value="login" id="btn_login" class="btn btn-primary btn-lg btn-block"/><br/>
				<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#my80sizeCenterModal">
				  아이디/비밀번호 찾기
				</button><br>
				<input type="button" value="학생 회원가입" onclick="location.href='ST_SignUp'" class="semi_btn"/>
				<input type="button" value="교수 회원가입" onclick="location.href='PF_SignUp'" class="semi_btn"/>		
			</form>
		</div>
	</div>
</div>
	<!-- 80% size Modal -->
<div class="modal modal-center fade" id="my80sizeCenterModal" tabindex="-1" role="dialog" aria-labelledby="my80sizeCenterModalLabel">
  <div class="modal-dialog modal-80size modal-center" role="document">
    <div class="modal-content modal-80size">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">아이디/비밀번호 찾기</h4>
      </div>
      <div class="modal-body">
        <form action="./" method="post">
        	<p>아이디 찾기</p>
        	<hr>
        	<div class="forform-group row">
				<div class="col-sm-10">
        			<input type="text" name="name" class="form-control form-modal" placeholder="이름을 입력하세요."/>
        		</div>
        	</div>
        	<div class="forform-group row">
				<div class="col-sm-10">
        			<input type="text" name="phone" class="form-control form-modal" placeholder="전화번호를 입력하세요."/>
        		</div>
        	</div>
        	<input type="submit" value="찾기" class="btn btn-primary"/>
        </form><br><br>
        
        <form action="./" method="post">
        	<p>비밀번호 찾기</p>
        	<hr>
        	<div class="forform-group row">
				<div class="col-sm-10">
        			<input type="text" name="id" class="form-control form-modal" placeholder="아이디를 입력하세요."/>
        		</div>
        	</div>
        	<div class="forform-group row">
				<div class="col-sm-10">
					<input type="text" name="phone" class="form-control form-modal" placeholder="전화번호를 입력하세요."/>
				</div>
			</div>
        	<input type="submit" value="찾기" class="btn btn-primary"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>