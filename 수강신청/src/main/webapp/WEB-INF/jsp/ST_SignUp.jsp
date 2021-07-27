<<<<<<< HEAD
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
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/index.css?v=1">
<style type="text/css">
.abc{
margin-bottom:30px;
font-weight: bold ;
font-size:30px;
}
</style>
<title>Insert title here</title>
</head>
<body>
<jsp:include page="jointest.jsp" flush="false" />
   <script>
      if("${result}"==-1) alert("회원가입 오류");
         else if("${result}"==1){
            alert("회원가입 성공");
            location.href="/DB_MVC/";
      }
   </script>
   <form action="ST_SignUp" method="post">
   <p class="abc">학생 회원가입</p>
   <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="id" placeholder="학번을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
  <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="name" placeholder="이름을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
  <label>
    <p class="label-txt"></p>
    <input type="password" class="input" name="pw" placeholder="비밀번호를 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
  <label>
    <p class="label-txt"></p>
    <input type="number" class="input" name="grade" placeholder="학년을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
  <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="dept" placeholder="학과를 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
    <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="phone" placeholder="전화번호를 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
   
      <button type="submit">회원가입</button>
   </form>
</body>
=======
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
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/index.css?v=1">
<style type="text/css">
.abc{
margin-bottom:30px;
font-weight: bold ;
font-size:30px;
}
</style>
<title>Insert title here</title>
</head>
<body>
<jsp:include page="jointest.jsp" flush="false" />
   <script>
      if("${result}"==-1) alert("회원가입 오류");
         else if("${result}"==1){
            alert("회원가입 성공");
            location.href="/DB_MVC/";
      }
   </script>
   <form action="ST_SignUp" method="post">
   <p class="abc">학생 회원가입</p>
   <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="id" placeholder="학번을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
  <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="name" placeholder="이름을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
  <label>
    <p class="label-txt"></p>
    <input type="password" class="input" name="pw" placeholder="비밀번호를 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
  <label>
    <p class="label-txt"></p>
    <input type="number" class="input" name="grade" placeholder="학년을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
  <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="dept" placeholder="학과를 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
    <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="phone" placeholder="전화번호를 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
   
      <button type="submit">회원가입</button>
   </form>
</body>
>>>>>>> master
</html>