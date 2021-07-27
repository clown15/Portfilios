//더보기 버튼 구현 파일입니다.

function hide(){
	var con = document.getElementsByClassName("detail")[0];
	if(con.style.display =='none'){
		con.style.display='inline-block';
	}
	else{
		con.style.display='none';
	}
}
//메뉴 숨기기 버튼 입니다. 
jQuery(document).ready(function($) {
            // hide the menu when the page load
            $("#navigation-list").hide();
            // when .menuBtn is clicked, do this
            $(".menuBtn").click(function() {
                // open the menu with slide effect
                $("#navigation-list").slideToggle(400);
            });
        });