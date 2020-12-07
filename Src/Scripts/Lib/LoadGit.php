<?
  Function LoadGitList($Args)
  {
    $Res=[];
    ForEach($Args['List'] As $k=>$v)
      $Res[$k]=LoadGit($v);
    return $Res;
  }
  
  Function LoadGit($Args)
  {                
    $User    =$Args['User'    ];
    $Project =$Args['Project' ];
    $Rev     =$Args['Rev'     ];
    $Md5     =$Args['Md5'     ];
    $OutDir  =$Args['OutDir'  ];
    if(!Is_Dir($OutDir)) MkDir($OutDir);
  
    $ZipFile =$OutDir.'/'.$Project.'.zip';
    $OutDir  =$OutDir.'/'.$Project.'/';
    if(!Is_Dir($OutDir)) MkDir($OutDir);
    if(!Is_Dir($OutDir))
    {
      echo 'Error', "\n";
      return;
    }
    $RevDir  =$OutDir.$Project.'-'.Preg_Replace('/v(\d+\.\d+\.\d+)/', '$1', $Rev);
    $Loaded  =$RevDir.'/';
    $Md5_File='';
    if(Is_File($ZipFile))
      $Md5_File=Md5_File($ZipFile);
    if($Md5_File && $Md5==='')
      Echo 'Md5=', $Md5_File, "\n";
    
    if(!Is_File($ZipFile) || $Md5!=='' && $Md5!==Md5_File($ZipFile))
    {
      Echo 'Downloading...', "\n";
      $Url='https://github.com/'.$User.'/'.$Project.'/archive/'.$Rev.'.zip';
      $Data=File_Get_Contents($Url);
      if(!$Data)
      {
        Echo 'Downloading failed', "\n";
        exit;
      }
      File_Put_Contents($ZipFile, $Data);
      UnSet($Data);
      $Md5_File=Md5_File($ZipFile);
      if($Md5==='')
        Echo 'Md5=', $Md5_File, "\n";
    }
    
    if($Md5!==$Md5_File)
    {
      Echo '[Error] Md5: ', $Md5, '!=', $Md5_File, "\n";
      return;
    }
    
    if(!Is_Dir($RevDir))
    {
      Echo 'Unpacking...', "\n";
      $Zip= new ZipArchive();
      if($Zip->Open($ZipFile, ZipArchive::CHECKCONS)!==true)
      {
        echo 'Can\'t open zip file ', $Zip->getStatusString(), "\n";
        $Zip->Close();
        UnLink($ZipFile);
        return;
      }
      $Zip->ExtractTo($OutDir);
      $Zip->Close();
    }
    return $Loaded;
  }
?>