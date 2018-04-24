<?
  return [  
    'Assets'=>[
      ['Public'],
      ['Module/Depends',
        'TestBat',
        'TestPhp',
      ],
      ['Target/Dir', '../..'],
      ['Target/Copy', 'From'=>'Bin/Exe', 'To'=>'Bin',],
    ],
  ];
?>