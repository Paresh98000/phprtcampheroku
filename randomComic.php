<?php
    function getComic(){
        // URLs
        $url_random_comic = "https://c.xkcd.com/random/comic/";
        $url_comic_json = "https://xkcd.com/comicnumber/info.0.json";
        $url_comic = "";
        // variables
        $comicNo = 0;

        $data = "";

        // get headers of response
        $res = get_headers($url_random_comic,1);

        if($res != null){
            $randomUrl = $res["Location"];
            
            if(is_array($randomUrl))
                $url_comic = $randomUrl[0];
            else $url_comic = $randomUrl;

            $comicNo = basename($url_comic);
        }

        if($comicNo!=0)
        {
            // build jsonUrl
            $url_comic = str_replace('comicnumber',$comicNo,$url_comic_json);
            $handle = fopen($url_comic, "rb");

            $contents = '';
            while (!feof($handle)) {
            $contents .= fread($handle, 8192);
            }

            fclose($handle);

            $jsonObject = json_decode($contents);
            $imgSrc = $jsonObject->img;
            $alter = $jsonObject->alt;
            $title = $jsonObject->safe_title;
            $year = $jsonObject->year;
            $month = $jsonObject->month;
            $day = $jsonObject->day;
            $data .= "<h2>$title</h2>";
            //echo "<h2>$title</h2>";
            $data .= "<h5>$day/$month/$year</h5>";
            //echo "<h5>$day/$month/$year</h5>";
            $data .= "<img src='$imgSrc' alt='$alter'/>";
            //echo "<img src='$imgSrc' alt='$alter'/>";
        }
        return $data;
    }
?>