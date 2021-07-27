<%@ page language="java" contentType="text/html;charset=UTF-8" pageEncoding="utf-8"%>
<%@ page import="java.util.*" %>
<%@ page import="com.example.demo.Lecture" %>
<html>
	<head> <title> Home page </title> </head>
	<body>
	
	 <jsp:include page="test.jsp" flush="false" />
		<h1> 강좌정보 </h1>
		<%
			List<Lecture> lectures = (List<Lecture>)request.getAttribute("lectures");
			for(int i=0; i<lectures.size(); i++) {
				out.println("강좌번호 = " + lectures.get(i).getID() + "<br/>강좌명 = " + lectures.get(i).getName()
						+"<br/>학과 = "+lectures.get(i).getDept()+"<br/>시간 = "+lectures.get(i).getTime()+"<br/>교수아이디 = "
						+lectures.get(i).getPro_id()+ "<br/>");
			}
		%>
		
	</body>
</html>