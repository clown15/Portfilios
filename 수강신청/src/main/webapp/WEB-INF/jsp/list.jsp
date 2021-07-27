<%@ page language="java" contentType="text/html; charset=euckr"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
</head>
<body>
	<h1>Member List</h1>
	<ul>
		<c:forEach var="users" items="${users}" varStatus="status">
			<li>${status.index+1 }:${users.name },${users.PW },
				${users.dept }</li>
		</c:forEach>
	</ul>

</body>
</html>