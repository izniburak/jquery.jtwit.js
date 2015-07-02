<?php 
/* ******************************************************************************
	Developer: Ýzni Burak Demirtaþ (@izniburak)
	Web: http://burakdemirtas.org
	Project: jQuery jTwit
	Version: 1.0
	Project Page: http://burakdemirtas.org/projects/jquery.jtwit/
	Older Version: http://coda.co.za/content/projects/jquery.twitter/
	License: GNU General Public License (http://www.gnu.org/copyleft/gpl.html)
******************************************************************************* */

###  SETTINGS  ###
/* 
	How to create an application?
	Visit http://dev.twitter.com
	Help? -> http://burakdemirtas.org/projects/jquery.jtwit/twitter-api/
*/
$settings = array(
	'oauth_access_token' => "YOUR oAuth ACCESS TOKEN KEY",
	'oauth_access_token_secret' => "YOUR oAuth ACCESS TOKEN SECRET",
	'consumer_key' => "YOUR CONSUMER KEY",
	'consumer_secret' => "YOUR CONSUMER SECRET"
);

###  DO NOT EDIT THIS SECTION  ###
if (empty($_SERVER['HTTP_REFERER']) && 'twitter.php' == basename($_SERVER['SCRIPT_FILENAME'])) exit();
require_once('TwitterAPIExchange.php'); extract($_GET);
$url			= 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield		= '?screen_name='.$screen_name.'&count='.$count.'&include_rts='.$include_rts.'&excludeReplies='.$excludeReplies;
$requestMethod	= 'GET';
$twitter		= new TwitterAPIExchange($settings);
$data			= $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(); echo $data;
