<?php

/**
 * Grandstream GXP Phone File
 *
 * @author Cody Null
 * @license MPL / GPLv2 / LGPL
 * @package Provisioner
 * 
 */
class endpoint_grandstream_gxphd_phone extends endpoint_grandstream_base {

    public $family_line = 'gxphd';
    
    // VPK P-Values for GXP2130/GXP2140/GXP2160/GXP2170
    public $vpk_pcodes  = array(
        array(1363,1364,1465,1466),
        array(1365,1366,1467,1468),
        array(1367,1368,1469,1470),
        array(1369,1370,1471,1472),
        array(1371,1372,1473,1474),
        array(1373,1374,1475,1476),
        array(23800,23801,23802,23803),
        array(23804,23805,23806,23807),
        array(23808,23809,23810,23811),
        array(23812,23813,23814,23815),
        array(23816,23817,23818,23819),
        array(23820,23821,23822,23823),
        array(23824,23825,23826,23827),
        array(23828,23829,23830,23831),
        array(23832,23833,23834,23835),
        array(23836,23837,23838,23839),
        array(23840,23841,23842,23843),
        array(23844,23845,23846,23847),
        array(23848,23849,23850,23851),
        array(23852,23853,23854,23855),
        array(23856,23857,23858,23859),
        array(23860,23861,23862,23863),
        array(23864,23865,23866,23867),
        array(23868,23869,23870,23871),
        array(23872,23873,23874,23875),
        array(23876,23877,23878,23879),
        array(23880,23881,23882,23883),
        array(23884,23885,23886,23887),
        array(23888,23889,23890,23891),
        array(23892,23893,23894,23895),
        array(23896,23897,23898,23899),
        array(23900,23901,23902,23903),
        array(23904,23905,23906,23907),
        array(23908,23909,23910,23911),
        array(23912,23913,23914,23915),
        array(23916,23917,23918,23919),
        array(23920,23921,23922,23923),
        array(23924,23925,23926,23927),
        array(23928,23929,23930,23931),
        array(23932,23933,23934,23935),
        array(23936,23937,23938,23939),
        array(23940,23941,23942,23943),
        array(23944,23945,23946,23947),
        array(23948,23949,23950,23951),
        array(23952,23953,23954,23955),
        array(23956,23957,23958,23959),
        array(23960,23961,23962,23963),
        array(23964,23965,23966,23967)
    );
    
    // MPK P-Values for GXP2130/GXP2160
    public $mpk_pcodes = array(
        array(323,301,302,303),
        array(324,304,305,306),
        array(325,307,308,309),
        array(326,310,311,312),
        array(327,313,314,315),
        array(328,316,317,318),
        array(329,319,320,321),
        array(353,354,355,356),
        array(357,358,359,360),
        array(361,362,363,364),
        array(365,366,367,368),
        array(369,370,371,372),
        array(373,374,375,376),
        array(377,378,379,380),
        array(381,382,383,384),
        array(385,386,387,388),
        array(389,390,391,392),
        array(393,394,395,396),
        array(1440,1441,1442,1443),
        array(1444,1445,1446,1447),
        array(1448,1449,1450,1451),
        array(1452,1453,1454,1455),
        array(1456,1457,1458,1459),
        array(1460,1461,1462,1463)
    );

    // EXT1 P-Values for GXP2140/2170
    public $ext1_pcodes = array(
        array(23000,23001,23002,23003),
        array(23005,23006,23007,23008),
        array(23010,23011,23012,23013),
        array(23015,23016,23017,23018),
        array(23020,23021,23022,23023),
        array(23025,23026,23027,23028),
        array(23030,23031,23032,23033),
        array(23035,23036,23037,23038),
        array(23040,23041,23042,23043),
        array(23045,23046,23047,23048),
        array(23050,23051,23052,23053),
        array(23055,23056,23057,23058),
        array(23060,23061,23062,23063),
        array(23065,23066,23067,23068),
        array(23070,23071,23072,23073),
        array(23075,23076,23077,23078),
        array(23080,23081,23082,23083),
        array(23085,23086,23087,23088),
        array(23090,23091,23092,23093),
        array(23095,23096,23097,23098),
        array(23100,23101,23102,23103),
        array(23105,23106,23107,23108),
        array(23110,23111,23112,23113),
        array(23115,23116,23117,23118),
        array(23120,23121,23122,23123),
        array(23125,23126,23127,23128),
        array(23130,23131,23132,23133),
        array(23135,23136,23137,23138),
        array(23140,23141,23142,23143),
        array(23145,23146,23147,23148),
        array(23150,23151,23152,23153),
        array(23155,23156,23157,23158),
        array(23160,23161,23162,23163),
        array(23165,23166,23167,23168),
        array(23170,23171,23172,23173),
        array(23175,23176,23177,23178),
        array(23180,23181,23182,23183),
        array(23185,23186,23187,23188),
        array(23190,23191,23192,23193),
        array(23195,23196,23197,23198)
    );

