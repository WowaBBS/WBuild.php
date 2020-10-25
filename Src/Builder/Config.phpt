<?
  class T_Builder_Config
  {
    Var  String $Type        =''; //< 
    Var  String $Name        =''; //< Name of this config
    Var  bool   $Abstract =false; //< Mark this config as hidden
    Var  bool   $Hidden   =false; //< Mark this config as hidden
    Var ?String $AliasOf        ; //< Mark this config alias to another config
    Var  Array  $Depends     =[]; //< Depend on another config, array of names
    Var  Array  $Config      =[]; //< Builder asset config params
    Var  Array  $Assets      =[]; //< List of assets
    Var  Array  $ConfigMap   =[]; //< Redirect configuration map
    Var  String $SimpleName  =''; //< Simple config name
    Var  Array  $VS          =['Props'=>[]]; //< Visual studio params
    
    Function __Construct()
    {
    }
    
    Function MergeLeft(T_Builder_Config $Config, $bSimpleConfig=false)
    {
      $this->Depends     =            $this->Depends       +$Config->Depends      ;
      $this->Assets      =Array_Merge($this->Assets        ,$Config->Assets      );
      $this->Config      =Array_Merge($this->Config        ,$Config->Config      );
      $this->ConfigMap   =            $Config->ConfigMap   +$this->ConfigMap      ;
      $this->SimpleName  =            $this->SimpleName   ?($bSimpleConfig? $this->SimpleName.$Config->SimpleName:$this->SimpleName):$Config->SimpleName   ;
      $Props             =            $Config->VS['Props'] +$this->VS['Props']    ;
      $this->VS          =            $Config->VS          +$this->VS             ;
      $this->VS['Props'] =$Props;
      return $this;
    }
    
    Function MergeContext(Array $Assets, Array $Config)
    {
      $this->Assets =Array_Merge($this->Assets ,$Assets);
      $this->Config =Array_Merge($this->Config ,$Config);
      return $this;
    }
    
    Function InitArray(C_Object $Loader, Array $List, $Map, String $Name, String $Type)
    {
      if(Is_String($Map)) // Alias
        $Map=['AliasOf'=>$Map];
      $this->Type       =$Type;
      $this->Name       =$Name;
            $Depends    =$Map[$k='Depends'    ]??[]      ; Unset($Map[$k]);
      $this->AliasOf    =$Map[$k='AliasOf'    ]??null    ; Unset($Map[$k]);
      $Depends=Array_Flip(Is_String($Depends)? [$Depends]:$Depends);
      if($IsAlias=IsSet($this->AliasOf)) $Depends[$this->AliasOf]=true;
      $this->Depends    =$Depends;
      $this->Abstract   =$Map[$k='Abstract'   ]??false   ; Unset($Map[$k]);
      $Hidden=$this->Abstract || $IsAlias;
      $this->Hidden     =$Map[$k='Hidden'     ]??$Hidden ; Unset($Map[$k]);
      $this->SimpleName =$Map[$k='SimpleName' ]??$Name   ; Unset($Map[$k]);
      
      $Cur=new T_Builder_Config();
      $Cur->Config     =$Map[$k='Config'     ]??[]      ; Unset($Map[$k]);
      $Cur->Assets     =$Map[$k='Assets'     ]??[]      ; Unset($Map[$k]);
      $Cur->ConfigMap  =$Map[$k='ConfigMap'  ]??[]      ; Unset($Map[$k]);
      $Cur->VS         =$Map[$k='VS'         ]??[]      ; Unset($Map[$k]);
      $Cur->VS['Props']??=[];
      
      ForEach($Depends As $DependsName=>$Tmp)
        if($DependsItem=$List[$DependsName]??null)
          $this->MergeLeft($DependsItem);
        else
          $Loader->Log('Error', 'Unknown depends item ', $DependsName, ' used from ', $Name);
      $this->MergeLeft($Cur);
      if($Map)
        $Loader->Log('Error', 'Unknown ', $Type, ' "', $Name, '" extra params:')->Debug($Map);
      return $this;
    }
  };
?>