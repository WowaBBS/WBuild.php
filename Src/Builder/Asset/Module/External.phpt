<?
  $Loader->Parent_Class('/Object');
 
  class T_Builder_Asset_Module_External
  {
    Var $Id          =0;
    Var $Name        =0;
    Var $Allow       =[];
    Var $Disallow    =[];
    Var $Indifferent =[];
    Var $Summary     =[];
    Var $Freezed     =false;
    
    Function __Construct($ModuleInstance)
    {
      $this->Id   =$ModuleInstance->Object_Id ;
      $this->Name =$ModuleInstance->GetModule()->FullName;
    }
    
    Function Add($v, $Owner)
    {
      if($this->Freezed)
      {
        $Owner->Log('Error', 'ExternalModuleControl was freezed');
      }
      $MI=$Owner->GetModuleInstance();
      $Rec=$MI->IsExternalModule;
      if(!$Rec)
        $Owner->Log('Fatal', 'Module hasn\'t IsExternalModule');
      $Item=[$Rec->Id=>$Rec];
      if($v===null  ) $this->Indifferent +=$Item; else
      if($v===true  ) $this->Allow       +=$Item; else
      if($v===false ) $this->Disallow    +=$Item; else
        $Owner->Log('Fatal', 'Unallowed argument type: ', GetType($v));
        
    # if($this->IsExternalModule!==false && $v!==null)
    #    $this->Log('Debug', 'SetExternalModule(', $v===true? 'true':($v===false? 'false': 'null'), ', ', $Instance->GetModule()->FullName,') for ', $this->GetModule()->FullName, ' ', $this->Object_Id);
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