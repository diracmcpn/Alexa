<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

   <head>
   </head>
   
   <body>
<?php
     
     //First Example
     echo "Alexa Traffic Rank : ".getAlexaRank("google.com");
     
     //Second Example
     $listDomaine = array("google.com"=>0, "hyip.com"=>0, "siteduzero.com"=>0, "yahoo.com"=>0);
     foreach ($listDomaine as $domain => $rank)
     {
	  $listDomaine[$domain] = str_replace(',','', getAlexaRank($domain));
     }
     
     asort($listDomaine);
     print_r($listDomaine);
     
?>
   </body>
   
</html>