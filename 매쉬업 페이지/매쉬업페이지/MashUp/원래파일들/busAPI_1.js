
		////////////////////////////// API 받아오기 /////////////////////////////////////////
		
		$(document).ready(

			function Play() {
				
				var now = new Date();
				var hour = now.getHours(); //시간 대 별로 서경->길음/성신, 성신/길음->서경 을 구별해주기 위해
				var contentStr=''; //1164 안내 문장
				var contentStr1=''; //2115 안내 문장
				
				// 13:00 이전
				if( hour < 13 ) {
					
					//1164 받아오기
					$.ajax({
						
						type: 'POST',
						datatype: 'json',
						async:false,
						url: 'encyc_proxy.php', //1164(busRouteID) API 내의 정보

						success : function(result) { //API를 성공적으로 받아왔을 때
							var xmlData = $(result).find("itemList");
							var listLength = xmlData.length;
							//alert(listLength);
							var GIREUM = '107000239' //길음역(stID) 정보

							if(listLength) {
								$(xmlData).each(function() { //xml 을 순차적으로 탐색하여
									var diff1 = $(this).find("stId").text(); // 탐색 결과 길음역 정보에 대한 id
									//alert(diff1);
									if( diff1 == GIREUM ){ //변수와 찾은 값이 같다면
										contentStr += $(this).find("stNm").text() +"</br>"+
													  $(this).find("arrmsg1").text() +"</br>"+
													  $(this).find("arrmsg2").text() +"</br>";}
																		// 정류소 이름 첫번째 두번째 도착예정 정보 담기
									
									});
							}},
						error : function() {
							alert('fail');
						}
					});

					//2115 받아오기				
					$.ajax({
						type: 'GET',
						datatype: 'xml',
						async:false,
						url: query + '100100598', //2115(busRouteID) API 내의 정보

						success : function(xml) {
	
							var xmlData1 = $(xml).find("itemList");
							var listLength1 = xmlData1.length;
							var SUNGSIN = '107000175'; //성신여대입구(stID) 정보

							if(listLength1) {
								$(xmlData1).each(function() { 
									var diff2 = $(this).find("stId").text(); // 탐색 결과 성신여대 정보에 대한 id
									if( diff2 == SUNGSIN ){ //searched stId is as the same as '2115'
										contentStr1 += $(this).find("stNm").text() +"</br>"+
													   $(this).find("arrmsg1").text() +"</br>"+
													   $(this).find("arrmsg2").text() +"</br>";}
								});
								
								var alert = '길음/성신->서경대' + '</br>';

								$("alert").append(alert);
								$("#before").append(contentStr);
								$("#after").append(contentStr1); //각 문장들을 html 태그에 붙여준다.
	
							}},

						error : function() {
								alert('Fail>_<');
							}
					});

				}

				// 13:00 이후
				else 
				{
				
					$.ajax({
						//crossOrigin: true,

						type: 'POST',
						datatype: 'json',
						async:false,
						url: './testBusAPI.php', //1164	

						success : function(result) {
							
							var xmlData =
							result['msgBody']['itemList'][0]['stId']
							// var listLength = xmlData.length;
							// var BUKAK = '107000274' //서경대본관 id

							// if(listLength) {	
							// alert('good');							
							// 	$(xmlData).each(function() {
							// 		var diff1 = $(this).find("stId").text();
							// 		if( diff1 == BUKAK ){
							// 			contentStr += $(this).find("stNm").text() +"</br>"+
							// 						  $(this).find("arrmsg1").text() +"</br>"+
							// 						  $(this).find("arrmsg2").text() +"</br>";} // 1st time, 2nd time have been shown
							// 	});
							// }
							$("#before").append(xmlData);
						},

						error : function() {
								alert('fail');
							}
						});
									
					$.ajax({
						
						type: 'GET',
						datatype: 'xml',
						async:false,
						url: query + '100100598',  //2115

						success : function(xml) {
							
							
							var xmlData1 = $(xml).find("itemList");
							var listLength1 = xmlData1.length;
							var SUNGSIN = '107000274'; //서경에서 성신으로 가는 정류장

							if(listLength1) {
								$(xmlData1).each(function() { 
									var diff2 = $(this).find("stId").text();
									if( diff2 == SUNGSIN ){
										contentStr1 += $(this).find("stNm").text() +"</br>"+
													   $(this).find("arrmsg1").text() +"</br>"+
													   $(this).find("arrmsg2").text() +"</br>";}
								});
								var alert = '서경대 - > 길음/성신' + '</br>';

								$("#before").append(contentStr);
								$("#after").append(contentStr1);

							}},

						error : function() {
							alert('Fail>_<');
						}
					});
				}

	 }

	 )