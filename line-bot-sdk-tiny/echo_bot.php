<?php
$search = $_GET['search'];
// $search = "中秋節";
include 'simple_html_dom.php';
// Create DOM from URL or file
// $search example : 中秋節
// $html = file_get_html('http://llc.caece.net/?sfid=1142&_sf_s='.$search);
// var_dump ( $html );
// echo $search ; 
// Find all images 

$done = false;

// 英文轉大寫

$search = strtoupper($search);

// 數字轉換

if (strpos($search, '十二') !== false) {
    $search = str_replace('十二', '12', $search);
}

if (strpos($search, '二十四') !== false || strpos($search, '二四') !== false) {
    $search = str_replace('二十四', '24', $search);
    $search = str_replace('二四', '24', $search);
}

if (strpos($search, '四十八') !== false || strpos($search, '四八') !== false) {
    $search = str_replace('四十八', '48', $search);
    $search = str_replace('四八', '48', $search);
}

if (strpos($search, '七十二') !== false || strpos($search, '七二') !== false) {
    $search = str_replace('七十二', '72', $search);
    $search = str_replace('七二', '72', $search);
}

if (strpos($search, '一') !== false) {
    $search = str_replace('一', '1', $search);
}

if (strpos($search, '二') !== false) {
    $search = str_replace('二', '2', $search);
}

if (strpos($search, '三') !== false) {
    $search = str_replace('三', '3', $search);
}

if (strpos($search, '四') !== false) {
    $search = str_replace('四', '4', $search);
}

if (strpos($search, '五') !== false) {
    $search = str_replace('五', '5', $search);
}

if (strpos($search, '六') !== false) {
    $search = str_replace('六', '6', $search);
}

if (strpos($search, '七') !== false) {
    $search = str_replace('七', '7', $search);
}

if (strpos($search, '八') !== false) {
    $search = str_replace('八', '8', $search);
}

if (strpos($search, '九') !== false) {
    $search = str_replace('九', '9', $search);
}

if (strpos($search, '十') !== false) {
    $search = str_replace('十', '10', $search);
}

// 錯別字

if (strpos($search, '台風') !== false) {
    $search = str_replace('台風', '颱風', $search);
}

if (strpos($search, '路上') !== false) {
    $search = str_replace('路上', '陸上', $search);
}

if (strpos($search, '即使') !== false) {
    $search = str_replace('即使', '即時', $search);
}

if (strpos($search, '周') !== false) {
    $search = str_replace('周', '週', $search);
}

// 同義詞

if (strpos($search, '現在') !== false) {
    $search = str_replace('現在', '即時', $search);
}

if (strpos($search, '目前') !== false) {
    $search = str_replace('目前', '即時', $search);
}

if (strpos($search, '降雨') !== false) {
    $search = str_replace('降雨', '雨量', $search);
}

if (strpos($search, '災情') !== false) {
    $search = str_replace('災情', '災害', $search);
}

if (strpos($search, '重大災害') !== false) {
    $search = str_replace('重大災害', '災害', $search);
}

if (strpos($search, '累積雨量') !== false) {
    $search = str_replace('累積雨量', '雨量', $search);
}

if (strpos($search, '今日') !== false) {
    $search = str_replace('今日', '今天', $search);
}

// 殘體 正體 轉換

if (strpos($search, '臺') !== false) {
    $search = str_replace('臺', '台', $search);
}

if (strpos($search, '简報') !== false) {
    $search = str_replace('简報', '簡報', $search);
}




else if (strpos($search, '10分鐘雨量') !== false) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'M10', SORT_DESC); // 10分鐘排序
    echo "前5名 10分鐘雨量(mm)：\n";
    output_array2($new2, 10);
    
    $done = true;
}

else if (strpos($search, '1小時雨量') !== false) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'Hour1', SORT_DESC); // 1小時排序
    echo "前5名 1小時雨量(mm)：\n";
    output_array2($new2, 1);
    
    $done = true;
}

else if (strpos($search, '3小時雨量') !== false) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'Hour3', SORT_DESC); // 3小時排序
    echo "前5名 3小時雨量(mm)：\n";
    output_array2($new2, 3);
    
    $done = true;
}

else if (strpos($search, '6小時雨量') !== false) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'Hour6', SORT_DESC); // 6小時排序
    echo "前5名 6小時雨量(mm)：\n";
    output_array2($new2, 6);
    
    $done = true;
}

else if (strpos($search, '12小時雨量') !== false) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'Hour12', SORT_DESC); // 12小時排序
    echo "前5名 12小時雨量(mm)」：\n";
    output_array2($new2, 12);
    
    $done = true;
}

else if (strpos($search, '24小時雨量') !== false) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'Hour24', SORT_DESC); // 24小時排序
    echo "前5名 24小時雨量(mm)：\n";
    output_array2($new2, 24);
    //echo "\nPS. 「24小時雨量」與「1天雨量」不同";
    
    $done = true;
}

else if ((strpos($search, '1天雨量') !== false) || (strpos($search, '今天雨量') !== false) || (strpos($search, '本天雨量') !== false)) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'Day1', SORT_DESC); // 1天排序
    echo "前5名 1天雨量(mm)：\n";
    output_array2($new2, 100);
    //echo "\nPS. 「24小時雨量」與「1天雨量」不同";
    
    $done = true;
}

else if ((strpos($search, '2天雨量') !== false) || (strpos($search, '48小時雨量') !== false)) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'Day2', SORT_DESC); // 2天排序
    echo "前5名 2天雨量(mm)：\n";
    output_array2($new2, 200);
    
    $done = true;
}

else if ((strpos($search, '3天雨量') !== false) || (strpos($search, '72小時雨量') !== false)) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    
    $new2 = array_sort($rain_arr["rows"], 'Day3', SORT_DESC); // 3天排序
    echo "前5名 3天雨量(mm)：\n";
    output_array2($new2, 300);
    
    $done = true;
}


