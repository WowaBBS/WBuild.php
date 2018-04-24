<?
  return [  
    'Assets'=>[
      ['Module/Depends',
      ],
      ['Cpp/SrcPath' ,''],
      ['Cpp/Src'     ,'TestResX.cpp'],
      ['Public'],
      ['Cpp/UsingPath', '>v4.0'],
      ['Cpp/Using',
        'System.Core.dll'          ,
        'System.Data.dll'          ,
        'System.dll'               ,
        'System.Drawing.dll'       ,
        'System.Windows.Forms.dll' ,
        'System.Xml.dll'           ,
      ],                        
      ['Cpp/ResX', 'Test.resX'],
      ['Cpp/MakeExe'],
    ],
  ];
?>