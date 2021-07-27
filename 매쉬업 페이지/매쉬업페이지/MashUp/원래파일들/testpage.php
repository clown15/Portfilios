<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
  $fname=date("Y").".csv";
  $path="./00csv/".$fname;
  $is_file=file_exists("$path");
  if(!$is_file){
    $command=escapeshellcmd('python ./00python/Dday.py');
    exec($command,$out,$stat);
  }
  $sep=",";
  $array_lines=file("$path");
  for($i=0;$i<count($array_lines);$i++) {
    $temp=[];
    $tok=strtok(iconv("EUC-KR","UTF-8",$array_lines[$i]),$sep);
    for($j=0;$j<4;$j++){
      $temp[$j]=$tok;
      $tok=strtok($sep);
  }
  
    $year=date("Y");
    $month='0';
    $day='0';
    //월구하기 년이 포함되어 있으면 년과월 분해해서 구함
    if(strpos($temp[0],"년")){
      $year=strtok($temp[0],"년");
      $month=strtok("년");
    }
    if($month=='0')
      $month=$temp[0];
    //날짜 구하기
    if(strpos($temp[1],"~")){
      $day=strtok($temp[1]," ~");
    }
    else{
      $day=$temp[1];
    }
    $target='';
    if($year=='0'){
      $target=date_create(date("Y").'-'.$month.'-'.$day);
    }
    else {
      $target=date_create($year.'-'.$month.'-'.$day);
    }
  
    $today=date_create(date("Y-m-d")); 
    if($year>date("Y")) {
      $dday=date_diff($today,$target);
      echo "<span class=\"dday\"><h3>".$temp[3]."(".$month.'/'.$day.")&nbsp D-".$dday->days."</h3></span>";
      break;
    }
    else if($month>=date('m')) {
      if(($month==date('m'))&&($day>date('j'))) {
        $dday=date_diff($today,$target);
        echo "<span class=\"dday\"><h3>".$temp[3]."(".$month.'/'.$day.")&nbsp D-".$dday->days."</h3></span>";
        break;
      }
      else {
        $dday=date_diff($today,$target);
        echo "<span class=\"dday\"><h3>".$temp[3]."(".$month.'/'.$day.")&nbsp D-".$dday->days."</h3></span>";
        break;
      }
      
    }
  } 
?>
</body>
</html>