else if ((strcmp($search, "1") == 0) || (strpos($search, '即時雨量') !== false)) {
    $json     = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    $rain_arr = json_decode($json, true);
    echo "以下為前5名雨量站之雨量：\n\n";
    $new1 = array_sort($rain_arr["rows"], 'Hour1', SORT_DESC); // 10分鐘排序
    echo "10分鐘雨量(mm)：\n";
    // output_array($rain_arr,1) ;
    output_array2($new1, 10);
    // var_dump($new1) ;
    echo "\n";
    
    $new1 = array_sort($rain_arr["rows"], 'Hour1', SORT_DESC); // 1小時排序
    echo "1小時雨量(mm)：\n";
    // output_array($rain_arr,1) ;
    output_array2($new1, 1);
    // var_dump($new1) ;
    echo "\n";
    // $json = file_get_contents("http://fhy.wra.gov.tw/raininfo/DataPages/RainSummaryMethodPage.aspx?ENo=0&CNo=0");
    // $rain_arr = json_decode($json, true) ; 
    
    $new2 = array_sort($rain_arr["rows"], 'Hour3', SORT_DESC); // 3小時排序
    echo "3小時雨量(mm)：\n";
    // output_array($rain_arr,3) ;
    output_array2($new2, 3);
    
    $done = true;
}


// 階層問答
else if ($search == '雨量') {
    echo "請問您想要查詢的是：\n1、[即時雨量]：提供1小時、3小時最大雨量之雨量站前5大。\n2、前5大雨量：提供即時雨量查詢，包含[10分鐘雨量]、[1小時雨量]、[3小時雨量]、[6小時雨量]、[12小時雨量]、[24小時雨量]、[1天雨量]、[2天雨量]、[3天雨量]\n3、[雨量統計表]：提供即時完整雨量查詢。\n\n";
    $done = true;
}


/*else if($search=="停班停課"){
$html = file_get_html('https://www.dgpa.gov.tw/typh/daily/nds.html');
$cnt  = 0;
foreach ($html->find('<TR>') as $element) {
$element1 = $element->find('<FONT');
if (sizeof($element1) > 0) {
$element2 = $element1[0]->find('無停班停課訊息');
if (sizeof($element2) > 0) {
echo $element2[0]->innertext;
echo "\n"; // for line, pure text  
// echo '<br>';    
$cnt += 1;
}

$element1 = $element->find('a');
if (sizeof($element1) > 0) {
echo  $element1[0]->href;
echo "\n"; // for line, pure text  
// echo '<br>';    
}
}
//        echo $element->src . '<br>';
}
}*/

