#pragma once

namespace WSound{

struct TEffectType
{
  enum Type
  {

{Arr:Effects}
    {Var:CPP_Align} ,

{/Arr}
    Max,
  };
  
  Type v;
  
  finline TEffectType() :v({Var:Effects.0.CPP}) {}
  finline TEffectType(Type v) :v(v) {}
  finline TEffectType(const TEffectType &v) :v(v.v) {}
};

} // namespace
