<<<<<<< HEAD
<%@ page language="java" contentType="text/html; charset=utf-8"%>
<%@ taglib prefix="c"   uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
</head>
<body>
	<script>
		if("${result}"=="true") {
			alert("방문을 환영합니다.");
			location.href="main";
		}
		else {
			alert("아이디/비밀번호를 잘못입력했습니다.");
			location.href="./";
		}
	</script>
</body>
=======
<%@ page language="java" contentType="text/html; charset=utf-8"%>
<%@ taglib prefix="c"   uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<title>Insert title here</title>
</head>
<body>
	<script>
		if("${result}"=="true") {
			alert("방문을 환영합니다.");
			location.href="main";
		}
		else {
			alert("아이디/비밀번호를 잘못입력했습니다.");
			location.href="./";
		}
	</script>
</body>
>>>>>>> master
</html>