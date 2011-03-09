<?php
/*
$domain is the domain name.
$timeout is the maximum number of seconds to allow cURL functions to execute.
*/

     function getAlexaRank($domain, $timeout = 10)
     {
		//get the content of the webpage
	  	$handle = curl_init("http://www.alexa.com/search?q=".$domain."&r=site_screener&p=bigtop");
		curl_setopt($handle, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
		$data = curl_exec($handle);
		curl_close($handle);
		
		//parse the webpage by regex 
		preg_match("#Alexa Traffic Rank:(?:.+\s*){2}(.+)</a>#", $data, $result);
		return intval(str_replace(',','', $result[1]));
     }

?>

<?php
/*----TEST----*/

//First example
echo "Alexa Traffic Rank of google.com : ".getAlexaRank("google.com");

//Second Example
$domainArray = array("google.com"=>0, "hyip.com"=>0, "siteduzero.com"=>0, "yahoo.com"=>0);
foreach($domainArray as $domain => $rank)
{
  $domainArray[$domain] = getAlexaRank($domain);
}

asort($domainArray);
print_r($domainArray);

?>