    // EXT2 P-Values for GXP2140/2170
    public $ext2_pcodes = array(
        array(23200,23201,23202,23203),
        array(23205,23206,23207,23208),
        array(23210,23211,23212,23213),
        array(23215,23216,23217,23218),
        array(23220,23221,23222,23223),
        array(23225,23226,23227,23228),
        array(23230,23231,23232,23233),
        array(23235,23236,23237,23238),
        array(23240,23241,23242,23243),
        array(23245,23246,23247,23248),
        array(23250,23251,23252,23253),
        array(23255,23256,23257,23258),
        array(23260,23261,23262,23263),
        array(23265,23266,23267,23268),
        array(23270,23271,23272,23273),
        array(23275,23276,23277,23278),
        array(23280,23281,23282,23283),
        array(23285,23286,23287,23288),
        array(23290,23291,23292,23293),
        array(23295,23296,23297,23298),
        array(23300,23301,23302,23303),
        array(23305,23306,23307,23308),
        array(23310,23311,23312,23313),
        array(23315,23316,23317,23318),
        array(23320,23321,23322,23323),
        array(23325,23326,23327,23328),
        array(23330,23331,23332,23333),
        array(23335,23336,23337,23338),
        array(23340,23341,23342,23343),
        array(23345,23346,23347,23348),
        array(23350,23351,23352,23353),
        array(23355,23356,23357,23358),
        array(23360,23361,23362,23363),
        array(23365,23366,23367,23368),
        array(23370,23371,23372,23373),
        array(23375,23376,23377,23378),
        array(23380,23381,23382,23383),
        array(23385,23386,23387,23388),
        array(23390,23391,23392,23393),
        array(23395,23396,23397,23398)
    );

    // EXT3 P-Values for GXP2140/2170
    public $ext3_pcodes = array(
        array(23400,23401,23402,23403),
        array(23405,23406,23407,23408),
        array(23410,23411,23412,23413),
        array(23415,23416,23417,23418),
        array(23420,23421,23422,23423),
        array(23425,23426,23427,23428),
        array(23430,23431,23432,23433),
        array(23435,23436,23437,23438),
        array(23440,23441,23442,23443),
        array(23445,23446,23447,23448),
        array(23450,23451,23452,23453),
        array(23455,23456,23457,23458),
        array(23460,23461,23462,23463),
        array(23465,23466,23467,23468),
        array(23470,23471,23472,23473),
        array(23475,23476,23477,23478),
        array(23480,23481,23482,23483),
        array(23485,23486,23487,23488),
        array(23490,23491,23492,23493),
        array(23495,23496,23497,23498),
        array(23500,23501,23502,23503),
        array(23505,23506,23507,23508),
        array(23510,23511,23512,23513),
        array(23515,23516,23517,23518),
        array(23520,23521,23522,23523),
        array(23525,23526,23527,23528),
        array(23530,23531,23532,23533),
        array(23535,23536,23537,23538),
        array(23540,23541,23542,23543),
        array(23545,23546,23547,23548),
        array(23550,23551,23552,23553),
        array(23555,23556,23557,23558),
        array(23560,23561,23562,23563),
        array(23565,23566,23567,23568),
        array(23570,23571,23572,23573),
        array(23575,23576,23577,23578),
        array(23580,23581,23582,23583),
        array(23585,23586,23587,23588),
        array(23590,23591,23592,23593),
        array(23595,23596,23597,23598)
    );

    // EXT4 P-Values for GXP2140/2170
    public $ext4_pcodes = array(
        array(23600,23601,23602,23603),
        array(23605,23606,23607,23608),
        array(23610,23611,23612,23613),
        array(23615,23616,23617,23618),
        array(23620,23621,23622,23623),
        array(23625,23626,23627,23628),
        array(23630,23631,23632,23633),
        array(23635,23636,23637,23638),
        array(23640,23641,23642,23643),
        array(23645,23646,23647,23648),
        array(23650,23651,23652,23653),
        array(23655,23656,23657,23658),
        array(23660,23661,23662,23663),
        array(23665,23666,23667,23668),
        array(23670,23671,23672,23673),
        array(23675,23676,23677,23678),
        array(23680,23681,23682,23683),
        array(23685,23686,23687,23688),
        array(23690,23691,23692,23693),
        array(23695,23696,23697,23698),
        array(23700,23701,23702,23703),
        array(23705,23706,23707,23708),
        array(23710,23711,23712,23713),
        array(23715,23716,23717,23718),
        array(23720,23721,23722,23723),
        array(23725,23726,23727,23728),
        array(23730,23731,23732,23733),
        array(23735,23736,23737,23738),
        array(23740,23741,23742,23743),
        array(23745,23746,23747,23748),
        array(23750,23751,23752,23753),
        array(23755,23756,23757,23758),
        array(23760,23761,23762,23763),
        array(23765,23766,23767,23768),
        array(23770,23771,23772,23773),
        array(23775,23776,23777,23778),
        array(23780,23781,23782,23783),
        array(23785,23786,23787,23788),
        array(23790,23791,23792,23793),
        array(23795,23796,23797,23798)
    );

