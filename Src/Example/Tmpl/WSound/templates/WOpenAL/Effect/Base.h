#pragma once

#include "WOpenAL/Predefines.h"
#include "WOpenAL/Exts.h"
#include "Check.h"

namespace WOpenAL{

template<class From>
struct AL_Effect_Base
{
  template<class T, ALenum p>
  struct Prop: public Property<Raw_Effect_<From>, T, p>
  {
    finline operator T() const { return this->Get(); }
  //finline void operator =(const T &v) { this->Set(v); }
    finline void operator =(T v) { this->Set(v); }
  };
};

struct Op_AL_Set
{
  template<class T, class AL>
  finline void operator() (const T& v1, AL& v2)
  {
    v2.Set(v1);
  }

  template<class T, class AL>
  finline void operator() (T& v0, const T& v1, AL& v2)
  {
    if(v0==v1) return;
    v2.Set(v1);
    v0=v1;
  }
};

struct Op_AL_Get
{
  template<class T, class AL>
  finline void operator() (T& v1, const AL& v2)
  {
    v1=v2.Get();
  }
};

}
