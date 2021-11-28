<?php
  //文字作成
  $str = $_POST["article"];
  $analyzed = [];
  $depth = 0;
  $idx=[];
  $new=0;

  for ($i = 0; $i<strlen($str); $i++) {
    if (count($analyzed)>$depth) {
      $length=count($analyzed[$depth]);
    }
    else {
      $analyzed[$depth]=[];
      $length=0;
    }
    if (mb_substr($str,$i,1)=='(' || mb_substr($str,$i,1)=='（') {
      $new=1;
      if ($depth==count($idx)) {
        $idx[] = 1;
      }
      else {
        $idx[count($idx)-1]+=1;
      }
      $analyzed[$depth][$length-1].="(*".implode("-", $idx).")";
      $depth+=1;
    }
    elseif (mb_substr($str,$i,1)==')' || mb_substr($str,$i,1)=='）') {
      if ($depth<count($idx)) {
        array_pop ($idx);
      }
      $depth-=1;
    }
    else {
      if ($new==1) {
        $analyzed[$depth][$length]="[".implode("-", $idx)."] ".mb_substr($str,$i,1);
      }
      elseif ($length==0) {
        $analyzed[$depth][0]=mb_substr($str,$i,1);
      }
      else {
        $analyzed[$depth][$length-1].=mb_substr($str,$i,1);
      }
      $new=0;
    }
  }
?>

<html>
<head>
  <meta charset="utf-8">
  <title>Result</title>
  <link rel="shortcut icon" href="https://www.silhouette-illust.com/wp-content/uploads/2016/05/650-300x300.jpg">
</head>

<body style="background-color:#d0e0ff">
  <h1 style="text-align: center; padding-top: 30px; margin-bottom: 0; font-family: 'Corben', cursive; font-size: 50px; color: #0070f0; user-select:none;">Article Analyzer</h1>
  <p style="text-align: center; margin-top: 0; color: #0070f0;  user-select:none; font-weight: bold; font-style: italic; font-family: 'ＭＳ Ｐゴシック';">条文解析ツール</p>
  <h2 style="width: 70%; margin-left: auto; margin-right: auto; color: #00a0e0; text-decoration: underline;">解析しました(Analyzed)！</h2>
  <?php
    $pt=0;
    for ($i=1; $i<count($analyzed); $i++) {
      $pt+=count($analyzed[$i]);
    }
    echo '<p style="width: 70%; margin-left: auto; margin-right: auto; color: #555;">この文章の括弧の最大の深さは'.(count($analyzed)-1).'、括弧の総数は'.$pt.'でした。</p>';
  ?>
  <!-- 最大の深さと括弧の数 -->
  <div style="display: flex; justify-content: space-between; width: 70%; margin-left: auto; margin-right: auto;">
    <div style="width: 49%; border: 1px solid #999; border-radius:10px; color: #555;">
      <p style="font-weight: bold; margin-left: 20px;">元の文章</p>
      <?php
        echo '<p style="margin-left: 20px; margin-right: 20px;">'.$str.'</p>';
      ?>
    </div>
    <div style="width: 49%; border: 1px solid #999; border-radius:10px; color: #555;">
      <p style="font-weight: bold; margin-left: 20px;">解析結果</p>
      <?php
        echo '<p style="margin-left: 20px; margin-right: 20px;">'.$analyzed[0][0].'</p>';
        // $now=[1,0];
        // for ($i=0; $i<$pt; $i++) {
        //   $tmp='';
        //   for ($j=0; $j<count($now); $j++) {
        //     $tmp=
        //   }
        //   echo '<div style="border-bottom: 1px solid #999;"><p style="margin-left: 20px; margin-right: 20px; margin-top: 5px; margin-bottom: 5px; font-size: 16px;">'.$analyzed[$i][$j].'</p></div>';
          // echo '<div style="border-bottom: 1px solid #999;"><p style="margin-left: 20px; margin-right: 20px; margin-top: 5px; margin-bottom: 5px; font-size: 16px;">'.$analyzed[$i][$j].'</p></div>';
        // }
      ?>
    </div>
  </div>
  <ul>
  <li><a href="kadai01.php">戻る</a></li>
  </ul>
</body>
</html>