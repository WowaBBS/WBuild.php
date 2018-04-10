#pragma once

#include "WOpenAL/Predefines.h"
#include "WOpenAL/Effect/.all.h"
#include "WOpenAL/Exts.h"

namespace WOpenAL{

struct AL_Effect
{
//private:
  template<class T, ALenum p> struct Prop: public Property<Raw_Effect_<AL_Effect>, T, p>
  {
    finline operator T() const { return this->Get(); }
  //finline void operator =(const T &v) { this->Set(v); }
    finline void operator =(T v) { this->Set(v); }
  };
public:
union{
  Prop<TEffectType, AL_EFFECT_TYPE> Type;
  

{Arr:Effects}
  AL_Effect_{Var:CPP_Align} {Var:CPP_Align};

{/Arr}
  ALuint id;
}; // union

  AL_Effect() { id=0; }

  finline bool Init() { alGenEffects    (1, &id); return alGetError()==AL_NO_ERROR; }
  finline void Done() { alDeleteEffects (1, &id); } // TODO: Check Errors

  finline void Set(const void *v)
  {
  }
  
  finline void Set(void *e, const void *v)
  {
  }
  
  finline void Get(void *v)
  {
  }
}; // AL_Effect

static_assert_one(sizeof(AL_Effect)==sizeof(ALuint));
}
