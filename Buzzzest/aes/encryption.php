<?php
	//gets the encryption functions
	require_once(dirname(__FILE__) . "/AESEncryption.php");
	
	include("seckey.php");
	$data = array("0110200521091972",
"0101200201091966",
"1811200218051978",
"1811200215021975",
"0302200316111979",
"1703200327111978",
"1510200313101975",
"0101200411071982",
"0501200405051982",
"1201200409061977",
"0902200411101977",
"2104200423011979",
"0206200401011965",
"2106200404101983",
"1407200420111965",
"0106200119051978",
"0902200531081976",
"2103200503011974",
"1608200517091984",
"1608200523071982",
"1010200520081983",
"1010200509041982",
"2111200529071983",
"1704200605041980",
"1505200615071977",
"1505200622051982",
"0106200603041985",
"1506200620091984",
"1207200612071976",
"1707200615101973",
"2407200612071985",
"2507200604071980",
"0108200605031984",
"0108200624041982",
"0711200512051979",
"0408200620041974",
"1608200601021982",
"2108200614091980",
"0109200618071978",
"1109200616051982",
"1809200603051979",
"1809200626031978",
"0510200620111977",
"1511200602101982",
"1812200619111982",
"1603200615071980",
"2110200512091982",
"0401200715041981",
"1501200705081984",
"2010200505111977",
"2103200511111982",
"0906200508041984",
"1203200707061982",
"1903200718111975",
"1903200714061979",
"0407200520041983",
"0601200520081983",
"1106200709111982",
"1106200715051981",
"0707200730081966",
"0608200722081978",
"1608200709111980",
"1608200730071984",
"1608200715101984",
"1308200801121983",
"1709200801101984",
"2409200831071979",
"0110200827031986",
"0110200818011984",
"0810200820101983",
"1011200810071970",
"0112200806071982",
"2204200913041985",
"1105200921081985",
"1505200906071985",
"0807200919041985",
"2707200925051982",
"1008200902051986",
"1008200905071986",
"1210200902121983",
"2110200915011987",
"2610200904111985",
"0701200923111985",
"1602200910011960",
"1803200915101986",
"1803200906051987",
"2204200910021984",
"1105200922111986",
"1105200916051984",
"1006200906051987",
"1111200904041986",
"1611200917101984",
"1611200910041985",
"1412200923021970",
"1412200910101987",
"0401201029061982",
"2501201027101988",
"2501201026051984",
"0102201024041973",
"1002201015031988",
"2202201027091983",
"2202201026091986",
"1703201024051986",
"1601200805091985",
"1107200721091985",
"0701200822081980",
"2502200804031985",
"0511200821111986",
"1204201010041986",
"1905200814111984",
"0206200815041986",
"1209200728061986",
"0704200823031976",
"0505200826041983",
"1807200704011986",
"1205201020031984",
"2107200808061986",
"0407200828081981",
"1405200702051980",
"2304200715111981",
"1407200805011984",
"1104200717021982",
"1104200715051986",
"1203200728091983",
"1104200702071979",
"0407200527081984",
"1104200729031981",
"2106200417011981",
"2011200620061984",
"0102200720021980",
"1110200628111985",
"2011200620081983",
"2306200526071983",
"1202200730061984",
"1405200706091985",
"2304200706101980",
"0608200705091982",
"1807200708101985",
"1511200622101984",
"0407200708101978",
"2507200721051984",
"2603200705121983",
"0608200730081981",
"1107200713051980",
"2105200722081982",
"0608200720061985",
"2708200827021984",
"1211200812031983",
"1209200710061984",
"0511200826041984",
"2708200723031984",
"2409200806031981",
"0810200805051986",
"1510200830011984",
"1903200714081982",
"0812200814111985",
"1405200716071981",
"2010201007101982",
"1312201015091978",
"1312201003021986",
"2212201020071987",
"2712201003111981",
"2912201017081983",
"1001201110011980",
"1701201107041985",
"1701201130041986",
"2001201116111984",
"2401201111111986",
"1002201123111986",
"2302201105071984",
"2302201113051987",
"2803201105011986",
"2803201106121989",
"0108200728121983",
"0408200806051984",
"0407200706021984",
"0504201118041986",
"1104201120111985",
"0205201115121986",
"0605201127021987",
"0905201104101988",
"0905201127121988",
"1605201105121991",
"1605201116081988",
"1306201111011985",
"2006201121101986",
"2706201124111975",
"0407201124011988",
"0607201117061982",
"0707201101121983",
"1107201125121981",
"1307201101071987",
"0808201125091983",
"1708201125081989",
"2208201101021983",
"2208201121121990",
"2609201108111988",
"1010201122091981",
"0111201122041983",
"1212201113061976",
"0201201221091983",
"2603201218011985",
"2210200803031981",
"1709200701071983",
"0511200805081983",
"0507200710111985",
"0104200723071982",
"0104200720041984",
"0109200821111970",
"0904201218101987",
"0904201230011985",
"0904201223021984",
"1104201205111985",
"1104201231101989",
"1604201219091982",
"2304201218091982",
"2304201211041990",
"0705201206101985",
"0705201201081987",
"0705201220111986",
"0705201220081989",
"0705201207111989",
"2105201212051985",
"0606201228091989",
"1106201203071987",
"1106201203121986",
"1106201210111987",
"2506201211111985",
"2506201208011988",
"0907201204121983",
"1107201209111989",
"2507201215081979",
"0108201214021986",
"0608201207111989",
"0608201212021989",
"1608201218051989",
"1608201213081986",
"2008201209091986",
"2708201217071988",
"2808201219101987",
"1009201205111986",
"1009201208081987",
"1009201201011989",
"1709201221121985",
"2409201228011989",
"2409201212041990",
"2409201217081989",
"0310201208071985",
"0810201215081987",
"1510201216011985",
"1510201214051985",
"2410201224091989",
"2410201227101986",
"2410201213071987",
"0511201231071987",
"0711201226081990",
"0711201220101990",
"1911201227071988",
"1911201218081990",
"2111201220041987",
"2111201224081988",
"2611201203051991",
"0108201203061989",
"0108201231121989",
"0108201223111969",
"0108201210041989",
"0108201226091979",
"0108201225011973",
"0108201226031982",
"0108201201011989",
"0108201211081982",
"0108201215091990",
"0108201220061982",
"0108201206071992",
"0108201208011990"
);
	
	//foreach($data as $key)
	//{
		$data='123456';
		$sendData = md5($data);
		//echo $sendData."<br>";
		
		
	//}	
	
	$Data = base64_decode('MjAxMy0wMS0wNCAxMzowNzowMQ');
	//echo $Data;
		
	/*$datettime = date('Y');
	$year1 = date('Y', strtotime('+1 year'));
	$previousyear = $datettime.'-'.substr($year1,2);
	
	
	$year2 = date('Y', mktime(0,0,0,0,0,($datettime)));
	
	echo $datettime." ".$year1." ".$previousyear." ".$year2."<br/>";
	echo date('Y', strtotime('+1 year'));*/

$time1 = strtotime("2008-12-13 10:42:00");
$time2 = strtotime("2010-10-20 08:10:00");

echo $diff = $time2-$time1;
?>