<?php
//Author: Terry Brady, Georgetown University Libraries
//Modified by: Alyssa Anderson, 2019 Summer Intern, ExxonMobil Upstream Library
class Alma 
{
    function __construct() 
    {
        $configpath = parse_ini_file ("Alma.prop", false);
        $proppath = $configpath["proppath"];
        $sconfig = parse_ini_file ($proppath, false);
        $this->alma_apikey = $sconfig["ALMA_APIKEY"];
	}

    function getApiKey() 
    {
        return $this->alma_apikey;
    }

    function getRequest($param) 
    {
        if (isset($param["apipath"]))
        {
            $apipath = $param["apipath"];
            unset($param["apipath"]);
            $param["apikey"] = $this->getApiKey();
            $url = "{$apipath}?" . http_build_query($param);
            $ch = curl_init();
            
            // setup PHP to be proxy aware
            curl_setopt($ch, CURLOPT_PROXY, 'http://hoeprx01.na.xom.com:8080');
            //curl_setopt($handle, CURLOPT_PROXYUSERPWD, "[username]:[password]");
            
            //testing no verify
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
            
            $jsonstr = curl_exec ($ch);
            
            curl_close ($ch);
            echo $jsonstr;
            
        }
        echo "";
        
    }

}
