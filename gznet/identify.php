<?php

function Check_OS() {

  /**
  * Mobile
  */
  
  $opsys['Android']           = 'Android';
  $opsys['elaine']            = 'Palm';
  $opsys['palm']              = 'Palm';
  $opsys['series60']          = 'Symbian S60';
  $opsys['symbian']           = 'Symbian';
  $opsys['SymbianOS']         = 'Symbian OS';
  $opsys['windows ce']        = 'Windows CE';
  
  /**
  * Windows...
  */
  
  $opsys['win95']              = 'Windows 95';
  $opsys['windows 95']         = 'Windows 95';
  $opsys['win98']              = 'Windows 98';
  $opsys['windows 98']         = 'Windows 98';
  $opsys['winnt']              = 'Windows NT';
  $opsys['winnt4.0']           = 'Windows NT 4.0';
  $opsys['windows nt 4.0']     = 'Windows NT 4.0';
  $opsys['win 9x 4.90']        = 'Windows Me';
  $opsys['windows me']         = 'Windows Me';
  $opsys['windows nt 5.0']     = 'Windows 2000';
  $opsys['windows nt 5.1']     = 'Windows XP';
  $opsys['windows nt 5.2']     = 'Windows 2003';
  $opsys['windows nt 6.0']     = 'Windows Vista';
  $opsys['windows nt 6.1']     = 'Windows 7';
  
  /**
  * Unix...
  */
  
  $opsys['unix']               = 'Unix';
  
  /**
  * Mac...
  */
  
  $opsys['mac']               = 'Mac';
  $opsys['Mac 10']            = 'Mac OS X';
  $opsys['Mac OS X 10_4']     = 'Mac OS X Tiger';
  $opsys['Mac OS X 10_5_2']   = 'Mac OS X Leopard';
  $opsys['Mac OS X 10_5_3']   = 'Mac OS X Leopard';
  $opsys['Mac OS X 10_5']     = 'Mac OS X Leopard';
  $opsys['Mac OS X']          = 'Mac OS X';
  $opsys['PowerPC']           = 'Mac PPC';
  $opsys['PPC']               = 'Mac PPC';
  
  /**
  * Linux...
  */
  
  $opsys['linux i686']         = 'Linux i686';
  $opsys['linux i586']         = 'Linux i586';
  $opsys['linux i486']         = 'Linux i486';
  $opsys['linux i386']         = 'Linux i386';
  $opsys['linux ppc']          = 'Linux PPC';
  $opsys['linux']              = 'Linux';

  if (is_array($opsys)) {
    foreach ($opsys as $ua => $opsy) {
      if (preg_match("|".preg_quote($ua)."|i", trim($_SERVER['HTTP_USER_AGENT']))) {
        return $opsy;
      }
    }
  }
  
  return 'Unknown OS';
 
}

  function Check_Browser() {
  
  /**
  * Most used...
  */
  
  $browsers['Chrome']             = 'Chrome';
  $browsers['Firebird']           = 'Firebird';
  $browsers['Firefox']            = 'Firefox';
  $browsers['Internet Explorer']  = 'Internet Explorer';
  $browsers['Konqueror']          = 'Konqueror';
  $browsers['Lynx']               = 'Lynx';
  $browsers['mobilexplorer']      = 'Mobile Explorer'; // Mobile
  $browsers['Mobile Safari']      = 'Mobile Safari'; // Mobile
  $browsers['MSIE']               = 'Internet Explorer';
  $browsers['Netscape']           = 'Netscape';
  $browsers['OmniWeb']            = 'OmniWeb';
  $browsers['Opera']              = 'Opera';
  $browsers['operamini']          = 'Opera Mini'; // Mobile
  $browsers['opera mini']         = 'Opera Mini'; // Mobile
  $browsers['Phoenix']            = 'Phoenix';
  $browsers['Safari']             = 'Safari';
  
  if (is_array($browsers)) {
    foreach ($browsers as $ua => $lbrowser) {
      if (preg_match("|".preg_quote($ua).".*?([0-9\.]+)|i", trim($_SERVER['HTTP_USER_AGENT']), $version)) {
        return $lbrowser;
      }
    }
  }
  
  return 'Unknown Browser';
  
}

?>