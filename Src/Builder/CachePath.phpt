<?
  class TCachePath
  {
    Var $Path ='';
    Var $Add  ='';
    
    Function __Construct(Array $List)
    {
      [$this->Path, $this->Add]=$List;
    }
  };
?>