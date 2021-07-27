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
    border: 3px solid #ffffff;
    border-collapse: collapse;
    text-align: center;
    width : 50px;
    height: 10px;
}

th {
padding: 20px;
    text-align: center;
}
td {
    padding: 5px;
   
}
.wrap {
  width: 60%;
  margin: 80px auto;
  background: #ffffff;
  padding: 60px 120px 80px 120px;
  text-align: center;
  -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
  box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}

.abc{
margin-bottom:30px;
font-weight: bold ;
font-size:20px;
}

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


</style>
</head>
<body>
<jsp:include page="test.jsp" flush="false" />
<div class="wrap">
   <table style="width:100%">
    <caption class="abc">신청내역</caption>
      <thead>
         <tr>
            <th bgcolor="#FEB9BE">과목 번호</th>
            <th bgcolor="#FEB9BE">과목 이름</th>
            <th bgcolor="#FEB9BE">학과</th>
            <th bgcolor="#FEB9BE">강좌 시간</th>
            <th bgcolor="#FEB9BE">강의자</th>
            <th bgcolor="#FEB9BE"></th>
            <th bgcolor="#FEB9BE"></th>
         </tr>
      </thead>
      <tbody>
         <c:forEach var="lecture" items="${lecture }" varStatus="status">
            <tr>
               <!-- <td>${status.index+1 }</td> -->
               <td bgcolor="#CFE7FF">${lecture.ID }</td>
               <td bgcolor="#efefef">${lecture.name }</td>
               <td bgcolor="#efefef">${lecture.dept }</td>
               <td bgcolor="#efefef">
	               <c:choose>
		               	<c:when test="${lecture.time=='1' }">
		               		Mon 9
		               	</c:when>
		               	<c:when test="${lecture.time=='2' }">
		               		Tue 9
		               	</c:when>
		               	<c:when test="${lecture.time=='3' }">
		               		Wed 9
		               	</c:when>
		               	<c:when test="${lecture.time=='4' }">
		               		Thu 9
		               	</c:when>
		               	<c:when test="${lecture.time=='5' }">
		               		Fri 9
		               	</c:when>
		               	<c:when test="${lecture.time=='6' }">
		               		Mon 12
		               	</c:when>
		               	<c:when test="${lecture.time=='7' }">
		               		Tue 12
		               	</c:when>
		               	<c:when test="${lecture.time=='8' }">
		               		Wed 12
		               	</c:when>
		               	<c:when test="${lecture.time=='9' }">
		               		Thu 12
		               	</c:when>
		               	<c:when test="${lecture.time=='10' }">
		               		Fri 12
		               	</c:when>
		               	<c:when test="${lecture.time=='11' }">
		               		Mon 15
		               	</c:when>
		               	<c:when test="${lecture.time=='12' }">
		               		Tue 15
		               	</c:when>
		               	<c:when test="${lecture.time=='13' }">
		               		Wed 15
		               	</c:when>
		               	<c:when test="${lecture.time=='14' }">
		               		Thu 15
		               	</c:when>
		               	<c:when test="${lecture.time=='15' }">
		               		Fri 15
		               	</c:when>
	               </c:choose>
               </td>
               <td bgcolor="#efefef">${lecture.pro_id }</td>
               <td bgcolor="#efefef">
                  <form action="info_lecture" method="Get">
                     <input type="hidden" name="l_id" value=${lecture.ID }/>
                     <input type="submit" style="font-size:12pt; color:#fff; font-weight:bold;" value="수업 일정"/>
                  </form>
               </td>
               <td bgcolor="#efefef">
                  <form action="enrol_list" method="post">
                     <input type="hidden" name="l_id" value=${lecture.ID }/>
                     <input type="submit" style="font-size:12pt; color:#fff; font-weight:bold;" value="수강 철회"/>
                  </form>
               </td>
               <!-- <td>${vo.lecture.pRO_ID }</td> -->
            </tr>
         </c:forEach>
      </tbody>
   </table>
   </div>
</body>
</html>