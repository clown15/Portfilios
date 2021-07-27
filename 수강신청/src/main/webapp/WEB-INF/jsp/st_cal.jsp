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
<h1>${list[0].name } 일정</h1>
<table border="1">
		<thead>
			<tr>
				<th>내용</th>
				<th>날짜</th>
				<td></td>
			</tr>
		</thead>
		<tbody>
		<c:if test="${!empty list[0].content}">
			<c:forEach var="list"	items="${list }">
				<tr>
					<td>${list.content }</td>
					<td>${list.date }</td>
					<td>
						<form action="del_cal" method="post">
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
<h1>${list[0].name } 일정</h1>
<table border="1">
		<thead>
			<tr>
				<th>내용</th>
				<th>날짜</th>
				<td></td>
			</tr>
		</thead>
		<tbody>
		<c:if test="${!empty list[0].content}">
			<c:forEach var="list"	items="${list }">
				<tr>
					<td>${list.content }</td>
					<td>${list.date }</td>
					<td>
						<form action="del_cal" method="post">
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
</body>
>>>>>>> master
</html>