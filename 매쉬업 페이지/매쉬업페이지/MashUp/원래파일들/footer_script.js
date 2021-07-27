var spData2 = null;

 function doData2(json) {
     spData2 = json.feed.entry;
 }

function button(parent,rowData) {
    if(rowData[1] == "url") return null;
    
  var button = $("<input type=button onclick=window.open('"+rowData[1]+"') value=#"+rowData[0]+">").attr('class','btn btn-outline-secondary');
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