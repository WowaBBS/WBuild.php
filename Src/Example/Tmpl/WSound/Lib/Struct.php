<?
 require_once 'Field.php';

 function Reformat_Structs(&$Structs, $Vars)
 {
   $CPP_Struct_Prefix = $Vars['CPP_Struct_Prefix' ];
   $CPP_Field_Prefix  = $Vars['CPP_Field_Prefix'  ];
   $AL_Effect_Prefix  = $Vars['AL_Effect_Prefix'  ];

   ForEach($Structs as $k=>$tmp)
   {
     if(!is_int($k)) continue;
     $Struct=&$Structs[$k];
     $Enums = IsSet($Vars['Enums'])? $Vars['Enums']:[];
   //Echo $Struct['Name'], "\n";
     $AL_Name=ToAL($Struct['Name']);
     if(!IsSet($Struct['Enums'])) $Struct['Enums']=[];

     ForEach($Struct['Enums'] as $Enum)
       $Enums[$Enum['Name']]=$Enum;
     
     if(!IsSet($Struct['Comment'])) $Struct['Comment']=[];
     if(!IsSet($Struct['AL'  ])) $Struct['AL'  ]=$AL_Effect_Prefix.$AL_Name;
     if(!IsSet($Struct['CPP' ])) $Struct['CPP' ]=$CPP_Struct_Prefix.ToCpp($Struct['Name']);
     if(!IsSet($Struct['CPP_Align'])) $Struct['CPP_Align' ]=$Struct['CPP' ];
   //Echo $Struct['AL'], "\n";
     if(!IsSet($Struct['Fields'])) $Struct['Fields']=[];
     $Fields=&$Struct['Fields'];
     
     $AL_Field_Prefix='AL_'.$AL_Name.'_';
     
     $Fields_Vars=[
       'AL_Field_Prefix'  =>$AL_Field_Prefix  ,
       'CPP_Field_Prefix' =>$CPP_Field_Prefix ,
       'Enums'            =>$Enums            ,
     ];
     Reformat_Fields($Fields, $Fields_Vars);
     
     UnSet($Fields);
     UnSet($Struct);
   }
   
   $Align_Len=[
     'CPP_Align' =>0,
     'AL'        =>0,
   ];
   
   Align_Calc ($Structs, $Align_Len);
   Align_Do   ($Structs, $Align_Len);
 } 
?>