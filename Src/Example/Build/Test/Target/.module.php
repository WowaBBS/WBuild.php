<?
  return [  
    'Assets'=>[
      ['Public'],
      ['Module/Depends',
        'TestExe',
        'TestPCH',
        'TestRc',
        'TestResX',
        'TestDep/Exe',
        'TestInc/Exe',
        'TestErr',
      ],
      ['Target/Dir', '../..'],
      ['Target/Copy', 'From'=>'Bin/Exe', 'To'=>'Bin',],
    ],
  ];
?>