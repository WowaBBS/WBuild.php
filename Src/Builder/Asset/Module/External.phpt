<?
  $Loader->Parent_Class('/Object');
 
  class T_Builder_Asset_Module_External
  {
    Var $Ex_Id =0;
    Var $Name  =0;
    Var $Value =null;
    Var $First ='>Uninited';
    
    Function __Construct($ModuleInstance)
    {
      $this->Ex_Id =$ModuleInstance->Object_GetId();
      $this->Name  =$ModuleInstance->GetModule()->FullName;
    }
    
    Function Add($v, $Owner, $ToInstance)
    {
      if($Owner===null)
        $v=False;
      if($v===null)
        $v=$Owner->GetModuleInstance()->IsExternalModule->Get($ToInstance);
      $ModuleName=$Owner? $Owner->GetModule()->FullName:'>Initial';
      if($this->Value!==null)
      {
        if($this->Value!==$v)
          $ToInstance->Log('Error', 'Trying to change external status for module ', $this->Name, ' from ',
            ($this->Value? 'True':'False'), ' (Setted in ', $this->First, ')', ' to ',
            ($v? 'True':'False'), ' (From ', $ModuleName, ')'
          );
        return;
      }
      $this->Value=$v;
      $this->First=$ModuleName;
    }
    
    Function Get($By)
    {
      if($this->Value===null)
        $By->Log('Error', 'External status is not assigned for module ', $this->Name, ' required by ',$By->GetModule()->FullName);
      return $this->Value===true;
    }
  };

//****************************************************************
// TODO: Remove

  class T_Builder_Asset_Module_External_Smart
  {
    Var $Ex_Id       =0;
    Var $Name        =0;
    Var $Allow       =[];
    Var $Disallow    =[];
    Var $Indifferent =[];
    Var $Summary     =[];
    Var $Freezed     =false;
    
    Function __Construct($ModuleInstance)
    {
      $this->Ex_Id =$ModuleInstance->Object_GetId() ;
      $this->Name  =$ModuleInstance->GetModule()->FullName;
    }
    
    Function Add($v, $Owner, $ToInstance)
    {
      if($this->Freezed)
      {
        $ToInstance->Log('Error', 'ExternalModuleControl was freezed');
      }
      if(!$Owner) // If root module
        return;
      $MI=$Owner->GetModuleInstance();
      $Rec=$MI->IsExternalModule;
      if(!$Rec)
        $ToInstance->Log('Fatal', 'Module hasn\'t IsExternalModule');
      $Item=[$Rec->Ex_Id=>$Rec];
      if($v===null  ) $this->Indifferent +=$Item; else
      if($v===true  ) $this->Allow       +=$Item; else
      if($v===false ) $this->Disallow    +=$Item; else
        $Owner->Log('Fatal', 'Unallowed argument type: ', GetType($v));
        
    # if($this->IsExternalModule!==false && $v!==null)
    #    $this->Log('Debug', 'SetExternalModule(', $v===true? 'true':($v===false? 'false': 'null'), ', ', $Instance->GetModule()->FullName,') for ', $this->GetModule()->FullName, ' ', $this->Object_GetId());
    # if($this->IsExternalModule===true && $v===false)
    #    $this->Log('Error', 'External module ', $Instance->GetModule()->FullName,' make to be internal module ',$this->GetModule()->FullName);
    # if($this->IsExternalModule!==false && $v!==null)
    #   $this->IsExternalModule=$v;
    }
    
    Protected Function UnFreeze()
    {
      $this->Summary=[];
      $this->Freezed=false;
    }
    
    Protected Function Freeze($By)
    {
      $Summary= $this->Allow;
    //$By->Debug($this->Indifferent);
      ForEach($this->Indifferent As $k=>$v)
        if($v->Get($By))
          $Summary[$k]=$v;
      $this->Summary=$Summary;
      $this->Freezed=true;
    }
    
    Function Get($By)
    {
    //return false;
      // TODO: Check can be read
      if(Count($this->Disallow)>0)
        return false;
      if(Count($this->Allow)>0)
        return true;
      if(!$this->Freezed)
        $this->Freeze($By);
      return Count($this->Summary)>0;
    }
  };
?>