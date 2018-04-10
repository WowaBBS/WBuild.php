#pragma once

#include "Base.h"
#include "WSound/Effect/{Var:CPP}.h"

namespace WOpenAL{

struct AL_Effect_{Var:CPP}: public AL_Effect_Base<AL_Effect_{Var:CPP}>
{
  static finline ALint Effect_Id() { return {Var:AL}; }
  
union{

{Arr:Fields}
  Prop<{Var:Type} ,{Var:AL} > {Var:CPP} ; // {Var:Limit} {Var:Default}

{/Arr}

  ALuint id;
};

  finline void Set(WSound::T{Var:CPP} &v)
  {
    Op_AL_Set Op;
    v.Apply(Op, *this);
  }
  
  finline void Set(WSound::T{Var:CPP} &e, WSound::T{Var:CPP} &v)
  {
    Op_AL_Set Op;
    e.Apply(Op, v, *this);
  }
  
  finline void Get(WSound::T{Var:CPP} &v)
  {
    Op_AL_Get Op;
    v.Apply(Op, *this);
  }
  
  finline WSound::T{Var:CPP} Get()
  {
    WSound::T{Var:CPP} res;
    Get(res);
    return res;
  }
};

} // namespace
