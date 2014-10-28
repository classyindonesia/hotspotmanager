<?php
class Fungsi {




public static function get_waktu($tgl1, $tgl2){
  // Create two new DateTime-objects...
  $date1 = new DateTime($tgl1);
  $date2 = new DateTime($tgl2);

  // The diff-methods returns a new DateInterval-object...
  $diff = $date2->diff($date1);

  // Call the format method on the DateInterval-object
  return  $diff->format('%a Day and %h hours');
}

public static function timer()
{
    $time = explode(' ', microtime());
    return $time[0]+$time[1];
}

// Function to check response time
public static function ping($host, $port) { 
  $tB = microtime(true); 
  $fP = fSockOpen($host, $port, $errno, $errstr, 10); 
  if (!$fP) { return "down"; } 
  $tA = microtime(true); 
  return round((($tA - $tB) * 1000), 0)." ms"; 
}

public static function size($bytes){
        if ($bytes >= 1073741824){
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }elseif ($bytes >= 1048576){
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }elseif ($bytes >= 1024){
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }elseif ($bytes > 1){
            $bytes = $bytes . ' bytes';
        }elseif ($bytes == 1){
            $bytes = $bytes . ' byte';
        }else{
            $bytes = '0 bytes';
        }

        return $bytes;
}



public static function adflyurl($url) { 
  $ch = curl_init(); 
  $timeout = 30; 
  curl_setopt($ch,CURLOPT_URL,'http://api.adf.ly/api.php?key='.Fungsi::setup_variable('apikey_adfly').'&uid=881481&advert_type=int&domain='.Fungsi::setup_variable('domain_adfly').'&url='.$url); 
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout); 
  $data = curl_exec($ch); 
  curl_close($ch); 
  return $data; 
}



public static function singkatURL($url) { 
    $curlHandle = curl_init(); // melakukan request ke server Google API
    curl_setopt($curlHandle, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.Fungsi::setup_variable('apikey_google')); 
    curl_setopt($curlHandle, CURLOPT_HEADER, 0); 
    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0); 
    // menentukan tipe konten hasil request yg berupa JSON 
    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
    // parameter yang berisi URL yang akan disingkat 
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, '{"longUrl":"'.$url.'"}'); 
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($curlHandle, CURLOPT_TIMEOUT,30); 
    // lakukan request dengan POST method 
    curl_setopt($curlHandle, CURLOPT_POST, 1);
    // baca data hasil request yg berupa JSON 
    $content = curl_exec($curlHandle); 
    curl_close($curlHandle);
    // ekstrak data JSON untuk mendapatkan hasil URL yg disingkat 
    $data = json_decode($content); 
    return $data->id; 
}



 public static function file_get_contents_curl($url) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
      curl_setopt($ch, CURLOPT_URL, $url);
      $data = curl_exec($ch);
       if ($data === FALSE) {
        $data = NULL;
       }      
      curl_close($ch);
      return $data;
  }



 public static function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}