else {
    $arr_key = array(
        "水庫統計表(蓄水率)",
        "各國氣象",
        "台灣中央氣象局",
        "香港天文台",
        "日本氣象公司",
        "美軍預報",
        "日本預報",
        "歐洲預報(EC)",
        "TYPHOON2000",
        "問與答",
        "水災應變層級開設條件為何？",
        "當水災、風災中央災害應變中心開設時，經濟部主導組別(主管部會)為何？",
        "中央氣象局何時發布海上颱風警報？",
        "中央氣象局何時發布陸上颱風警報？",
        "104年9月1日中央氣象局實施之豪(大)雨雨量分級新標準為何？",
        "淹水警戒定義？",
        "河川水位警戒定義？",
        "水庫放流警戒定義？",
        "大型移動式抽水機整備狀況為何？",
        "水利署及地方政府共設置幾座滯洪池？其總容量多少？",
        "水利署及地方政府共設置幾座抽水站？其總抽水量多少？",
        "目前水門有多少扇？",
        "協助地方政府持續維運水患自主防災社區及其擴充狀況為何？",
        "防汛護水志工人數及分組現況為何？",
        "水利署近幾年開發哪些防災避災工具？",
        "水利署LBS(Location Based Service)簡訊廣播目前的服務範圍為何？",
        "自動淹水感測系統共幾處？",
        "智慧水尺設計概念及使用方式為何？本(106)年度預計設置幾處？",
        "員山子分洪設施啟用時機為何？自啟用迄今分洪狀況為何？",
        "各國颱風路徑預報",
        "氣象局颱風路徑預報",
        "歷史警特報資料、發布解除時間(豪雨、颱風)",
        "人事行政局停班停課",
        "水利災害應變經驗學習中心(LLC)",
        "颱風搜(T-SEARCH)",
        "防汛熱點",
        "氣象局風力預測",
        "氣象局定量降水預報",
        "中央災害應變中心(CEOC) 災害情報站",
        "水利署各單位應變小組開設成立狀態(河川局)",
        "全國災害應變中心開設成立狀態(縣市政府)",
        "氣象局氣象雲圖",
        "氣象局雷達回波",
        "氣象局颱風動態圖",
        "氣象局颱風消息",
        "WINDY",
        "防汛儀表板",
        "抽水機即時監控",
        "國際災害速報",
        "雨量統計表",
        "水庫濁度",
        "員山子分洪",
        "災害統計表",
        "水利設施[搶險]及[搶修]",
        "天氣週報",
        "本次會議-水利署簡報",
        "本次會議-各部會簡報",
        "本次事件-所有簡報",
        "歷史簡報",
        "水利署最新的[淹水警戒]",
        "建議",
        "許願",
        "客製化",
        "連結",
        "LINK",
        "氣象總覽",
        "水公司災害及緊急事件速報",
        "臺電停復電查詢",
        "CCTV",
        "媒體-綜合警戒",
        "淹水警戒",
        "防災資訊整合平台",
        //"最新消息-新聞",
        "旱災新聞資訊交換平台",
        "演水預警",
        "QPF/QPE",
        "災害示警",
        "臺灣防災地圖",
        "NCDR WATCH"
        
    );
    
    $arr_value = array(
        "水庫統計表(蓄水率)如下：\nhttp://wra.caece.net/wralink/ws.html",
        "各國氣象相關連結如下：\n[B1] 臺灣中央氣象局 http://wra.caece.net/wralink/cwb.html\n[B2] 香港天文台 http://wra.caece.net/wralink/hk.html\n[B3]:日本氣象公司 http://wra.caece.net/wralink/jpc.html\n[B4] 美軍預報 http://wra.caece.net/wralink/am.html\n[B5] 日本預報 http://wra.caece.net/wralink/jp.html\n[B6] 歐洲預報 http://wra.caece.net/wralink/ecmwf.html\n[B7] Typhoon2000 http://wra.caece.net/wralink/typhoon2000.html",
        "[B1] 臺灣中央氣象局 http://wra.caece.net/wralink/cwb.html",
        "[B2] 香港天文台 http://wra.caece.net/wralink/hk.html",
        "[B3] 日本氣象公司 http://wra.caece.net/wralink/jpc.html",
        "[B4] 美軍預報 http://wra.caece.net/wralink/am.html",
        "[B5] 日本預報 http://wra.caece.net/wralink/jp.html",
        "[B6] 歐洲預報(EC) http://wra.caece.net/wralink/ecmwf.html",
        "[B7] Typhoon2000 http://wra.caece.net/wralink/typhoon2000.html",
        "「防汛應變問與答」連結如下：https://goo.gl/XVntiZ\n\n問題清單：\n[Q1]：水災應變層級[開設條件]為何？\n[Q2]：當水災、風災中央災害應變中心開設時，經濟部[主導組別]為何？[主管部會]\n[Q3]：中央氣象局何時發布[海上颱風警報]？\n[Q4]：中央氣象局何時發布海上[陸上颱風警報]？\n[Q5]：104年9月1日中央氣象局實施之豪(大)雨[雨量分級]新標準為何？\n[Q6]：[淹水警戒定義]？\n[Q7]：河川[水位警戒定義]？\n[Q8]：水庫[放流警戒定義]？\n[Q9]：大型移動式[抽水機整備]狀況為何？\n[Q10]：水利署及地方政府共設置幾座[滯洪池]？其總容量多少？\n[Q11]：水利署及地方政府共設置幾座[抽水站]？其總抽水量多少？\n[Q12]：目前[水門]有多少扇？\n[Q13]：協助地方政府持續維運水患自主[防災社區]及其擴充狀況為何？\n[Q14]：防汛[護水志工]人數及分組現況為何？\n[Q15]：水利署近幾年開發哪些防災[避災工具]？\n[Q16]：水利署[LBS]（Location Based Service）[簡訊廣播]目前的服務範圍為何？\n[Q17]：自動[淹水感測]系統共幾處？\n[Q18]：[智慧水尺]設計概念及使用方式為何？本(106)年度預計設置幾處？\n[Q19]：[員山子][分洪]設施啟用時機為何？自啟用迄今分洪狀況為何？",
        "[Q1]：水災應變層級[開設條件]為何？\n\nA：(節錄)\n署應變小組三級：3小時雨量達 130mm。24小時雨量達 200mm。\n\n部應變小組二級：連續豪雨特報，24小時雨量達200mm以上，滿足下列任一條件，經研判有開設必要者：A、連續豪雨特報，5個縣市24小時雨量達200mm，其中2個達350mm。B、3個縣市二級開設以上。C、因水災災害，有跨部會協調或跨縣市支援需求。\n\n部應變小組一級：二級開設後，持續豪雨特報，且災情持續擴大，研判有開設必要者。\n\n詳細內容請見：Q1 https://goo.gl/QpZmM1",
        "[Q2]：當水災、風災中央災害應變中心開設時，經濟部[主導組別]為何？[主管部會]\n\nA：(節錄)\n風災：主管部會：經濟部。經濟部主導組別：水電維生組。進駐人力：5人。\n\n水災：主管部會：經濟部(部長擔任指揮管)。經濟部主導組別：水電維生組、災情監控組、幕僚行政組、部會聯繫組、後勤組。進駐人力：35人。\n\n詳細內容請見：Q2 https://goo.gl/FhNfaC",
        "[Q3]：中央氣象局何時發布[海上颱風警報]？\n\nA：預測颱風之7級風暴風範圍可能侵襲臺灣本島或澎湖、金門、馬祖100公里以內海域時之前24小時，應即發布各該海域海上颱風警報，以後每隔3小時發布一次，必要時得加發之。\n\n詳細內容請見：Q3 https://goo.gl/EcTIIC",
        "[Q4]：中央氣象局何時發布[陸上颱風警報]？\n\nA：預測颱風之7級風暴風範圍可能侵襲臺灣本島或澎湖、金門、馬祖陸上之前18小時，應即發布各該地區陸上颱風警報，以後每隔3小時發布一次，必要時得加發之。\n\n詳細內容請見：Q4 https://goo.gl/mbH9ZS",
        "[Q5]：104年9月1日中央氣象局實施之豪(大)雨[雨量分級]新標準為何？\n\nA：\n大雨：「40毫米/1小時」或「80毫米/24小時」。\n豪雨：「100毫米/3小時」或「200毫米/24小時」。\n大豪雨：「350毫米/24小時」。\n超大豪雨：「500毫米/24小時」。\n\n詳細內容請見：Q5 https://goo.gl/Qv8mwt",
        "[Q6]：[淹水警戒定義]？\n\nA：\n二級警戒：發布淹水警戒之鄉(鎮、市、區)如持續降雨，其易淹水村里或道路可能「3小時內開始積淹水」。\n\n一級警戒：發布淹水警戒之鄉(鎮、市、區)如持續降雨，其易淹水村里或道路「可能已開始積淹水」。\n\n詳細內容請見：Q6 https://goo.gl/x27t6j",
        "[Q7]：河川[水位警戒定義]？\n\nA：\n三級警戒：河川水位預計「未來2小時」到達高灘地之水位。\n\n二級警戒：河川水位預計「未來5小時」到達計畫洪水位(或堤頂)時之水位。\n\n一級警戒：河川水位預計「未來2小時」到達計畫洪水位(或堤頂)時之水位。\n\n詳細內容請見：Q7 https://goo.gl/buxKYL",
        "[Q8]：水庫[放流警戒定義]？\n\nA：放流1或2小時前完成下游通報作業(18座一級水庫2小時，一般水庫1小時)。\n\n詳細內容請見：Q8 https://goo.gl/8bFFLi",
        "[Q9]：大型移動式[抽水機整備]狀況為何？\n\nA：(節錄)\n全國抽水機總計1,016部(水利署336部、地方政府自有680部)，已預佈地方政府共951部(更新日期106.05)。\n\n詳細內容請見：Q9 https://goo.gl/wkHJbf",
        "[Q10]：水利署及地方政府共設置幾座[滯洪池]？其總容量多少？\n\nA：共設置39座滯洪池，總容量1,986萬立方公尺(更新日期106.03)。\n\n詳細內容請見：Q10 https://goo.gl/oyXnEC",
        "[Q11]：水利署及地方政府共設置幾座[抽水站]？其總抽水量多少？\n\nA：共設置154座抽水站，總抽水量863CMS(更新日期106.03)。\n\n詳細內容請見：Q11 https://goo.gl/SgfXT2",
        "[Q12]：目前[水門]有多少扇？\n\nA：\n總共7,522扇水門(更新日期106.05)。\n\n一河局：181扇。\n二河局：926扇。\n三河局：797扇。\n四河局：664扇。\n五河局：2,483扇。\n六河局：873扇。\n七河局：933扇。\n八河局：19扇。\n九河局：42扇。\n十河局：58扇。\n新北市：546扇。\n\n詳細內容請見：Q12 https://goo.gl/sAeIZw",
        "[Q13]：協助地方政府持續維運水患自主[防災社區]及其擴充狀況為何？\n\nA：(節錄)\n協助地方維運「384個」水患自主防災社區，106年將增設「40個」水患自主防災社區。\n\n詳細內容請見：Q13 https://goo.gl/L0Wh7Y",
        "[Q14]：防汛[護水志工]人數及分組現況為何？\n\nA：合計1,603人(105.12)，分10大隊，由10個河川局辦理專業訓練，以利提升水情及災情查通報質量。\n\n詳細內容請見：Q14 https://goo.gl/GQYrAV",
        "[Q15]：水利署近幾年開發哪些防災[避災工具]？\n\nA：為了提供即時水情及災害預警資訊，水利署開發適用不同通訊平台的防災避災工具，包括智慧型手機(行動水情APP)、一般手機(上網登門號及簡訊)、市話(上網登門號)、網路社群(防汛抗旱粉絲團)、媒體村里廣播(Google、7-11)及LBS與細胞廣播通知和水庫放水通知。\n\n詳細內容請見：Q15 https://goo.gl/GsCuol",
        "[Q16]：水利署[LBS](Location Based Service)[簡訊廣播]目前的服務範圍為何？\n\nA：\n服務範圍共57處，其中水庫共10處，其他易淹水地區共47處。\n\n水庫10處：桂山壩上游、石岡壩、集集攔河堰、鯉魚潭水庫潰壩淹水潛勢區域、白河水庫洩洪、石門大壩鳶山堰洩洪區域、榮華壩放流區域、寶二水庫放流區域、阿公店水庫下游沿岸、曾文水庫下游沿岸具淹水風險特定區域。\n\n詳細內容請見：Q16 https://goo.gl/T5ZEhi",
        "[Q17]：自動[淹水感測]系統共幾處？\n\nA：\n共93處。便於監控偏遠或無人駐地之積淹水情資，以利自動化掌握淹水範圍與災情評估。\n\n「水利署資訊機房」連接「GIS圖示淹水區域」、「電信交接箱淹水感測」、「新型電話門號淹水感測通報」、「銅纜淹水偵測」。提供「以多元化快速淹水通報提供防災單位參考應用」以及「主動式民眾淹水預警系統」。\n\n詳細內容請見：Q17 https://goo.gl/f6Yowv",
        "[Q18]：[智慧水尺]設計概念及使用方式為何？本(106)年度預計設置幾處？\n\nA：(節錄)\n智慧水尺採群眾外包之概念，使民眾可輕易協助通報水(災)情；水尺具有位置編碼(如示意圖中之A002)且易辨識(黑白相間)的特性，只要下載水情通報App，開啟App並對準水尺拍照上傳(如同QRcode掃描)，即可將該地點的外水水位或內水積淹水深度整合入本署災害緊急應變系統。本(106)年度預計設置300處，初期由本署/河川局災情查報人員、防汛護水志工及自主防災社區試用，成效良好再開放給一般民眾使用。\n\n詳細內容請見：Q18 https://goo.gl/E9e4q2",
        "[Q19]：[員山子][分洪]設施啟用時機為何？自啟用迄今分洪狀況為何？\n\nA：(節錄)\n員山子於「水位達63公尺時即自動啟動分洪」，自啟用(含93年緊急分洪)「迄105年底合計分洪40次」，其中104年9月杜鵑颱風期間為歷年分洪最大量(最高水位66公尺，分洪量達每秒932立方公尺，分洪體積2,021萬立方公尺)。\n\n詳細內容請見：Q19 https://goo.gl/lj9ieB",
        "Typhoon2000之最新各國颱風路徑預報如下：\nhttp://www.typhoon2000.ph/multi/?name=NESAT",
        "氣象局之最新颱風路徑預報如下：\nhttp://www.cwb.gov.tw/V7/prevent/warning/TED.htm",
        "歷史警特報資料、發布解除時間(豪雨、颱風)如下：\nhttp://wra.caece.net/rain_history",
        "人事行政局停班停課資訊如下：\nhttps://www.dgpa.gov.tw/typh/daily/nds.html",
        "水利災害應變經驗學習中心(LLC)網址如下：\nhttp://llc.caece.net",
        "颱風搜(T-Search)網址如下：\nhttp://wra.caece.net/tsearch\n\n颱風搜使用教學\nhttp://llc.caece.net/tsearch",
        "防汛熱點資料如下：\nhttp://wra.caece.net/hotspot",
        "氣象局風力預測網址如下：\nhttp://www.cwb.gov.tw/V7/prevent/warning/WPPS.htm",
        "氣象局定量降水預報網址如下：\nhttp://www.cwb.gov.tw/V7/forecast/fcst/QPF6.htm",
        "中央災害應變中心(CEOC) 災害情報站網址如下：\nhttp://www.emic.gov.tw/",
        "水利署各單位應變小組開設成立狀態(河川局)網址如下：\nhttp://fhy.wra.gov.tw/dmchy/wra/WebCIAComponent/DutyRecordList.aspx",
        "全國災害應變中心開設成立狀態(縣市政府)網址如下：\nhttp://fhy.wra.gov.tw/ReservoirPage_2011/page/EOCDutyIofos/EOCDuty.html",
        "氣象局氣象雲圖網址如下：\nhttp://www.cwb.gov.tw/m/o/satellite/Sat-eastAsia4.htm",
        "氣象局雷達回波網址如下：\nhttp://www.cwb.gov.tw/m/o/radar/Radar-High.htm",
        "氣象局颱風動態圖網址如下：\nhttp://www.cwb.gov.tw/V7/prevent/warning/B20.htm",
        "氣象局颱風消息網址如下：\nhttp://www.cwb.gov.tw/V7/prevent/typhoon/ty.htm",
        "WINDY網址如下：\nhttps://www.windy.com/?25.042,121.497,5",
        "防汛儀表板網址如下：\nhttp://goo.gl/njEMgP",
        "抽水機即時監控網址如下：\nhttps://goo.gl/E2Kyad",
        "國際災害速報網址如下：\nhttp://llc.caece.net/international",
        "雨量統計表網址如下：\nhttp://wra.caece.net/wralink/rain.html",
        "水庫濁度網址如下：\nhttp://wra.caece.net/wralink/zd.html",
        "員山子分洪網址如下：\nhttp://wra.caece.net/wralink/usz.html",
        "災害統計表網址如下：\nhttp://wra.caece.net/wralink/disaster.html",
        "水利設施[搶險]及[搶修]網址如下：\nhttp://wra.caece.net/wralink/wequip.html",
        "天氣週報網址如下：\nhttp://wra.caece.net/slide_week",
        "本次會議-水利署簡報網址如下：\nhttp://wra.caece.net/slide_wra",
        "本次會議-各部會簡報網址如下：\nhttp://wra.caece.net/slide_meeting",
        "本次事件-所有簡報網址如下：\nhttp://wra.caece.net/slide_event",
        "歷史簡報網址如下：\nhttp://wra.caece.net/slide_history",
        "水利署最新的[淹水警戒]查詢網址如下：\nhttp://fhyv.wra.gov.tw/fhy/Alert/Rain",
        "\n已收到您的[建議]，我們很重視您的任何建議，謝謝您。",
        "\n已收到您的[建議]，我們很重視您的任何建議，謝謝您。",
        "\n以下是防災常用的[客製化][連結]清單：\n[L1]：[雨量統計表]\n[L2]：[水庫統計表]\n[L3]：[水庫濁度]\n[L4]：[員山子分洪]\n[L5]：[災情統計表]\n[L6]：水利設施[搶險]及[搶修]",
        "\n以下是防災常用的[客製化][連結]清單：\n[L1]：[雨量統計表]\n[L2]：[水庫統計表]\n[L3]：[水庫濁度]\n[L4]：[員山子分洪]\n[L5]：[災情統計表]\n[L6]：水利設施[搶險]及[搶修]",
        "\n以下是防災常用的[客製化][連結]清單：\n[L1]：[雨量統計表]\n[L2]：[水庫統計表]\n[L3]：[水庫濁度]\n[L4]：[員山子分洪]\n[L5]：[災情統計表]\n[L6]：水利設施[搶險]及[搶修]",
        "氣象總覽網址如下：\nhttp://wra.caece.net/wralink/cloud.html",
        "水公司災害及緊急事件速報網址如下：\nhttp://wra.caece.net/wralink/waterc.html",
        "臺電停復電查詢網址如下：\nhttp://nds.taipower.com.tw/ndsWeb/ndfthome.aspx",
        "CCTV網址如下：\nhttp://fhyv.wra.gov.tw/fhy/Monitor/CCTV",
        "媒體-綜合警戒網址如下：\nhttp://fhy.wra.gov.tw/fhy/Alert/Warn",
        "淹水警戒網址如下：\nhttp://fhy2.wra.gov.tw/PUB_WEB_2011/Download/WRAF01.jpg",
        "防災資訊整合平台網址如下：\nhttp://wrantu.weebly.com/",
        //"最新消息-新聞網址如下：\n",
        "旱災新聞資訊交換平台網址如下：\nhttps://drive.google.com/drive/folders/0B-fxu2Y0JybKV2FScUFxUzNEY0k",
        "演水預警網址如下：\nhttp://wra.caece.net/floodalert/",
        "QPF/QPE網址如下：\nhttp://mfcqpf.cwb.gov.tw/",
        "災害示警網址如下：\nhttps://www.google.org/publicalerts",
        "臺灣防災地圖網址如下：\nhttp://www.google.org/crisismap/taiwan",
        "NCDR WATCH網址如下：\nhttps://watch.ncdr.nat.gov.tw/"
        
    );
    
    $arr_hotkey = array(
        "0" => "L1",
        "1" => "L2",
        "2" => "L3",
        "3" => "L4",
        "4" => "L5",
        "5" => "L6",
        "6" => "B1",
        "7" => "B2",
        "8" => "B3",
        "9" => "B4",
        "10" => "B5",
        "11" => "B6",
        "12" => "B7",
        "13" => "QA",
        "14" => "Q1",
        "15" => "Q2",
        "16" => "Q3",
        "17" => "Q4",
        "18" => "Q5",
        "19" => "Q6",
        "20" => "Q7",
        "21" => "Q8",
        "22" => "Q9",
        "23" => "Q10",
        "24" => "Q11",
        "25" => "Q12",
        "26" => "Q13",
        "27" => "Q14",
        "28" => "Q15",
        "29" => "Q16",
        "30" => "Q17",
        "31" => "Q18",
        "32" => "Q19",
        "33" => "0",
        //"34"=>"1",
        "35" => "2"
    );
    
    $arr_hotvalue = array(
        "[L1]：[雨量統計表]\nhttp://wra.caece.net/wralink/rain.html" => "0",
        "[L2]：[水庫統計表]\nhttp://wra.caece.net/wralink/ws.html" => "1",
        "[L3]：[水庫濁度]\nhttp://wra.caece.net/wralink/zd.html" => "2",
        "[L4]：[員山子分洪]\nhttp://wra.caece.net/wralink/usz.html" => "3",
        "[L5]：[災情統計表]\nhttp://wra.caece.net/wralink/disaster.html" => "4",
        "[L6]：水利設施[搶險]及[搶修]\nhttp://wra.caece.net/wralink/wequip.html" => "5",
        "[B1]：臺灣中央氣象局\nhttp://wra.caece.net/wralink/cwb.html" => "6",
        "[B2]：香港天文台\nhttp://wra.caece.net/wralink/hk.html" => "7",
        "[B3]：日本氣象公司\nhttp://wra.caece.net/wralink/jpc.html" => "8",
        "[B4]：美軍預報\nhttp://wra.caece.net/wralink/am.html" => "9",
        "[B5]：日本預報\nhttp://wra.caece.net/wralink/jp.html" => "10",
        "[B6]：歐洲預報(EC)\nhttp://wra.caece.net/wralink/ecmwf.html" => "11",
        "[B7]：Typhoon2000\nhttp://wra.caece.net/wralink/typhoon2000.html" => "12",
        "[QA]：「防汛應變問與答」連結如下：https://goo.gl/XVntiZ\n\n問題清單：\n[Q1]：水災應變層級[開設條件]為何？\n[Q2]：當水災、風災中央災害應變中心開設時，經濟部[主導組別]為何？[主管部會]\n[Q3]：中央氣象局何時發布[海上颱風警報]？\n[Q4]：中央氣象局何時發布海上[陸上颱風警報]？\n[Q5]：104年9月1日中央氣象局實施之豪(大)雨[雨量分級]新標準為何？\n[Q6]：[淹水警戒定義]？\n[Q7]：河川[水位警戒定義]？\n[Q8]：水庫[放流警戒定義]？\n[Q9]：大型移動式[抽水機整備]狀況為何？\n[Q10]：水利署及地方政府共設置幾座[滯洪池]？其總容量多少？\n[Q11]：水利署及地方政府共設置幾座[抽水站]？其總抽水量多少？\n[Q12]：目前[水門]有多少扇？\n[Q13]：協助地方政府持續維運水患自主[防災社區]及其擴充狀況為何？\n[Q14]：防汛[護水志工]人數及分組現況為何？\n[Q15]：水利署近幾年開發哪些防災[避災工具]？\n[Q16]：水利署[LBS]（Location Based Service）[簡訊廣播]目前的服務範圍為何？\n[Q17]：自動[淹水感測]系統共幾處？\n[Q18]：[智慧水尺]設計概念及使用方式為何？本(106)年度預計設置幾處？\n[Q19]：[員山子][分洪]設施啟用時機為何？自啟用迄今分洪狀況為何？" => "13",
        "[Q1]：水災應變層級[開設條件]為何？\n\nA：(節錄)\n署應變小組三級：3小時雨量達 130mm。24小時雨量達 200mm。\n\n部應變小組二級：連續豪雨特報，24小時雨量達200mm以上，滿足下列任一條件，經研判有開設必要者：A、連續豪雨特報，5個縣市24小時雨量達200mm，其中2個達350mm。B、3個縣市二級開設以上。C、因水災災害，有跨部會協調或跨縣市支援需求。\n\n部應變小組一級：二級開設後，持續豪雨特報，且災情持續擴大，研判有開設必要者。\n\n詳細內容請見：Q1 https://goo.gl/QpZmM1" => "14",
        "[Q2]：當水災、風災中央災害應變中心開設時，經濟部[主導組別]為何？[主管部會]\n\nA：(節錄)\n風災：主管部會：經濟部。經濟部主導組別：水電維生組。進駐人力：5人。\n\n水災：主管部會：經濟部(部長擔任指揮管)。經濟部主導組別：水電維生組、災情監控組、幕僚行政組、部會聯繫組、後勤組。進駐人力：35人。\n\n詳細內容請見：Q2 https://goo.gl/FhNfaC" => "15",
        "[Q3]：中央氣象局何時發布[海上颱風警報]？\n\nA：預測颱風之7級風暴風範圍可能侵襲臺灣本島或澎湖、金門、馬祖100公里以內海域時之前24小時，應即發布各該海域海上颱風警報，以後每隔3小時發布一次，必要時得加發之。\n\n詳細內容請見：Q3 https://goo.gl/EcTIIC" => "16",
        "[Q4]：中央氣象局何時發布[陸上颱風警報]？\n\nA：預測颱風之7級風暴風範圍可能侵襲臺灣本島或澎湖、金門、馬祖陸上之前18小時，應即發布各該地區陸上颱風警報，以後每隔3小時發布一次，必要時得加發之。\n\n詳細內容請見：Q4 https://goo.gl/mbH9ZS" => "17",
        "[Q5]：104年9月1日中央氣象局實施之豪(大)雨[雨量分級]新標準為何？\n\nA：\n大雨：「40毫米/1小時」或「80毫米/24小時」。\n豪雨：「100毫米/3小時」或「200毫米/24小時」。\n大豪雨：「350毫米/24小時」。\n超大豪雨：「500毫米/24小時」。\n\n詳細內容請見：Q5 https://goo.gl/Qv8mwt" => "18",
        "[Q6]：[淹水警戒定義]？\n\nA：\n二級警戒：發布淹水警戒之鄉(鎮、市、區)如持續降雨，其易淹水村里或道路可能「3小時內開始積淹水」。\n\n一級警戒：發布淹水警戒之鄉(鎮、市、區)如持續降雨，其易淹水村里或道路「可能已開始積淹水」。\n\n詳細內容請見：Q6 https://goo.gl/x27t6j" => "19",
        "[Q7]：河川[水位警戒定義]？\n\nA：\n三級警戒：河川水位預計「未來2小時」到達高灘地之水位。\n\n二級警戒：河川水位預計「未來5小時」到達計畫洪水位(或堤頂)時之水位。\n\n一級警戒：河川水位預計「未來2小時」到達計畫洪水位(或堤頂)時之水位。\n\n詳細內容請見：Q7 https://goo.gl/buxKYL" => "20",
        "[Q8]：水庫[放流警戒定義]？\n\nA：放流1或2小時前完成下游通報作業(18座一級水庫2小時，一般水庫1小時)。\n\n詳細內容請見：Q8 https://goo.gl/8bFFLi" => "21",
        "[Q9]：大型移動式[抽水機整備]狀況為何？\n\nA：(節錄)\n全國抽水機總計1,016部(水利署336部、地方政府自有680部)，已預佈地方政府共951部(更新日期106.05)。\n\n詳細內容請見：Q9 https://goo.gl/wkHJbf" => "22",
        "[Q10]：水利署及地方政府共設置幾座[滯洪池]？其總容量多少？\n\nA：共設置39座滯洪池，總容量1,986萬立方公尺(更新日期106.03)。\n\n詳細內容請見：Q10 https://goo.gl/oyXnEC" => "23",
        "[Q11]：水利署及地方政府共設置幾座[抽水站]？其總抽水量多少？\n\nA：共設置154座抽水站，總抽水量863CMS(更新日期106.03)。\n\n詳細內容請見：Q11 https://goo.gl/SgfXT2" => "24",
        "[Q12]：目前[水門]有多少扇？\n\nA：\n總共7,522扇水門(更新日期106.05)。\n\n一河局：181扇。\n二河局：926扇。\n三河局：797扇。\n四河局：664扇。\n五河局：2,483扇。\n六河局：873扇。\n七河局：933扇。\n八河局：19扇。\n九河局：42扇。\n十河局：58扇。\n新北市：546扇。\n\n詳細內容請見：Q12 https://goo.gl/sAeIZw" => "25",
        "[Q13]：協助地方政府持續維運水患自主[防災社區]及其擴充狀況為何？\n\nA：(節錄)\n協助地方維運「384個」水患自主防災社區，106年將增設「40個」水患自主防災社區。\n\n詳細內容請見：Q13 https://goo.gl/L0Wh7Y" => "26",
        "[Q14]：防汛[護水志工]人數及分組現況為何？\n\nA：合計1,603人(105.12)，分10大隊，由10個河川局辦理專業訓練，以利提升水情及災情查通報質量。\n\n詳細內容請見：Q14 https://goo.gl/GQYrAV" => "27",
        "[Q15]：水利署近幾年開發哪些防災[避災工具]？\n\nA：為了提供即時水情及災害預警資訊，水利署開發適用不同通訊平台的防災避災工具，包括智慧型手機(行動水情APP)、一般手機(上網登門號及簡訊)、市話(上網登門號)、網路社群(防汛抗旱粉絲團)、媒體村里廣播(Google、7-11)及LBS與細胞廣播通知和水庫放水通知。\n\n詳細內容請見：Q15 https://goo.gl/GsCuol" => "28",
        "[Q16]：水利署[LBS](Location Based Service)[簡訊廣播]目前的服務範圍為何？\n\nA：\n服務範圍共57處，其中水庫共10處，其他易淹水地區共47處。\n\n水庫10處：桂山壩上游、石岡壩、集集攔河堰、鯉魚潭水庫潰壩淹水潛勢區域、白河水庫洩洪、石門大壩鳶山堰洩洪區域、榮華壩放流區域、寶二水庫放流區域、阿公店水庫下游沿岸、曾文水庫下游沿岸具淹水風險特定區域。\n\n詳細內容請見：Q16 https://goo.gl/T5ZEhi" => "29",
        "[Q17]：自動[淹水感測]系統共幾處？\n\nA：\n共93處。便於監控偏遠或無人駐地之積淹水情資，以利自動化掌握淹水範圍與災情評估。\n\n「水利署資訊機房」連接「GIS圖示淹水區域」、「電信交接箱淹水感測」、「新型電話門號淹水感測通報」、「銅纜淹水偵測」。提供「以多元化快速淹水通報提供防災單位參考應用」以及「主動式民眾淹水預警系統」。\n\n詳細內容請見：Q17 https://goo.gl/f6Yowv" => "30",
        "[Q18]：[智慧水尺]設計概念及使用方式為何？本(106)年度預計設置幾處？\n\nA：(節錄)\n智慧水尺採群眾外包之概念，使民眾可輕易協助通報水(災)情；水尺具有位置編碼(如示意圖中之A002)且易辨識(黑白相間)的特性，只要下載水情通報App，開啟App並對準水尺拍照上傳(如同QRcode掃描)，即可將該地點的外水水位或內水積淹水深度整合入本署災害緊急應變系統。本(106)年度預計設置300處，初期由本署/河川局災情查報人員、防汛護水志工及自主防災社區試用，成效良好再開放給一般民眾使用。\n\n詳細內容請見：Q18 https://goo.gl/E9e4q2" => "31",
        "[Q19]：[員山子][分洪]設施啟用時機為何？自啟用迄今分洪狀況為何？\n\nA：(節錄)\n員山子於「水位達63公尺時即自動啟動分洪」，自啟用(含93年緊急分洪)「迄105年底合計分洪40次」，其中104年9月杜鵑颱風期間為歷年分洪最大量(最高水位66公尺，分洪量達每秒932立方公尺，分洪體積2,021萬立方公尺)。\n\n詳細內容請見：Q19 https://goo.gl/lj9ieB" => "32",
        "「Ask Diana」 @ntuteam [操作說明]\n您好，我是NTU的Diana，我的好朋友是Apple的Siri，您可以問我「任何跟防災相關的問題」喔。\n您可以輸入[ ]中的簡碼或文字送出您想要查詢的問題: \n\n簡碼:\n[0] [操作說明]\n[1] [即時雨量]\n[2] [簡報]\n[LINK] [客製化][連結]\n[QA] 防汛應變[問與答]\n\n文字查詢範例:\n[即時雨量]\n[簡報]\n[水利署簡報]\n[中秋節颱風]\n如果您有任何建議，請以「建議」二字為開頭，直接輸入您的想法(不要有空格)，我們很重視您的任何建議，謝謝。例如：\n建議增加「查詢歷史豪雨特報」的功能。" => "33",
        //""=>"34",
        "以下提供最常用的5種簡報內容：\n「天氣週報」\nhttp://wra.caece.net/slide_week\n「本次會議-水利署簡報」\nhttp://wra.caece.net/slide_wra\n「本次會議-各部會簡報」\nhttp://wra.caece.net/slide_meeting\n「本次事件-所有簡報」\nhttp://wra.caece.net/slide_event\n「歷史簡報」\nhttp://wra.caece.net/slide_history\n" => "35"
    );
    
    if (in_array($search, $arr_hotkey) !== false) {
        $hotkey   = array_search($search, $arr_hotkey);
        $hotvalue = array_search($hotkey, $arr_hotvalue);
        echo $hotvalue;
        $done = true;
    }
    
    /*
    echo sizeof($arr_key);
    echo "\n";
    //echo $arrteset[1];
    print_r(array_slice($arr_key,0));
    echo "\n";
    */
    else if (in_array($search, $arr_key) !== false) { // 只對一個,不會鬼打牆
        $key   = array_search($search, $arr_key);
        $value = $arr_value[$key];
        echo $value;
        
    } else {
        $key_size   = sizeof($arr_key);
        $search_len = strlen($search);
        $same_sum   = 0;
        $accept_sum = 0;
        for ($key_idx = 0; $key_idx < $key_size; $key_idx++) {
            $key_str = $arr_key[$key_idx];
            //echo $key_str;
            //echo "\n";
            
            $got = 0;
            for ($search_idx = 0; $search_idx < $search_len; $search_idx = $search_idx + 3) {
                //echo $search_idx;
                //echo "\n";
                $search_word = substr($search, $search_idx, 3);
                //echo $search_word;
                //echo "\n";
                if (strpos($arr_key[$key_idx], $search_word) !== false) {
                    $got = $got + 1;
                    //echo "got!\n";
                } else {
                    //echo "none.\n";        
                }
                //echo "\n";
            }
            
            $arr_match[$key_idx] = $got / $search_len * 3;
            if ($arr_match[$key_idx] > 1) {
                $arr_match[$key_idx] = 1;
            }
            if ($arr_match[$key_idx] == 1) {
                $arr_same[$same_sum] = $key_idx;
                $same_sum++;
            } else if ($arr_match[$key_idx] >= 0.5) {
                $arr_accept[$accept_sum] = $key_idx;
                $accept_sum++;
            }
            //echo $arr_match[$key_idx];
            //echo "\n";
        }
        
        if ($done == false) {
            if ($same_sum == 1) { // 只有一個全對
                //echo "只有一個全對\n";
                echo $arr_value[$arr_same[0]];
                $done = true;
            } else if ($same_sum > 1) { // 兩個以上全對
                //echo "兩個以上全對\n";
                echo "請問您想查詢的是？";
                for ($same_idx = 0; $same_idx < $same_sum; $same_idx++) {
                    echo "\n・";
                    echo $arr_key[$arr_same[$same_idx]];
                }
                $done = true;
            } else if ($accept_sum == 1) { // 只有一個可接受
                //echo "只有一個可接受\n";
                echo $arr_value[$arr_accept[0]];
                $done = true;
            } else if ($accept_sum > 0) { // 有一個以上可接受
                //echo "有一個以上可接受\n";
                echo "請問您想要查詢的是？";
                for ($accept_idx = 0; $accept_idx < $accept_sum; $accept_idx++) {
                    echo "\n・";
                    echo $arr_key[$arr_accept[$accept_idx]];
                }
                $done = true;
            }
        }
        
        //echo strpos($str1, $str2[1]);
        //echo "\n";
        //echo strlen($str2);
        //echo "\n";
        
        //echo $str2[0];
        //echo 1==0;
        //echo $str2[2];
        //echo "\n";
        
        //$answer = $arr[$search];
        //$answerlen = strlen($answer);
        
        
        
        
        if ($done == false) {
            //$html = file_get_html('http://llc.caece.net/?sfid=1142&_sf_s=' . $search);
            $html = file_get_html('http://wra.caece.net/test/nds.html');
			$cnt  = 0;
			//echo $html;
			//echo "\n";
            //foreach ($html->find('article') as $element) {
            foreach ($html->find('今天停止上班、停止上課。') as $element) {
				//$element1 = $element->find('h2');
				$element1 = $element->find('FONT size=2');
				//echo $html;
				//echo "\n";
				echo $element1;
				echo "\n";
                if (sizeof($element1) > 0) {
                    $element2 = $element1[0]->find('a');
                    if (sizeof($element2) > 0) {
                        echo $element2[0]->innertext;
                        echo "\n"; // for line, pure text  
                        // echo '<br>';    
                        $cnt += 1;
                    }
                    
                    $element1 = $element->find('a');
                    if (sizeof($element1) > 0) {
                        echo 'http://llc.caece.net' . $element1[0]->href;
                        echo "\n"; // for line, pure text  
                        // echo '<br>';    
                    }
                }
                //        echo $element->src . '<br>';
            }
            
            if ($cnt == 0) {
                echo "對不起，我現在還找不到您需要的資料，麻煩您詢問其他問題，非常感謝您向我詢問需要的資訊，我會盡快學習更多功能，提供更好的服務。";
            }
            // Find all links 
            //foreach($html->find('a') as $element) 
            //       echo $element->href . '<br>';
            
            // var_dump($html);       
        }
    }
}


function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array      = array();
    $sortable_array = array();
    
    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }
        
        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }
        
        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }
    
    return $new_array;
}



function output_array2($rain_arr, $hr)
{
    $i = 0;
    
    foreach ($rain_arr as $k2 => $v2) {
        if ($i < 5) {
            echo "  " . ($i + 1) . ". " . $v2["StaName"] . " : ";
            switch ($hr) {
                case 1:
                    echo $v2["Hour1"] . "\n";
                    break;
                case 3:
                    echo $v2["Hour3"] . "\n";
                    break;
                case 6:
                    echo $v2["Hour6"] . "\n";
                    break;
                case 10:
                    echo $v2["M10"] . "\n";
                    break;
                case 12:
                    echo $v2["Hour12"] . "\n";
                    break;
                case 24:
                    echo $v2["Hour24"] . "\n";
                    break;
                case 100:
                    echo $v2["Day1"] . "\n";
                    break;
                case 200:
                    echo $v2["Day2"] . "\n";
                    break;
                case 300:
                    echo $v2["Day3"] . "\n";
                    break;
            }
        }
        $i += 1;
    }
}



?>