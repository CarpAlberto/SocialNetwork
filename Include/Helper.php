<?php

  class Helper{

  	 public static function UploadImage($targetDirectory,$name)
  	 {

           Session::init();
           $targetFile = $targetDirectory . basename($_FILES[$name]["name"]);
           $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
    		    if($_FILES[$name]["size"] > 15000000)
    		    {
    		       throw new Exception('Dimensiunea fisierului este prea mare');
    		    }
    		
  	        if (move_uploaded_file($_FILES[$name]["tmp_name"], $targetFile))
  	        {
  	            //echo "Fisier uploadat cu succes";
  	        }
  	        else
  	        {
  	            throw new Exception("Eroare la Uploadare fisier");
  	        }
        return $_FILES[$name]["name"];
  	}
   
  	public static function  GetDataFormat($year,$month,$day)
  	{
  		$dataOut = null;
      $dataOut = $dataOut . $year . '-';
  		switch ($month) {
  			case 'January':
  			   $dataOut = $dataOut . '01-';
  				break;
  			case 'February':
  			   $dataOut =  $dataOut .'02-';
  				break;
  			case 'March':
  			   $dataOut =  $dataOut .'03-';
  				break;
  			case 'April':
  			   $dataOut =  $dataOut .'04-';
  				break;
  			case 'May':
  			   $dataOut =  $dataOut .'05-';
  				break;
  			case 'June':
  			   $dataOut =  $dataOut .'06-';
  				break;
  			case 'July':
  			   $dataOut =  $dataOut .'07-';
  				break;
  			case 'August':
  			   $dataOut =  $dataOut .'08-';
  				break;
  			case 'September':
  			   $dataOut =  $dataOut .'09-';
  				break;
  			case 'October':
  			   $dataOut =  $dataOut .'10-';
  				break;
  		    case 'November':
  			   $dataOut =  $dataOut .'11-';
  				break;
  			default:
  				$dataOut =  $dataOut .'12-';
  				break;
  		}
  		$dataOut=$dataOut.$day;
  		return $dataOut; 
  	}
    public static function Time_Ago($time_ago)
    {
      $time_ago = strtotime($time_ago);
      $cur_time = time();
      $time_elapsed = $cur_time  - $time_ago;
      $seconds = $time_elapsed;
      $minutes = round($time_elapsed/60);
      $hours = round($time_elapsed/3600);
      $days =   round($time_elapsed/86400);
      $weeks = round($time_elapsed/604800);
      $months = round($time_elapsed/2600640);
      $years = round($time_elapsed/31207680);
      if($seconds <=60)
        return "Chiar acum";
      else if($minutes <=60)
      {
        if($minutes == 1)
          return "Un minut in urma";
        else
          return "$minutes minute in urma";
      }
      else if($hours <=24)
      {
        if($hours == 1)
        {
          return "Cu o ora in urma";
        }
        else
        {
             return "$hours ore in urma";
        }
      }
      else if($days <=7)
      {
        if($days == 1)
        {
          return "Cu o zi in urma";
        }
        else
        {
          return "$days zile in urma";
        }
      }
      else if($weeks <=4.3)
      {
        if($weeks == 1)
        {
          return "Cu o saptamana in urma";
        }
        else
        {
             return "$weeks saptamani in urma";
        }
      }
      else if($months <=12)
      {
        if($months == 1)
        {
          return "Cu o luna in urma";
        }
        else
        {
             return "$months luni in urma";
        }
      }
      else
      { 
        if($years == 1)
        {
          return "Cu un an in urma";
        }
        else
        {
             return "$months ani in urma";
        }
      }
    }
    function downloadFile($file, $name, $mime_type='')
      {
        set_time_limit(0);
        if(!is_readable($file)) 
            die('File not found or inaccessible!');
       
       $size = filesize($file);
       $name = rawurldecode($name);
       

       $known_mime_types=array(
        "pdf" => "application/pdf",
        "txt" => "text/plain",
        "html" => "text/html",
        "htm" => "text/html",
        "exe" => "application/octet-stream",
        "zip" => "application/zip",
        "doc" => "application/msword",
        "xls" => "application/vnd.ms-excel",
        "ppt" => "application/vnd.ms-powerpoint",
        "gif" => "image/gif",
        "png" => "image/png",
        "jpeg"=> "image/jpg",
        "jpg" =>  "image/jpg",
        "php" => "text/plain"
       );
       
       if($mime_type==''){
         $file_extension = strtolower(substr(strrchr($file,"."),1));
         if(array_key_exists($file_extension, $known_mime_types)){
          $mime_type=$known_mime_types[$file_extension];
         } else {
          $mime_type="application/force-download";
         };
       };
       
       //turn off output buffering to decrease cpu usage
       @ob_end_clean(); 
       
       // required for IE, otherwise Content-Disposition may be ignored
       if(ini_get('zlib.output_compression'))
        ini_set('zlib.output_compression', 'Off');
       
       header('Content-Type: ' . $mime_type);
       header('Content-Disposition: attachment; filename="'.$name.'"');
       header("Content-Transfer-Encoding: binary");
       header('Accept-Ranges: bytes');
       
       /* The three lines below basically make the 
          download non-cacheable */
       header("Cache-control: private");
       header('Pragma: private');
       header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
       
       // multipart-download and download resuming support
       if(isset($_SERVER['HTTP_RANGE']))
       {
        list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
        list($range) = explode(",",$range,2);
        list($range, $range_end) = explode("-", $range);
        $range=intval($range);
        if(!$range_end) {
          $range_end=$size-1;
        } else {
          $range_end=intval($range_end);
        }
        $new_length = $range_end-$range+1;
        header("HTTP/1.1 206 Partial Content");
        header("Content-Length: $new_length");
        header("Content-Range: bytes $range-$range_end/$size");
       } else {
        $new_length=$size;
        header("Content-Length: ".$size);
       }
       
       /* Will output the file itself */
       $chunksize = 1*(1024*1024); //you may want to change this
       $bytes_send = 0;
       if ($file = fopen($file, 'r'))
       {
        if(isset($_SERVER['HTTP_RANGE']))
        fseek($file, $range);
       
        while(!feof($file) && 
          (!connection_aborted()) && 
          ($bytes_send<$new_length)
              )
        {
          $buffer = fread($file, $chunksize);
          print($buffer); //echo($buffer); // can also possible
          flush();
          $bytes_send += strlen($buffer);
        }
       fclose($file);
       } 
           else
           die('Error - can not open file.');
           die();
      }
     
    }
?>


