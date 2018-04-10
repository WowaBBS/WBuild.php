#pragma once

#include <AL/efx.h>

namespace WOpenAL{

// TEffectType
template<>
struct Type_Convertor<TEffectType>
{
  typedef TEffectType Type   ;
  typedef ALint       ALType ;

  finline static ALType Set(const Type &v)
  {
    switch(v.v)
    {

{Arr:Effects}
    case Type::{Var:CPP_Align} : return {Var:AL} ;

{/Arr}
    default                      : return AL_EFFECT_NULL                           ;
    }
  }

  finline static Type Get(ALType v)
  {
    switch(v)
    {

{Arr:Effects}
    case {Var:AL}: return Type::{Var:CPP_Align} ;

{/Arr}
    default                                      : return Type::Empty             ;
    }
  }
};

} // namespace
