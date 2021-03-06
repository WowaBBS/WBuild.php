<?
 require_once 'Align.php';

 function Reformat_Fields(&$Fields, $Vars)
 {
   $AL_Field_Prefix  = $Vars['AL_Field_Prefix'  ];
   $CPP_Field_Prefix = $Vars['CPP_Field_Prefix' ];
   $Enums            = $Vars['Enums'            ];
 
   ForEach($Fields as $k=>$tmp)
   {
     if(!is_int($k)) continue;
     $Field=&$Fields[$k];
     
                            $Type    =$Field[0]; UnSet($Field[0]); $Field['Type'    ]=$Type    ;
                            $Name    =$Field[1]; UnSet($Field[1]); $Field['Name'    ]=$Name    ;
                            $Limit   =$Field[2]; UnSet($Field[2]); $Field['Limit'   ]=$Limit   ;
                            $Default =$Field[3]; UnSet($Field[3]); $Field['Default' ]=$Default ;
     If(IsSet($Field[4])) { $Comment =$Field[4]; UnSet($Field[4]); $Field['Comment' ]=$Comment ; }
     
     if(!IsSet($Field['DefValue' ]))
     {
       $Field['DefValue' ]=$Default ;
       $Type=Trim($Type);
       $Default=Trim($Default);
       switch($Type)
       {
       case 'Angle':
       case 'float':
       case 'int':
         $Default=false;
         break;
       case 'bool'  :
         switch($Default)
         {
         case '1':
         case 't':
           $Default='true';
           break;
         case '0':
         case 'f':
           $Default='false';
           break;
         }
         break;
       case 'Vector':
         $Default='Vector('.$Default.')';
         break;
       default:
         $Enum=$Enums[$Type];
         if($Enum)
         {
           $Default=$Type.'::'.$Enum['List'][$Default].'';
         }
         else
         {
           $Default='Unknown('.$Type.'::'.$Default.')';
         }
       }
       if($Default!==false)
         $Field['DefValue' ]=$Default ;
     }
     
     if(!IsSet($Field['AL'  ])) $Field['AL'  ]=$AL_Field_Prefix  .ToAL  ($Name);
     if(!IsSet($Field['CPP' ])) $Field['CPP' ]=$CPP_Field_Prefix .ToCPP ($Name);
     
   //echo $Field['AL'], "\n";
     
     UnSet($Field);
   }

   $Fields_Len=[
     'AL'  =>0,
     'CPP' =>0,
   ];
   
   Align_Calc ($Fields, $Fields_Len);
   Align_Do   ($Fields, $Fields_Len);
 }
?>