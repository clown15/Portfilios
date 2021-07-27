var spData = null;

      function DoData(json) {
        spData = json.feed.entry;
      }

      function drawCell(tr, val) {
        var td = $("<td/>").attr('id', 'food_td');
        tr.append(td);
        td.append(val);
        //return td;
      }
      function drawCell2(tr, val) {
        var td = $("<td/>").attr('id', 'food_td');
        var a = $("<a/>").attr('id', 'food_tel').attr('href','tel:'+val);
        tr.append(td);
        td.append(a);
        a.append(val);
        //return a;
      }

      function drawRow(table, rowData) {
        if (rowData == null) return null;
        if (rowData.length == 0) return null;
        var tr = $("<tr/>").attr('id', 'food_tr');
        table.append(tr);
        for (var c = 0; c < rowData.length; c++) {
          if(c==2)
            drawCell2(tr,rowData[c]);
          else
            drawCell(tr, rowData[c]);
        }
        //return tr;
      }
      
      function drawFirstRow(table,rowData){
        if (rowData == null) return null;
          if (rowData.length == 0) return null;
          var tr = $("<tr/>").attr('class', 'food_tr_category');
          table.append(tr);
          for (var c = 0; c < rowData.length; c++) {
              drawCell(tr, rowData[c]);
          }
          //return tr;
      }

      function drawTable(parent) {
        var table = $("<table/>").attr('id', 'food_table');
        parent.append(table);
        return table;
      }

      function readData(parent) {
        var data = spData;
        var table = drawTable(parent);
        var rowData = [];
        for (var r = 0; r < data.length; r++) {
          var cell = data[r]["gs$cell"]; //셀의 행렬번호를 가져옴
          var val = cell["$t"]; //해당셀의 데이터를 val에 등록
          if (cell.col == 1) { //셀의 열번호가 1일때(즉, 다음 행으로 넘어갔을 때) 테이블에 그전 행의 데이터를 추가함.
            if (cell.row == 2) {
							drawFirstRow(table,rowData);
              rowData=[];
            } else {
              drawRow(table, rowData);
              rowData = []; //행 데이터 초기화
            }
          }
          rowData.push(val); //rowdata에 각 셀데이터 추가.
        }
        drawRow(table, rowData); //마지막 행일때 추가 안됐으므로 한번더 추가작업.
      }
      $(document).ready(function() {
        readData($("#ftab4"));
      });
