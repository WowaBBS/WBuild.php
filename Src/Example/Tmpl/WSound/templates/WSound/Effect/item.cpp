#pragma once

#include "{Var:CPP}.h"

namespace WSound{

void T{Var:CPP}::Init()
{

{Arr:Fields}
  {Var:CPP} = {Var:DefValue} ;

{/Arr}
}

void T{Var:CPP}::Blend(const Self &v, float a)
{
  Op_Blend Op(a);
  Apply(Op, v);
}

} // namespace