    function parse_lines_hook($line_data, $line_total) {
        $line_data['line_active'] = (isset($line_data['secret']) ? '1' : '0');
        return($line_data);
    }

    function get_gmtoffset($timezone) {
        $timezone = str_replace(":", ".", $timezone);
        $timezone = str_replace("30", "5", $timezone);
        if (strrchr($timezone, '+')) {
            $num = explode("+", $timezone);
            $num = $num[1];
            $offset = 720 + ($num * 60);
        } elseif (strrchr($timezone, '-')) {
            $num = explode("-", $timezone);
            $num = $num[1];
            $offset = 720 + ($num * -60);
        }
        return($offset);
    }

    function prepare_for_generateconfig() {
        parent::prepare_for_generateconfig();

        if (isset($this->settings['dialplan'])) {
            $this->settings['dialplan'] = str_replace("+", "%2B", $this->settings['dialplan']);
        }

        if (isset($this->settings['loops']['MPK'])) {
            foreach ($this->settings['loops']['MPK'] as $key => $data) {
                if ($this->settings['loops']['MPK'][$key]['mode'] == '999') {
                    $this->settings['loops']['MPK'][$key]['account'] = '';
                    $this->settings['loops']['MPK'][$key]['name'] = '';
                    $this->settings['loops']['MPK'][$key]['uid'] = '';
                    $this->settings['loops']['MPK'][$key]['mode'] = '';
                }
                $this->settings['loops']['MPK'][$key]['pnum1'] = $this->mpk_pcodes[$key - 1][0];
                $this->settings['loops']['MPK'][$key]['pnum2'] = $this->mpk_pcodes[$key - 1][1];
                $this->settings['loops']['MPK'][$key]['pnum3'] = $this->mpk_pcodes[$key - 1][2];
                $this->settings['loops']['MPK'][$key]['pnum4'] = $this->mpk_pcodes[$key - 1][3];
            }
        }

        if (isset($this->settings['loops']['VPK'])) {
            foreach ($this->settings['loops']['VPK'] as $key => $data) {
                if ($this->settings['loops']['VPK'][$key]['mode'] == '-1') {
                    $this->settings['loops']['VPK'][$key]['account'] = '';
                    $this->settings['loops']['VPK'][$key]['name'] = '';
                    $this->settings['loops']['VPK'][$key]['uid'] = '';
                    $this->settings['loops']['VPK'][$key]['mode'] = '-1';
                }
                $this->settings['loops']['VPK'][$key]['pnum1'] = $this->vpk_pcodes[$key - 1][0];
                $this->settings['loops']['VPK'][$key]['pnum2'] = $this->vpk_pcodes[$key - 1][1];
                $this->settings['loops']['VPK'][$key]['pnum3'] = $this->vpk_pcodes[$key - 1][2];
                $this->settings['loops']['VPK'][$key]['pnum4'] = $this->vpk_pcodes[$key - 1][3];
            }
        }

        if (isset($this->settings['loops']['EXT1'])) {
            foreach ($this->settings['loops']['EXT1'] as $key => $data) {
                if ($this->settings['loops']['EXT1'][$key]['mode'] == '-1') {
                    $this->settings['loops']['EXT1'][$key]['account'] = '';
                    $this->settings['loops']['EXT1'][$key]['name'] = '';
                    $this->settings['loops']['EXT1'][$key]['uid'] = '';
                    $this->settings['loops']['EXT1'][$key]['mode'] = '0';
                }
                $this->settings['loops']['EXT1'][$key]['pnum1'] = $this->ext1_pcodes[$key - 1][0];
                $this->settings['loops']['EXT1'][$key]['pnum2'] = $this->ext1_pcodes[$key - 1][1];
                $this->settings['loops']['EXT1'][$key]['pnum3'] = $this->ext1_pcodes[$key - 1][2];
                $this->settings['loops']['EXT1'][$key]['pnum4'] = $this->ext1_pcodes[$key - 1][3];
            }
        }

        if (isset($this->settings['loops']['EXT2'])) {
            foreach ($this->settings['loops']['EXT2'] as $key => $data) {
                if ($this->settings['loops']['EXT2'][$key]['mode'] == '-1') {
                    $this->settings['loops']['EXT2'][$key]['account'] = '';
                    $this->settings['loops']['EXT2'][$key]['name'] = '';
                    $this->settings['loops']['EXT2'][$key]['uid'] = '';
                    $this->settings['loops']['EXT2'][$key]['mode'] = '0';
                }
                $this->settings['loops']['EXT2'][$key]['pnum1'] = $this->ext2_pcodes[$key - 1][0];
                $this->settings['loops']['EXT2'][$key]['pnum2'] = $this->ext2_pcodes[$key - 1][1];
                $this->settings['loops']['EXT2'][$key]['pnum3'] = $this->ext2_pcodes[$key - 1][2];
                $this->settings['loops']['EXT2'][$key]['pnum4'] = $this->ext2_pcodes[$key - 1][3];
            }
        }

        if (isset($this->settings['loops']['EXT3'])) {
            foreach ($this->settings['loops']['EXT3'] as $key => $data) {
                if ($this->settings['loops']['EXT3'][$key]['mode'] == '-1') {
                    $this->settings['loops']['EXT3'][$key]['account'] = '';
                    $this->settings['loops']['EXT3'][$key]['name'] = '';
                    $this->settings['loops']['EXT3'][$key]['uid'] = '';
                    $this->settings['loops']['EXT3'][$key]['mode'] = '0';
                }
                $this->settings['loops']['EXT3'][$key]['pnum1'] = $this->ext3_pcodes[$key - 1][0];
                $this->settings['loops']['EXT3'][$key]['pnum2'] = $this->ext3_pcodes[$key - 1][1];
                $this->settings['loops']['EXT3'][$key]['pnum3'] = $this->ext3_pcodes[$key - 1][2];
                $this->settings['loops']['EXT3'][$key]['pnum4'] = $this->ext3_pcodes[$key - 1][3];
            }
        }

        if (isset($this->settings['loops']['EXT4'])) {
            foreach ($this->settings['loops']['EXT4'] as $key => $data) {
                if ($this->settings['loops']['EXT4'][$key]['mode'] == '-1') {
                    $this->settings['loops']['EXT4'][$key]['account'] = '';
                    $this->settings['loops']['EXT4'][$key]['name'] = '';
                    $this->settings['loops']['EXT4'][$key]['uid'] = '';
                    $this->settings['loops']['EXT4'][$key]['mode'] = '0';
                }
                $this->settings['loops']['EXT4'][$key]['pnum1'] = $this->ext4_pcodes[$key - 1][0];
                $this->settings['loops']['EXT4'][$key]['pnum2'] = $this->ext4_pcodes[$key - 1][1];
                $this->settings['loops']['EXT4'][$key]['pnum3'] = $this->ext4_pcodes[$key - 1][2];
                $this->settings['loops']['EXT4'][$key]['pnum4'] = $this->ext4_pcodes[$key - 1][3];
            }
        }

    }

