<<<<<<< HEAD
<%@ page language="java" contentType="text/html; charset=utf-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
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
<style>
table, th, td {
margin-top:20px;
    border: 3px solid #ffffff;
    border-collapse: collapse;
    text-align: center;
    width : 50px;
    height: 10px;
}
th, td {
    padding: 20px;
}
th {
    text-align: center;
}
.main_form{
margin: 90px auto;}

input[type=submit] {
-webkit-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   -moz-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   -ms-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   -o-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   display: block;
   margin: 20px auto;
   max-width: 180px;
   text-decoration: none;
   border-radius: 10px;
   padding: 20px 30px;
   background: #D1B4D0;
   border:0;
   outline:0;
   
}

input[type=submit]:hover {
   background: #BCA9F5;
   
}
.abc{
margin-top:-30px;
font-weight: bold ;
font-size:30px;
}
</style>
</head>
<body>
<jsp:include page="test.jsp" flush="false" />
    <jsp:include page="jointest.jsp" flush="false" />
   
   <c:if test="${row eq -1 }">
      <script>alert("일정이 존재합니다.");</script>
   </c:if>
   <form action="calendar" method="post" class="main_form">
   <p class="abc">${list[0].name }</p>
      <input type="hidden" name="l_id" value=${l_id }/>
      
   <label>
    <p class="label-txt"></p>
    <input type="date" class="input" name="date">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
   <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="content" placeholder="내용을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
      
      <button type="submit">추가</button></br>
   </form>
   
      <table style="width:100%">
    <caption></caption>
      <thead>
         <tr>
            <th bgcolor="#FEB9BE">내용</th>
            <th bgcolor="#FEB9BE">날짜</th>
            <td bgcolor="#FEB9BE"></td>
         </tr>
      </thead>
      <tbody>
      <c:if test="${!empty list[0].content}">
         <c:forEach var="list"   items="${list }">
            <tr>
               <td bgcolor="#CFE7FF">${list.content }</td>
               <td bgcolor="#efefef">${list.date }</td>
               <td bgcolor="#efefef">
                  <form action="del_cal" method="post" class="talbe_form" style="background: #efefef;">
                     <input type="hidden" name="date" value=${list.date }/>
                     <input type="hidden" name="l_id" value=${list.l_id }/>
                     <input type="submit" value="삭제"/>
                  </form>
               </td>
            </tr>
         </c:forEach>
      </c:if>
      </tbody>
      </table>
      </form>
</body>
=======
<%@ page language="java" contentType="text/html; charset=utf-8"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
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
<style>
table, th, td {
margin-top:20px;
    border: 3px solid #ffffff;
    border-collapse: collapse;
    text-align: center;
    width : 50px;
    height: 10px;
}
th, td {
    padding: 20px;
}
th {
    text-align: center;
}
.main_form{
margin: 90px auto;}

input[type=submit] {
-webkit-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   -moz-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   -ms-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   -o-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
   display: block;
   margin: 20px auto;
   max-width: 180px;
   text-decoration: none;
   border-radius: 10px;
   padding: 20px 30px;
   background: #D1B4D0;
   border:0;
   outline:0;
   
}

input[type=submit]:hover {
   background: #BCA9F5;
   
}
.abc{
margin-top:-30px;
font-weight: bold ;
font-size:30px;
}
</style>
</head>
<body>
<jsp:include page="test.jsp" flush="false" />
    <jsp:include page="jointest.jsp" flush="false" />
   
   <c:if test="${row eq -1 }">
      <script>alert("일정이 존재합니다.");</script>
   </c:if>
   <form action="calendar" method="post" class="main_form">
   <p class="abc">${list[0].name }</p>
      <input type="hidden" name="l_id" value=${l_id }/>
      
   <label>
    <p class="label-txt"></p>
    <input type="date" class="input" name="date">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  
   <label>
    <p class="label-txt"></p>
    <input type="text" class="input" name="content" placeholder="내용을 입력하세요">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
      
      <button type="submit">추가</button></br>
   </form>
   
      <table style="width:100%">
    <caption></caption>
      <thead>
         <tr>
            <th bgcolor="#FEB9BE">내용</th>
            <th bgcolor="#FEB9BE">날짜</th>
            <td bgcolor="#FEB9BE"></td>
         </tr>
      </thead>
      <tbody>
      <c:if test="${!empty list[0].content}">
         <c:forEach var="list"   items="${list }">
            <tr>
               <td bgcolor="#CFE7FF">${list.content }</td>
               <td bgcolor="#efefef">${list.date }</td>
               <td bgcolor="#efefef">
                  <form action="del_cal" method="post" class="talbe_form" style="background: #efefef;">
                     <input type="hidden" name="date" value=${list.date }/>
                     <input type="hidden" name="l_id" value=${list.l_id }/>
                     <input type="submit" value="삭제"/>
                  </form>
               </td>
            </tr>
         </c:forEach>
      </c:if>
      </tbody>
      </table>
      </form>
</body>
>>>>>>> master
</html>