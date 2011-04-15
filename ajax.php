<?php
/*
        
        Copyright 2011 Saket Choudhary  <saketkc@gmail.com>
        
        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.
        
        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
        
        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
        MA 02110-1301, USA.
       */

$api_key="API";
$secret="SECRET";

$proxy="PROXY";
$pass="USER:PWD";

if ($_GET['op']=="ajaxrequest")
{

	$var=$_GET['query'];
	$ts=time();
	$hash=sha1($secret.$ts);
	$apiurl="http://www.slideshare.net/api/2/search_slideshows?q=$var";
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
	curl_setopt($ch, CURLOPT_PROXYPORT,80);
	curl_setopt($ch, CURLOPT_PROXYUSERPWD,$pass);
	$url = $apiurl."&api_key=$api_key&ts=$ts&hash=$hash&items_per_page=1";
	curl_setopt ($ch, CURLOPT_URL, $url);
	$file_contents = curl_exec($ch);
	$xml = simplexml_load_string($file_contents);
	$number=1;
	foreach ( $xml->Slideshow as $files)
	{
		echo ($files->Embed);
		die();
	}

}
if ($_GET['op']=="numberrequest")
{


	$num=$_GET['number'];
	$query=$_GET['query'];
	$timeout=0;
	$ts=time();
	$hash=sha1($secret.$ts);
	$apiurl="http://www.slideshare.net/api/2/search_slideshows?q=$query";
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
	curl_setopt($ch, CURLOPT_PROXYPORT,80);
	curl_setopt($ch, CURLOPT_PROXYUSERPWD,$pass);
	$url = $apiurl."&api_key=$api_key&ts=$ts&hash=$hash&items_per_page=$num";
	curl_setopt ($ch, CURLOPT_URL, $url);
	$file_contents = curl_exec($ch);
	$xml = simplexml_load_string($file_contents);

	$number=1;
	foreach ( $xml->Slideshow as $files)
	{

	/*$URL= $files->URL;
	 $DownloadUrl= explode("?",$files->DownloadUrl);
	 $ThumbUrl=explode("/", $DownloadUrl[0]);
	 $thumb= explode(".", $ThumbUrl[4]);
	 $href=$URL."#".$thumb[0];*/
 
 if ($number==$num)
 {
	 echo $files->Embed;
	 die();
 }
 
 $number=$number+1;
 
 
	}
}
?>


