<!-- このファイルでは、保険業法を解析した結果（条文ごとの括弧の深さ、括弧の総数、文字数）をdata2.txtに格納する。 -->

<?php
  //関数作成
  function analyze($str) {
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
    $pt=0;
    for ($i=1; $i<count($analyzed); $i++) {
      $pt+=count($analyzed[$i]);
    }
    return (count($analyzed)-1).' '.$pt.' '.strlen($str);
  }
?>

<?php
// ファイルを変数に格納
$filename = 'data.txt';
$filename2 = 'data2.txt';
// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');
$fp2 = fopen($filename2, 'w+');

// whileで行末までループ処理
while (!feof($fp)) {
 
  // fgetssの第二引数(バイト数)と第三引数(除外しないタグを指定)は省略可能
  $txt = fgets($fp);
 
  // ファイルを読み込んだ変数を出力
  fwrite($fp2, analyze($txt)."\n"); 
}

fclose($fp);
echo '書き込み完了しました！';
?>