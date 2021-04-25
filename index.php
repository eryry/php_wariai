<?php
require_once "calc.php";

$today = date("Y年m月d日");
$weeks = ["日","月","火","水","木","金","土"];
$week = $weeks[date("w")];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf=8">
  <title>配分計算</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="watercolor">
  <h1><span class="emphasis">割合計算</span><?php echo $today."(".$week.")"; ?></h1>
<div class="sections">
  <section class="base">
    <h2>本日の勤務時間数</h2>
    <ul>
    <form action="" method="post">
      <li>
        <input type="number" name="all_time_hour" value="8">時間
        <input type="number" name="all_time_min" value="00">分
      </li>
      <p>保育事業関連</p>
      <li class="hoi">
        <div>
          <input type="number" name="hoi_all_time_hour" value="00">時間
          <input type="number" name="hoi_all_time_min" value="00">分
        </div>
        <ul>
          <li>
            <input type="text" name="hoi_done01" value='<?php echo $_POST ? "$hoi_done01" : "1:";?>'>
            <input type="number" name="hoi_done01_hour" value="0">時間
            <input type="number" name="hoi_done01_min" value="00">分
          </li>
          <li>
            <input type="text" name="hoi_done02" value='<?php echo $_POST ? "$hoi_done02" : "2:";?>'>
            <input type="number" name="hoi_done02_hour" value="0">時間
            <input type="number" name="hoi_done02_min" value="00">分
          </li>
          <li>
            <input type="text" name="hoi_done03" value='<?php echo $_POST ? "$hoi_done03" : "3:";?>'>
            <input type="number" name="hoi_done03_hour" value="0">時間
            <input type="number" name="hoi_done03_min" value="00">分
          </li>
          <li>
            <input type="text" name="hoi_done04" value='<?php echo $_POST ? "$hoi_done04" : "4:";?>'>
            <input type="number" name="hoi_done04_hour" value="0">時間
            <input type="number" name="hoi_done04_min" value="00">分
          </li>
          <li>
            <input type="text" name="hoi_done05" value='<?php echo $_POST ? "$hoi_done05" : "5:";?>'>
            <input type="number" name="hoi_done05_hour" value="0">時間
            <input type="number" name="hoi_done05_min" value="00">分
          </li>
          
        </ul>
      </li>
      <p>婚活事業関連</p>
      <li>
        <input type="number" name="kon_all_time_hour" value="00">時間
        <input type="number" name="kon_all_time_min" value="00">分
      </li>
      <p>その他</p>
      <li>
        <input type="number" name="else_all_time_hour" value="00">時間
        <input type="number" name="else_all_time_min" value="00">分
      </li>
      
      <input type="submit" name="submit" value="計算する" class="btn">
    </form>  
  </ul>
  </section>
  
  <section class="result">
    <h2>今日の業務割合</h2>
    <p>今日の勤務時間 合計：<?php echo $all_time; ?>分</p>
    <p class="attention_red"><?php
    if($all_time<=480){
      echo "定時退社";
    }elseif($all_time>480 && $all_time<=540){
      echo "残業注意報！おつかれさまですね";
    }elseif($all_time>540 && $all_time<=600) {
      echo "1時間以上も残業してますよ!(><)!";
    }elseif($all_time>600) {
      echo "働きすぎだよ！気を付けて帰ってね";
    }
    ;?></p>
    <ul>  

      <li class="detail">
       <p>保育事業関連：<?php echo $hoi_wariai;?>%</p>
       <ul class="h_results">
         <?php if(!empty($hoi_done01) ||!empty($hoi_done01_hour) || !empty($hoi_dane01_min)): ?>
          <li>
            <?php echo $hoi_done01."→".$hoi_done01_wariai."%"; ?>
          </li>
         <?php endif; ?>
         <?php if(!empty($hoi_done02) ||!empty($hoi_done02_hour) || !empty($hoi_dane02_min)): ?>
          <li>
            <?php echo $hoi_done02."→".$hoi_done02_wariai."%"; ?>
          </li>
         <?php endif; ?>
         <?php if(!empty($hoi_done03) ||!empty($hoi_done03_hour) || !empty($hoi_dane03_min)): ?>
          <li>
            <?php echo $hoi_done03."→".$hoi_done03_wariai."%"; ?>
          </li>
         <?php endif; ?>
         <?php if(!empty($hoi_done04) ||!empty($hoi_done04_hour) || !empty($hoi_dane04_min)): ?>
          <li>
            <?php echo $hoi_done04."→".$hoi_done04_wariai."%"; ?>
          </li>
         <?php endif; ?>
         <?php if(!empty($hoi_done05) ||!empty($hoi_done05_hour) || !empty($hoi_dane05_min)): ?>
          <li>
            <?php echo $hoi_done05."→".$hoi_done05_wariai."%"; ?>
          </li>
         <?php endif; ?>
       </ul>
      </li>
      <li>
       <p>婚活事業関連：<?php echo $kon_wariai;?>%</p>
      </li>
      <li>
       <p>その他：<?php echo $else_wariai;?>%</p>
      </li>
    </ul>
  <form action="" method="post">
    <input type="submit" value="all CLEAR" name="allclear">
  </form>
  </section>
</div>
</body>
</html>