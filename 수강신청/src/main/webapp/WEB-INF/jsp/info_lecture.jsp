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

form{
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

.wrap {
  width: 60%;
  margin: 60px auto;
  background: #ffffff;
  padding: 60px 120px 80px 120px;
  text-align: center;
  -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
  box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}

.abc{
margin-top:-30px;
margin-bottom:20px;
font-weight: bold ;
font-size:30px;
}
</style>

</head>
<body>
<jsp:include page="test.jsp" flush="false" />
    <jsp:include page="jointest.jsp" flush="false" />
    <div class="wrap">
   <table style="width:100%">
   <caption class="abc">${list[0].name }</caption>
         <thead>
            <tr>
               <th bgcolor="#FEB9BE">내용</th>
               <th bgcolor="#FEB9BE">날짜</th>
            </tr>
         </thead>
         <tbody>
         <c:if test="${!empty list[0].content}">
            <c:forEach var="list"   items="${list }">
               <tr>
                  <td bgcolor="#CFE7FF">${list.content }</td>
                  <td bgcolor="#efefef">${list.date }</td>
               </tr>
            </c:forEach>
         </c:if>
         </tbody>
   </table>
   </div>

</body>
</html>