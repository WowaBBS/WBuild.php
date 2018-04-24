<?
  return [  
    'Assets'=>[
      ['Module/Depends',
        'TestInc/Lib1',
        'TestInc/Lib2', // Fix bug of VC
        'TestInc/Lib3',
      ],
      ['Cpp/SrcPath' ,''],
      ['Cpp/Include' ,'Inc'],
      ['Cpp/SrcPath' ,''],
      ['Cpp/Src'     ,'TestIncExe.cpp'],
      ['Public'],
      ['Cpp/Define', 'TEST_LIB'],
      ['Cpp/MakeExe'],
    ],
  ];
?>