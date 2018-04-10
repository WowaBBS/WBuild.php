#pragma once

#include "Base.h"

namespace WSound{


{Arr:Comment;Str}
// {Var:Str}

{/Arr}
struct T{Var:CPP}
{
  typedef T{Var:CPP} Self;

{Arr:Fields}
  {Var:Type} {Var:CPP} ; // {Var:Limit} {Var:Default}

{/Arr}

  template<class TOp, class T>
  finline void Apply(TOp &Op, T &v)
  {

{Arr:Fields}
    Op({Var:CPP} ,v.{Var:CPP} );

{/Arr}
  }
  
  template<class TOp, class T1, class T2>
  finline void Apply(TOp &Op, T1 &v1, T2 &v2)
  {

{Arr:Fields}
    Op({Var:CPP} ,v1.{Var:CPP} ,v2.{Var:CPP} );

{/Arr}
  }
  
  void Init();
  void Blend(const Self &v, float a);
};

} // namespace
