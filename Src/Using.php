<?php
  echo "a\n";
 if(file_exists(DirName(__FILE__).'/WLib/Using.php'))
   Include_Once('WLib/Using.php');
 else
   return Include_Once('D:\Proj\Engine\CPP\Comp\WBuild\Using.php');
 
 $Loader->AddSearchPath(DirName(__FILE__)); 
?>