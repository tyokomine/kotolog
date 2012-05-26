<?php

//データベース選択
$link = mysql_connect('mysql573.phy.lolipop.jp', 'LAA0200466', 'wktc2525');//データベース接続
if (!$link) {
    die('接続失敗です。'.mysql_error());
}
$db_selected = mysql_select_db(database, $link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}

function r($s) {
    return mysql_real_escape_string($s);
}

function jump($s) {
    header('Location: '.url.$s);
    exit;
}
//コンテンツを表示する関数
function show_contents(&$memo){
	echo '<div class="Tile">
			<span class="TileContents">'.$memo["memo_contents"].'</span><span class="TileCitation">'.$memo["memo_citation"].'</span><span class="TileCategory">'.$memo["memo_category"].'</span>
  		</div>';
}


?>