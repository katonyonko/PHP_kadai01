<!-- 空で入力したときのエラー -->
<html>
	<head>
		<meta charset="utf-8">
		<title>Article Analyzer</title>
		<link rel="shortcut icon" href="https://www.silhouette-illust.com/wp-content/uploads/2016/05/650-300x300.jpg">
	</head>
	<body style="background-color:#d0e0ff">
		<h1 style="text-align: center; padding-top: 30px; margin-bottom: 0; font-family: 'Corben', cursive; font-size: 50px; color: #0070f0; user-select:none;">Article Analyzer</h1>
		<p style="text-align: center; margin-top: 0; color: #0070f0;  user-select:none; font-weight: bold; font-style: italic; font-family: 'ＭＳ Ｐゴシック';">条文解析ツール</p>
		<h2 style="width: 70%; margin-left: auto; margin-right: auto; color: #00a0e0; text-decoration: underline;">１．ツールを使う</h2>
		<p style="width: 70%; margin-left: auto; margin-right: auto; color: #444;">解析したい条文を入力してください:</p>
		<form action="kadai01_result.php" method="post" style="margin-left: auto; margin-right: auto; width: 70%; display: flex; justify-content: space-between; align-items: flex-end;">
			<textarea name="article" style="height: 200px; width: 90%; border-radius:10px; padding: 8px 8px;"></textarea>
			<input type="submit" value="解析する" id="analyze" style="height: 50px; margin-bottom: 0px; border-radius:10px;">
		</form>
		<h2 style="width: 70%; margin-left: auto; margin-right: auto; color: #00a0e0; text-decoration: underline;">２．ツールの説明</h2>
		<p style="width: 70%; margin-left: auto; margin-right: auto; color: #444;">日本の法律の条文って以下の例のように括弧が深くネストされていて、とても読みにくいですよね。このツールは、ネストされた条文の括弧の構造を整理し、理解しやすいように変換します。</p>
		<div style="display: flex; width: 70%; margin-left: auto; margin-right: auto; margin-bottom: 30px; border: 1px solid #999; border-radius:10px; color: #555;">
			<div style="width: 45%; margin-left:20px">
				<p style="font-weight: bold">例：平成23年3月31日金融庁告示第23号第2条(資本金、基金、準備金等の計算)</p>
				<p>保険業法施行規則(以下「規則」という。)第86条の2第1項又は第210条の11の3第1項に規定する繰延税金資産(税効果会計(連結貸借対照表に計上されている資産及び負債の金額と課税所得の計算の結果算定された資産及び負債の金額との間に差異がある場合において、当該差異に係る法人税等(法人税その他利益又は剰余に関連する金額を課税標準として課される租税をいう。以下この項において同じ。)の金額を適切に期間配分することにより、法人税等を控除する前の当期純利益又は当期純剰余の金額と法人税等の金額を合理的に対応させるための会計処理をいう。以下同じ。)の適用により資産として計上されるものをいう。以下同じ。)の不算入額は、保険会社及びその国内連結保険子法人等(連結保険子法人等(保険会社又は保険持株会社の子法人等(保険業法施行令(平成7年政令第425号。第3条第1項第2号ハにおいて「令」という。)第13条の5の2第3項に規定する子法人等をいう。以下同じ。)である保険会社及び外国保険業者(法第2条第6項に規定する外国保険業者をいう。以下同じ。)であって連結の範囲に含まれる者をいう。以下同じ。)であって、保険業法施行規則第86条等の規定に基づき保険会社の資本金、基金、準備金等及び通常の予測を超える危険に相当する額の計算方法等を定める件(平成8年2月大蔵省告示第50号。以下「単体告示」という。)に基づき法第130条各号に掲げる額を算出している者をいう。以下同じ。)又は保険持株会社の国内連結保険子法人等に係る不算入額(単体告示第1条第1項に規定する不算入額をいう。)の合計額とする(第5項において同じ。)。</p>
			</div>
			<p style="width: 10%; text-align: center; margin-top: 80px;">整理<br>→</p>
			<div style="width: 45%; margin-right:20px">
				<p style="font-weight: bold">条文の構造（このツールを用いて変換した形）</p>
				<p>保険業法施行規則(*1)第86条の2第1項又は第210条の11の3第1項に規定する繰延税金資産(*2)の不算入額は、保険会社及びその国内連結保険子法人等(*3)又は保険持株会社の国内連結保険子法人等に係る不算入額(*4)の合計額とする(*5)。</p>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px;">[1] 以下「規則」という。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px;">[2] 税効果会計(*2-1)の適用により資産として計上されるものをいう。以下同じ。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; margin-left: 30px;">[2-1] 連結貸借対照表に計上されている資産及び負債の金額と課税所得の計算の結果算定された資産及び負債の金額との間に差異がある場合において、当該差異に係る法人税等(*2-1-1)の金額を適切に期間配分することにより、法人税等を控除する前の当期純利益又は当期純剰余の金額と法人税等の金額を合理的に対応させるための会計処理をいう。以下同じ。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; margin-left: 60px;">[2-1-1] 法人税その他利益又は剰余に関連する金額を課税標準として課される租税をいう。以下この項において同じ。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px;">[3] 連結保険子法人等(*3-1)であって、保険業法施行規則第86条等の規定に基づき保険会社の資本金、基金、準備金等及び通常の予測を超える危険に相当する額の計算方法等を定める件(*3-2)に基づき法第130条各号に掲げる額を算出している者をいう。以下同じ。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; margin-left: 30px;">[3-1] 保険会社又は保険持株会社の子法人等(*3-1-1)である保険会社及び外国保険業者(*3-1-2)であって連結の範囲に含まれる者をいう。以下同じ。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; margin-left: 60px;">[3-1-1] 保険業法施行令(*3-1-1-1)第13条の5の2第3項に規定する子法人等をいう。以下同じ。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; margin-left: 90px;">[3-1-1-1] 平成7年政令第425号。第3条第1項第2号ハにおいて「令」という。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; margin-left: 60px;">[3-1-2] 法第2条第6項に規定する外国保険業者をいう。以下同じ。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px; margin-left: 30px;">[3-2] 平成8年2月大蔵省告示第50号。以下「単体告示」という。</p></div>
				<div style="border-bottom: 1px solid #999;"><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px;">[4] 単体告示第1条第1項に規定する不算入額をいう。</p></div>
				<div><p style="margin-top: 5px; margin-bottom: 5px; font-size: 16px;">[5] 第5項において同じ。</p></div>
			</div>
		</div>
		<h2 style="width: 70%; margin-left: auto; margin-right: auto; color: #00a0e0; text-decoration: underline;">３．（参考）このツールで保険業法の全条文を解析した結果</h2>
		<p style="width: 70%; margin-left: auto; margin-right: auto; color: #444;">政府の提供している<a href="https://elaws.e-gov.go.jp/apitop/#">法令API</a>から、私の大好きな保険業法の全条文データを抽出してこの解析ツールに掛けてみた結果のサマリーを以下に掲載します（総数＜深さとなっている箇所はなんらかのバグだけど未調査）。</p>
		<table style="width: 70%; text-align: center; margin-left: auto; margin-right: auto;" cellspacing="0">
			<tr>
				<td style="background:yellow;border:1px solid; width: 12%;">深さ＼総数</td>
				<td style="background:yellow;border:1px solid; width: 4%;">0</td>
				<td style="background:yellow;border:1px solid; width: 4%;">1</td>
				<td style="background:yellow;border:1px solid; width: 4%;">2</td>
				<td style="background:yellow;border:1px solid; width: 4%;">3</td>
				<td style="background:yellow;border:1px solid; width: 4%;">4</td>
				<td style="background:yellow;border:1px solid; width: 4%;">5</td>
				<td style="background:yellow;border:1px solid; width: 4%;">6</td>
				<td style="background:yellow;border:1px solid; width: 4%;">7</td>
				<td style="background:yellow;border:1px solid; width: 4%;">8</td>
				<td style="background:yellow;border:1px solid; width: 4%;">9</td>
				<td style="background:yellow;border:1px solid; width: 4%;">10</td>
				<td style="background:yellow;border:1px solid; width: 4%;">11</td>
				<td style="background:yellow;border:1px solid; width: 4%;">12</td>
				<td style="background:yellow;border:1px solid; width: 4%;">13</td>
				<td style="background:yellow;border:1px solid; width: 4%;">14</td>
				<td style="background:yellow;border:1px solid; width: 4%;">15</td>
				<td style="background:yellow;border:1px solid; width: 4%;">16</td>
				<td style="background:yellow;border:1px solid; width: 4%;">17</td>
				<td style="background:yellow;border:1px solid; width: 4%;">18</td>
				<td style="background:yellow;border:1px solid; width: 4%;">19</td>
				<td style="background:yellow;border:1px solid; width: 4%;">20</td>
				<td style="background:yellow;border:1px solid; width: 4%;">20超</td>
			</tr>
			<?php
			$filename = 'data/data2.txt';
			// fopenでファイルを開く（'r'は読み込みモードで開く）
			$fp = fopen($filename, 'r');
			//結果の配列を定義
			$list = [];
			for ($i=0; $i<12; $i++) {
				$list[$i]=[];
				for ($j=0; $j<22; $j++) {
					$list[$i][$j]=0;
				}
			}
			// whileで行末までループ処理
			while (!feof($fp)) {
				// fgetssの第二引数(バイト数)と第三引数(除外しないタグを指定)は省略可能
				$txt = fgets($fp);
				$tmp = explode(' ',$txt);
				$i=min((int) $tmp[0], 12); //括弧の深さ
				$j=min((int) $tmp[1], 22); //括弧の総数
				$list[$i][$j]+=1;
			}
			for ($i=0; $i<6; $i++) {
				echo "<tr><td style='background:#ffffe0;border:1px solid;'>".$i."</td>";
				for ($j=0; $j<22; $j++) {
					echo "<td style='background:#ffffe0;border:1px solid;'>".$list[$i][$j]."</td>";
				}
				echo "</tr>";
			}
			fclose($fp);
			?>
		</table>
		<p style="width: 70%; margin-left: auto; margin-right: auto; text-align: right;">以上</p>
		<script>
			const btn=document.getElementById('analyze');
			btn.addEventListener('mouseover', function() {
	 			btn.style.cursor = 'pointer';
			});
		</script>
	</body>
</html>