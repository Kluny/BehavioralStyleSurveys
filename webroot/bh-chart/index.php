whtf?

<?php
die;
$src_file = 'behavioral_style_surveys/images/water_mark.jpg';
list($src_w, $src_h, $src_t, $src_a) = getimagesize($src_file);

$ptr_file = 'behavioral_style_surveys/images/dot.png'; // must have no transparency, but white background
list($ptr_w, $ptr_h, $ptr_t, $ptr_a) = getimagesize($ptr_file);

// destination image dimensions:
$dst_w = $src_w;
$dst_h = $src_h;

// pointer position:

$units_y	= ($_GET['O'] - $_GET['S']);		# off set 30 pixels from left side of image
$units_x	= ($_GET['D'] - $_GET['I']);		# off set 20 pixel from top edge of image

$units_on_x = 16.50;
$units_on_y = 16.50;

$ptr_x		= ( ( $units_x * $units_on_x ) + 203 );
$ptr_y		= ( 201 - ( $units_y * $units_on_y ) );

$srcImage = imageCreateFromJpeg($src_file) or die ('failed imageCreateFromJpg'); 

$colorCross = imageColorAllocate($srcImage, 0, 0, 0);

$dstImage = imageCreateTrueColor($dst_w, $dst_h) or die ('failed imageCreateTrueColor'); 

imageCopyResampled($dstImage, $srcImage, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h) or die ('failed imageCopyResampled'); 

$ptrImage = imageCreateFromPng($ptr_file) or die ('failed imageCreateFromPng'); 

$ptr_white = imageColorAllocate($ptrImage,255,255,255);
imageColorTransparent($ptrImage,$ptr_white);

imageCopyMerge($dstImage, $ptrImage, $ptr_x, $ptr_y, 0, 0, $ptr_w, $ptr_h, 100) or die ('failed imageCopyMerge');

imageJpeg($dstImage,'',100) or die ('failed imageJpeg');

imageDestroy($srcImage) or die ('failed imageDestroy(1)');
imageDestroy($dstImage) or die ('failed imageDestroy(2)');
imageDestroy($ptrImage) or die ('failed imageDestroy(3)');

?>