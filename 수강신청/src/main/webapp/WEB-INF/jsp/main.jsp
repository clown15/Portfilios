<%@ page language="java" contentType="text/html; charset=utf-8"%>
<%@ taglib prefix="c"   uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="EUC-KR">
<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- css -->
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/back_ground.css">
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/main.css?v=2">

<script type="text/javascript">
$(document).ready(function() {
	var btn=document.getElementsByClassName('btn');
	var nav=document.getElementsByTagName('li');
	if("${grade}"!="0") {
		btn[0].style.display='none';
		btn[1].style.display='none';

		nav[1].style.display='none';
		nav[2].style.display='none';
	}
	else {
		btn[2].style.display='none';
		btn[3].style.display='none';

		nav[3].style.display='none';
		nav[4].style.display='none';
	}
});		
</script>
</head>
<body>
<div id="out">
<jsp:include page="test.jsp" flush="false" />
<div id="middle">
	<div id="content">
		<div id="info">
		<table>
			<tr><td colspan="2" align="center" id="title">[ 내정보 ]</td></tr>
			<tr></tr>
			<tr>
				<td class="label">ID</td>
				<td align="right">${info[0] }</td>
			</tr>
			<tr>
				<td class="label">이름</td>
				<td align="right">${info[1] }</td>
			</tr>
			<tr>
				<td class="label">학과</td>
				<td align="right">${info[2] }</td>
			</tr>
			<tr>
				<td class="label">학년</td>
				<td align="right">${info[3] }</td>
			</tr>
			<tr>
				<td class="label">전화번호</td>
				<td align="right">${info[4] }</td>
			</tr>
		</table>
		</div><br><br>
		
		<input type="button" id="button1" value="강좌등록" class="btn circle" onclick="location.href='form'"/>
		<input type="button" id="button2" value="개설 강좌" class="btn circle" onclick="location.href='lecture_list'"/>
		<input type="button" id="button3" value="수강신청" class="btn circle" onclick="location.href='enrol'"/>
		<input type="button" id="button4" value="신청내역" class="btn circle" onclick="location.href='enrol_list'"/>
		<input type="button" id="button5" value="LogOut" class="btn circle" onclick="location.href='./'"/>
	</div>
</div>	
</div>
</body>
</html>