public static function check_url($url){
  $array = get_headers($url);
  $string = $array[0];
  if(strpos($string,"200"))
    {
      $data = 1; //ada
    }
    else
    {
      $data = 0; //tidak ada /404
    }  
    return $data;
}





  public static function limit_karakter($str){
    if(strlen($str) >=35 ){
      $pecah_str = explode(".", $str);
      $ekstensi =  $pecah_str[count($pecah_str) - 1];
      $output = substr($str, 0, 35).'.'.$ekstensi;
    }else{
      $output = $str;
    }
    return $output;
  }


  

  public static function filter($val = null){
    // $str = addslashes();
    if($val != NULL){
    $str = str_replace(['\r', '\n'], '',  $val);
    $o = explode(" ", $str);
    $jml = count($o) -1;
      for($i=0;$i<=$jml;$i++){
        $o[$i] = trim($o[$i]);
      }
    $str = implode(" ", $o);
    return HTML::entities($str);
  }else{
    return NULL;
  }
  }

  public static function HitungUmur($tgllhr){
     list($tgl,$bln,$thn) = explode('-',$tgllhr);
     $lahir = mktime(0, 0, 0, (int)$bln, (int)$tgl, $thn);
     //jam,menit,detik,bulan,tanggal,tahun
     $t = time();
     $umur = ($lahir < 0) ? ( $t + ($lahir * -1) ) : $t - $lahir;
     $tahun = 60 * 60 * 24 * 365;
     $tahunlahir = $umur / $tahun;
     $umursekarang = floor($tahunlahir);
     return $umursekarang;
    }



    public static function umur($tgl_lahir){ // format = YYYY-mm-dd
      //  string substr ( string $string , int $start [, int $length ] )
      $thn1 = substr($tgl_lahir, 0, 4);
      $bln1 = substr($tgl_lahir, 5, 2);
      $tgl1 = substr($tgl_lahir, 8, 2);

      $thn_now = date('Y').'-08'.'-01'; // per 31 agustus date('Y')
      $thn2 = substr($thn_now, 0, 4);
      $bln2 = substr($thn_now, 5, 2);
      $tgl2 = substr($thn_now, 8, 2);

      $ge1 = gregoriantojd($bln1,$tgl1,$thn1);
      $ge2 = gregoriantojd($bln2,$tgl2,$thn2);
      $selisih_hari = abs($ge1 - $ge2);

      return substr($selisih_hari / 365, 0, 2);

//     $tgl1=11; $bln1=9; $thn1=2008;
//     $tgl2=25; $bln2=9; $thn2=2008;
      //echo 'Selisih hari : ' . abs( gregoriantojd( $bln1, $tgl1, $thn1 ) - gregoriantojd( $bln2, $tgl2, $thn2 ) ) . ' hari';
 //return '('.$tgl2.') ('.$bln2.') ('.$thn2.')';
    }



  public static function log($user_id, $pesan){
    $log = new Mst_Log;
    $log->pesan = $pesan;
    $log->user_id = $user_id;
    $log->save();
  }



  public static function setup_variable($var){

    $val = Setup_Variable::where('variable', '=', $var)
          ->take(1)
          ->get();

    foreach($val as $list){
      $value = $list->value;
    }
    return $value;

  }


    
    
   public static function get_id($str_id){
         $str = explode("-", $str_id);
       $id= $str[count($str) - 1];
        return $id;
    }
    
    
    
    
    public static function random_element($array){
            if ( ! is_array($array))
            {
               return $array;
            }
            
            return $array[array_rand($array)];
	}
        
        
        public static function get_dropdown($model, $nama_dropdown = NULL){
            $data = array('' => '-pilih '.$nama_dropdown."-");
            foreach($model as $list){
                if(!empty($list->nama)){
                $data[$list->id] = $list->nama;
                }else{
                 $data[$list->id] = $list->judul;   
                }
            }
            
            return $data;
        }






        public static function bg_header(){
            $array = array();
            foreach(Bgheader::all() as $list){
                $array[]=$list->nama;
            }
            return $array[array_rand($array)];
	}
        
        
        public static function check_var_nav($var){
            
            if(isset($var)){
                $data = 'class="active"';
            }else{
                $data= NULL;
            }
            return $data;
        }
        
        
        
        
    public static function bulan2($rrr)
	{
	if($rrr=='1' || $rrr=='01'){$ttt='Januari';}
	if($rrr=='2' || $rrr=='02'){$ttt='Februari';}
	if($rrr=='3' || $rrr=='03'){$ttt='Maret';}
	if($rrr=='4' || $rrr=='04'){$ttt='April';}
	if($rrr=='5' || $rrr=='05'){$ttt='Mei';}
	if($rrr=='6' || $rrr=='06'){$ttt='Juni';}
	if($rrr=='7' || $rrr=='07'){$ttt='Juli';}
	if($rrr=='8' || $rrr=='08'){$ttt='Agustus';}
	if($rrr=='9' || $rrr=='09'){$ttt='September';}
	if($rrr=='10'){$ttt='Oktober';}
	if($rrr=='11'){$ttt='November';}
	if($rrr=='12'){$ttt='Desember';}
	return $ttt;
	}        
        
        
    public static function date_to_tgl($in)
	{
	$tgl = substr($in,8,2);
	$bln = substr($in,5,2);
	$thn = substr($in,0,4);
	if(checkdate($bln,$tgl,$thn))
	{
	   $out=substr($in,8,2)." ".  Fungsi::bulan2(substr($in,5,2))." ".substr($in,0,4);
	}
	else
	{
	   $out = "<span class='error'>N/A</span>";
	}
	return $out;
	}        
       







public static function alphaID($in, $to_num = false, $pad_up = false, $passKey = null)
{
  $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  if ($passKey !== null) {
      // Although this function's purpose is to just make the
      // ID short - and not so much secure,
      // with this patch by Simon Franz (http://blog.snaky.org/)
      // you can optionally supply a password to make it harder
      // to calculate the corresponding numeric ID

      for ($n = 0; $n<strlen($index); $n++) {
          $i[] = substr( $index,$n ,1);
      }

      $passhash = hash('sha256',$passKey);
      $passhash = (strlen($passhash) < strlen($index))
          ? hash('sha512',$passKey)
          : $passhash;

      for ($n=0; $n < strlen($index); $n++) {
          $p[] =  substr($passhash, $n ,1);
      }

      array_multisort($p,  SORT_DESC, $i);
      $index = implode($i);
  }

  $base  = strlen($index);

  if ($to_num) {
      // Digital number  <<--  alphabet letter code
      $in  = strrev($in);
      $out = 0;
      $len = strlen($in) - 1;
      for ($t = 0; $t <= $len; $t++) {
          $bcpow = bcpow($base, $len - $t);
          $out   = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
      }

      if (is_numeric($pad_up)) {
          $pad_up--;
          if ($pad_up > 0) {
              $out -= pow($base, $pad_up);
          }
      }
      $out = sprintf('%F', $out);
      $out = substr($out, 0, strpos($out, '.'));
  } else {
      // Digital number  -->>  alphabet letter code
      if (is_numeric($pad_up)) {
          $pad_up--;
          if ($pad_up > 0) {
              $in += pow($base, $pad_up);
          }
      }

      $out = "";
      for ($t = floor(log($in, $base)); $t >= 0; $t--) {
          $bcp = bcpow($base, $t);
          $a   = floor($in / $bcp) % $base;
          $out = $out . substr($index, $a, 1);
          $in  = $in - ($a * $bcp);
      }
      $out = strrev($out); // reverse
  }

  return $out;
}




 
        
        
}