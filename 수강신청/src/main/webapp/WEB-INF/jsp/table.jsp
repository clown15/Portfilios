<%@ page language="java" contentType="text/html;charset=UTF-8" pageEncoding="utf-8"%>
    <%@ page import="java.util.*" %>
<%@ page import="com.example.demo.Lecture" %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- css -->
<link rel="stylesheet" type="text/css" href="${pageContext.request.contextPath }/css/back_ground.css">
<style>
table, th, td {
    border: 3px solid #EFEFEF;
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
margin-bottom:30px;
font-weight: bold ;
}
</style>
</head>
<body>
<script>
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
      if("${res}"==-1) {
         alert("강좌추가 오류");
         location.href="form";
      }
      else if("${res}"==1){
         alert("강좌추가 성공");
         location.href="table";
      }
   </script>
<jsp:include page="test.jsp" flush="false" />

<%
   // db 값 받아서 time[], lecture[] 초기화
   List<Lecture> lectures = (List<Lecture>)request.getAttribute("lectures");
   // time[i] = lecture.get(i).getTime();
   //String time[] = {"1","2", "3", "4", "5","6","7","8","9","10","11","12","13","14","15"}; //1,2,3,4,...,15
   //String lecture[] = {"문화와 역사2", " ", " "," "," "," "," "," "," "," "," "," ","정보통신융합공학개론", "화일구조", "참삶의길"}; //문화와 역사2, 정보통신융합공학개론, 화일구조, 참삶의길
    //String lecture[]
    String[] time=new String[15];
   String[] l_id=new String[15];
   for(int i=0;i<15;i++) time[i]="";
   for(int i=0;i<lectures.size();i++){
      //s[i]=lectures.get(i).
            int t= Integer.parseInt(lectures.get(i).getTime());
      time[t-1]=lectures.get(i).getName();
      l_id[t-1]=lectures.get(i).getID();
   }
%>
<div class="wrap">
<table style="width:100%">
 <caption class="abc">TIME TABLE</caption>
  <tr>
    <th bgcolor="#D1B4D0"> </th>
    <th bgcolor="#FEB9BE">MON</th> 
    <th bgcolor="#FEB9BE">TUE</th>
    <th bgcolor="#FEB9BE">WED</th>
    <th bgcolor="#FEB9BE">THU</th>
    <th bgcolor="#FEB9BE">FRI</th>
  </tr>
    <tr>
    <th bgcolor="#CFE7FF">1교시</th>
       <% 
          
          for(int i=0; i<5; i++) {
             if(time[i] == "")
                out.println("<td> </td>");
             else
                out.println("<td style=\"background : Plum;\" rowspan=\"2\">"+"<a href='info_lecture?l_id="+l_id[i]+"'>"+time[i]+"</a></td>");
          }                                                   // <a href='view?Name=ㅎㅎ'>
            
       
       
       %>
       <!-- 
       <td style = "background : Plum  ;" rowspan="2" >문화와 역사2</td> 
       <td> </td>
       <td style = "background : LavenderBlush ;" rowspan="2">정보통신융합공학개론</td>
       <td style = "background : Pink ;" rowspan="2">화일구조</td>
       <td style = "background : LightGoldenRodYellow;" rowspan="2">참삶의길</td>
        -->
   </tr>
    <tr>
    <th bgcolor="#CFE7FF">2교시</th>
   
  <% 
          for(int i=0; i<5; i++) {
             if(time[i] == "")
                out.println("<td> </td>");
                }
  %>
  </tr>
  
    <tr>
    <th bgcolor="#CFE7FF">3교시</th>
          <% 
          
          for(int i=5; i<10; i++) {
             if(time[i] == "")
                out.println("<td> </td>");
             else
                out.println("<td style=\"background : #A9F5A9;\" rowspan=\"2\">"+"<a href='info_lecture?l_id="+l_id[i]+"'>"+time[i]+"</a></td>");
          }
            
       
       
       %>
  </tr>
  
   <tr>
    <th bgcolor="#CFE7FF">4교시</th>
    <% 
          for(int i=5; i<10; i++) {
             if(time[i] == "")
                out.println("<td> </td>");
                }
  %>
  </tr>
   <tr>
    <th bgcolor="#CFE7FF">5교시</th>
     <% 
          
          for(int i=10; i<15; i++) {
             if(time[i] == "")
                out.println("<td> </td>");
             else
                out.println("<td style=\"background : #F3E2A9;\" rowspan=\"2\">"+"<a href='info_lecture?l_id="+l_id[i]+"'>"+time[i]+"</a></td>");
          }
            
       
       
       %>
  </tr>
   <tr>
    <th bgcolor="#CFE7FF">6교시</th>
     <% 
          for(int i=10; i<15; i++) {
             if(time[i] == "")
                out.println("<td> </td>");
                }
  %>
  </tr>
   <!--  <tr>
    <th>7교시</th>
    <td> </td> 
    <td> </td>
  </tr>
  <tr>
   <th>8교시</th>
   <td style = "background : LightCyan  ;">프로그래밍언어구조론</td> 
   <td> </td>
  </tr>-->

</table>
</div>
</body>
</html>



</body>
</html>