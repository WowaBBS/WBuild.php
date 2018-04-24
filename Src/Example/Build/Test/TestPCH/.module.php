<?
  return [  
    'Assets'=>[
      ['Module/Depends',
        'TestProxy',
      ],
      ['Cpp/Include', ''],
      ['Cpp/SrcPath', ''],
      ['Cpp/Pch'],
      ['Cpp/Src',
        'StdAfx.cpp', // PH
      ],
      ['Cpp/Define', 'TEST_LIB'],
      ['Public'],
      ['Cpp/MakeExe' ,'>Sub'=>['Cpp/Src'=>'TestPCH.cpp']],
    ],
  ];
?>?>