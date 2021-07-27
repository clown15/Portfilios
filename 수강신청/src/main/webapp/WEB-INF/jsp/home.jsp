<%@ page language="java" contentType="text/html; charset=utf-8"%>
<%@ taglib prefix="c"   uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
</head>
<body>
	<c:if test="${!empty result}">
		ok
	</c:if>
	<form action="logincheck" method="post">
		ID:<input type="text" name="id"/><br/>
		PW:<input type="password" name="pw"/><br/>
		<input type="submit" value="login"/>
		<input type="button" value="SignUp" onclick="location.href='SignUp'"/>
	</form>
</body>
</html>