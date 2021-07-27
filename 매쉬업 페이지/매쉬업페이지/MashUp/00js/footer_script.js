var spData2 = null;

 function doData2(json) {
     spData2 = json.feed.entry;
 }

function button(parent,rowData) {
    if(rowData[1] == "url") return null;
    
  //var button = $("<input type=button onclick=window.open('"+rowData[1]+"') value=#"+rowData[0]+">").attr('class','btn btn-outline-secondary');
  var button = $("<a class = \"btn btn-outline-secondary\" href=\""+ rowData[1]+ "\" role=\"button\">"+"<h4>#"+rowData[0]+"</h4></a>");
  //<a class ="btn btn-outline-secondary" href="https://www.skuniv.ac.kr/?vid=&mid=notice&category=&search_keyword=%ED%9C%B4%ED%95%99&search_target=title" role="button"><h4>#휴학</h4></a>
  parent.append(button);
}

function readData2(parent) {
  var data = spData2;
  var rowData = [];

  for(var r=0; r<data.length; r++) {
    var cell = data[r]["gs$cell"];
    var val = cell["$t"];
    if (cell.col == 1 && rowData.length !=0) {
      button(parent,rowData);
      rowData = [];
    }
    rowData.push(val);
    }
 button(parent,rowData); 
}
$(document).ready(function(){
 readData2($("#button_link"));
 });