<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="utf-8"%>
<html>
    <head> 
    	<title> Enroll Page </title> 
<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- css -->
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/back_ground.css">
    	
<script type="text/javascript">
$(document).ready(function() {
	var nav=document.getElementsByTagName('li');
	if("${grade}"!="0") {
		nav[1].style.display='none';
		nav[2].style.display='none';
	}
	else {
		nav[3].style.display='none';
		nav[4].style.display='none';
	}
});
</script>
</head>
 
    <body>
    
    <jsp:include page="test.jsp" flush="false" />
    <jsp:include page="jointest.jsp" flush="false" />
      	
       <form action="formcheck" method="post" >
  <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="ID" placeholder="과목번호를 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="Name" placeholder="과목명을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="Dept" placeholder="학과를 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
 
   
    
 <label>시간 </label>
    <select name="Time" id="Time">
      <option value="1">Mon9</option>
      <option value="2">Tue9</option>
      <option value="3">Wed9</option>
      <option value="4">Thu9</option>
      <option value="5">Fri9</option>
      <option value="6">Mon12</option>
      <option value="7">Tue12</option>
      <option value="8">Wed12</option>
      <option value="9">Thu12</option>
      <option value="10">Fri12</option>
      <option value="11">Mon15</option>
      <option value="12">Tue15</option> 
      <option value="13">Wed15</option>
      <option value="14">Thu15</option>
      <option value="15">Fri15</option>
    </select>
   

   
   <%
 
   // session 받아서 
   //session 받은거 넣고
   
   %>
  
    <input type="hidden" class="input" name="PRO_ID" value=${PRO_ID}>
    

  <button type="submit">추가</button>
</form> 
        
         
    </body>
</html>