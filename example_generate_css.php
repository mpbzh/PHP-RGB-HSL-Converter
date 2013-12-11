<?php
// Include RGB/HSL Converter
include('rgb_hsl_converter.inc.php');

// Get base color
$basecolor = $_GET['h'];
$hsl = hex2hsl($basecolor);

// Calculate colors
$gradfrom 	= hsl2hex(array($hsl[0], $hsl[1], 0.83));
$default_bg = hsl2hex(array($hsl[0], $hsl[1], 0.8));
$gradto 	= hsl2hex(array($hsl[0], $hsl[1], 0.67));
$border 	= hsl2hex(array($hsl[0], $hsl[1], 0.35));
$text 		= hsl2hex(array($hsl[0], $hsl[1], 0.17));

// If no name is given the script generates the CSS for default colors (grey)
$name = (isset($_GET['n']) && $_GET['n'] !== "") ? $_GET['n'] : 'Default Color';
$cssclass = (isset($_GET['n']) && $_GET['n'] !== "") ? ".".strtolower($_GET['n']) : '';

// Specify file header
header('Content-Type: text/css; charset: UTF-8;');
?>
/* <?=$name;?> */
.message<?=$cssclass;?> .bubble {
	background: <?=$default_bg;?>;
	background: -moz-linear-gradient(top, <?=$gradfrom;?> 0%, <?=$gradto;?> 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?=$gradfrom;?>), color-stop(100%,<?=$gradto;?>));
	background: -webkit-linear-gradient(top, <?=$gradfrom;?> 0%,<?=$gradto;?> 100%);
	background: -o-linear-gradient(top, <?=$gradfrom;?> 0%,<?=$gradto;?> 100%);
	background: -ms-linear-gradient(top, <?=$gradfrom;?> 0%,<?=$gradto;?> 100%);
	background: linear-gradient(to bottom, <?=$gradfrom;?> 0%,<?=$gradto;?> 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$gradfrom;?>', endColorstr='<?=$gradto;?>',GradientType=0 );
	border: 1px solid <?=$border;?>;
}

.message<?=$cssclass;?> .bubble:before {
	border-color: transparent transparent <?=$border;?> <?=$border;?>;
	background-color: <?=$default_bg;?>;
}

.message<?=$cssclass;?> .bubble:after {
	border-color: <?=$border;?> <?=$border;?> transparent transparent;
	background-color: <?=$default_bg;?>;
}

.message<?=$cssclass;?> .bubble .text {
	color: <?=$text;?>;
}

.message<?=$cssclass;?> .bubble .meta {
	color: <?=$border;?>;
}