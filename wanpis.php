<?php

// Created By : Gidhan Bagus Algary
// Recode By : Raul Arrafi

date_default_timezone_set('Asia/Jakarta');

echo "============\n";
echo "Anjay Wanpis\n";
echo "============\n";
echo "Eps: ";
$eps = trim(fgets(STDIN));

$link = "https://www.samehadaku.tv/one-piece-episode-".$eps."-subtitle-indonesia/";
$send = file_get_contents($link);
$info = get_between($send, '<p><b>Video </b>MKV</p>'."\n".'<div class="download-eps">'."\n".'<ul>', "</ul>\n</div>");
$infos = get_between($info, '<li style="text-align: center;"><strong>720p </strong>', '<span style="color: #ff0000;">MU</span></a></li>');
$infox = get_between($infos, 'GD</a> | <a style="color: #ff0000;" href="', '" target="_blank" rel="noopener noreferrer">ZS');
$link = file_get_contents($infox);
$links = get_between($link, '<div class="download-link" style="text-align:center;font-size:14px;"><a href="', '" rel="nofollow" target="_blank">Berharap setengah mati, yang dapat malah teman sendiri.</a></div>');
$linx = file_get_contents($links);
$linxs = get_between($linx, '<div class="download-link" style="text-align:center;font-size:14px;"><a href="', '" rel="nofollow" target="_blank">Tetap tanggap meski sudah tak dianggap</a></div>');
$down = file_get_contents($linxs);
$load = get_between($down, '<meta property="og:url" content="//', '" />');
$anjay = "Link: https://".$load."\n";
echo "============\n";
echo $anjay;
echo "============";

function get_between($string, $start, $end) {
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}
