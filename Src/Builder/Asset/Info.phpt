<?  $Loader->Parent_Class('/Object');  $Loader->Using_Module('/Strings');   class T_Builder_Asset_NameSpace  {    Var $Has  =false;    Var $Str  ='';    Var $List =[''];        Static Function GetNull()    {      Static $Res=null;      if(!Is_Null($Res))        return $Res;      $Res=New T_Builder_Asset_NameSpace();      Return $Res;    }        Static Function Get(String $Str)    {      static $Cache=[];      if(IsSet($Cache[$Str])) return $Cache[$Str];      $Str=CacheString($Str);      $List=Explode(':', $Str);      ForEach($List As $k=>$v)        $List[$k]=CacheString(StrLen($v)>0? ':'.$v:$v);            $Res=New T_Builder_Asset_NameSpace();      $Res->Has  =true  ;      $Res->Str  =$Str  ;      $Res->List =$List ;            $Cache[$Str]=$Res;      return $Res;    }  }    class T_Builder_Asset_Info  {    Var $Name    ;    Var $Type    ;    Var $List    ;    Var $Class   ;    Var $NS      ;    Var $Has_NS  ;    Var $NS_Str  ;    Var $Reverse ;    Var $Singleton ;    Function __Construct(String $TypeName)    {      $TypeName=CacheString($TypeName);      if(($Pos=StrPos($TypeName, ':'))!==false)      {        $Type=CacheString(SubStr($TypeName, 0, $Pos));        $NS=T_Builder_Asset_NameSpace::Get(SubStr($TypeName, $Pos+1));      }      else      {        $Type=$TypeName;        $NS=T_Builder_Asset_NameSpace::GetNull();      }            $List=[];      ForEach($NS->List As $v)        $List[]=CacheString($Type.$v);      $HasNS=Count($NS)>0;      $Class=CacheString('/Builder/Asset/'.$Type);            $this->Name   =$TypeName ;      $this->Type   =$Type     ;      $this->List   =$List     ;      $this->Class  =$Class    ;      $this->NS     =$NS       ;      $this->Has_NS =$NS->Has  ;      $this->NS_Str =$NS->Str  ;    }    Static Function Get($TypeName)    {       if(Is_Object($TypeName))        return $TypeName;      static $Types=[];      if(IsSet($Types[$TypeName]))        return $Types[$TypeName];              $Res=New T_Builder_Asset_Info($TypeName);      $Types[$Res->Name]=$Res;      return $Res;    }    Function Merge()    {      if($this->Has_NS)        return $this;            $List=func_get_args();      ForEach($List As $Item)      {        if(Is_String($Item))          $Item=Self::Get($Item);                if($Item->Has_NS)          return self::Get($this->Type.$Item->NS_Str);      }      return $this;    }        Function Reverse()    {      if(!Is_Null($this->Reverse))        return $this->Reverse;            $L=$this->NS->List;      $L[]=$this->Name;      $Res=Self::Get(Implode(':', Array_Reverse($L)));      $this->Reverse=$Res;      return $Res;     }        Function ParseParams(&$Args)    {      if(!$this->Singleton)      {        $_Args=$Args;        UnSet($_Args['Param']);        UnSet($_Args['Outer']);        $this->Singleton=$Args['Outer']->Create_Object($Args['Info']->Class, $_Args);      }      $List=$this->Singleton->_ParseParams($Args);      return $List;    }  };?>