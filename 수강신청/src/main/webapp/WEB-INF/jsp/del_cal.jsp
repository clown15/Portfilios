<%@ page language="java" contentType="text/html; charset=euckr"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/back_ground.css">
</head>
<body>
<c:choose>
	<c:when test="${result eq true }">
		<script>
			alert('���� ����')
			location.href="calendar?l_id=${l_id}";
		</script>
	</c:when>
	<c:when test="${result eq false }">
		<script>
			alert('���� ����')
			location.href="calendar?l_id=${l_id}";
		</script>
	</c:when>
</c:choose>
<form action="calendar">
	<input type="hidden" name="l_id" value=${l_id }/>
	<input type="submit" value="Ȯ��"/>
</form>
</body>
</html>