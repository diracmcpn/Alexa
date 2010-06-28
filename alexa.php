<?php

     function getAlexaRank($domain, $timeout = 10)
     {
	  $handle = curl_init("http://www.alexa.com/search?q=".$domain."&r=site_screener&p=bigtop");
	  curl_setopt($handle, CURLOPT_TIMEOUT, $timeout);
	  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, $timeout);
	  curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
	  $data = curl_exec($handle);
	  curl_close($handle);

	  $doc = new DOMDocument();
	  $doc->loadHTML($data);
	  $listul = $doc->getElementsByTagName('ul');
	  foreach ($listul as $ul)
	  {
	       if ($ul->getAttribute("class")=="traffic-stats")
	       {
		   $rank = $ul->getElementsByTagName('li')->item(0)->getElementsByTagName('a')->item(0)->firstChild->nodeValue;
	       }
	  }
	  return $rank;
     }
?>
