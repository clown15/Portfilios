var glo_json;

function loadFile(){
	$.getJSON("output2.json", function(json) {
    console.log(json); // this will show the info it in firebug console
   	console.log(json[0].content.toString());
   	glo_json = json;
});
}

loadFile();

function drawCardlist(parent){
	var ul = $("<ul/>").attr('id','snspost_list');
	parent.append(ul);
	return ul;
}

function drawCarditem(ul,jsondata){
	var li = $("<li/>").attr('class','snspost_item');
	ul.append(li);
	drawCardElement(li,jsondata);
}

function drawCardElement(li,jsondata){
	if(jsondata ==null) return null;
	if(jsondata.length == 0) return null;
	var div = $("<div class='post_img' style=\"background-image:url(\'"+jsondata.img_urls[0].toString()+"\')\"></div>");
	var p1 = $("<p/>").attr('class','post_content');
	p1.append(jsondata.content.toString());
	var p2 = $("<p/>").attr('class','post_date');
	var str = jsondata.datetime.toString();
	str = str.substring(0,str.indexOf("T", 0));
	p2.append(str);

	li.append(div);
	li.append(p1);
	li.append(p2);
}





function readsnsData(parent){
	var ul = drawCardlist(parent);
	for(var i =0;i<glo_json.length;i++){
		drawCarditem(ul,glo_json[i]);
	}
	parent.append(ul);
	console.log("asdasd");
}

$(document).ready(function(){
	readsnsData($("#snspost_body"));
});