    function reboot() {
        if (($this->engine == "asterisk") AND ($this->system == "unix")) {
            exec($this->engine_location . " -rx 'sip show peers like " . $this->settings['line'][0]['username'] . "'", $output);
            if (preg_match("/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/", $output[1], $matches)) {
                $ip = $matches[0];
                $pass = (isset($this->options['admin_pass']) ? $this->options['admin_pass'] : 'admin');

                if (function_exists('curl_init')) {
                    $ckfile = tempnam($this->sys_get_temp_dir(), "GSCURLCOOKIE");
                    $ch = curl_init('http://' . $ip . '/cgi-bin/dologin');
                    curl_setopt($ch, CURLOPT_COOKIEJAR, $ckfile);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);

                    $data = array(
                        'P2' => $pass,
                        'Login' => 'Login',
                        'gnkey' => '0b82'
                    );
                    
                     $data = array(
                        'password' => $pass
                    );

                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    $output = curl_exec($ch);
                    $login_result = json_decode($output, true);
                    $info = curl_getinfo($ch);
                    curl_close($ch);

                    $ch = curl_init("http://" . $ip . "/cgi-bin/api-sys_operation?request=PROV&sid=" . $login_result['body']['sid']);
                    curl_setopt($ch, CURLOPT_COOKIEFILE, $ckfile);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $output = curl_exec($ch);
                    curl_close($ch);                            
                }
            }
        }
    }
}
