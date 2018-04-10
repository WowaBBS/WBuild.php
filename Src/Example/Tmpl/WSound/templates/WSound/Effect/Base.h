#pragma once

#include <cmath>

namespace WSound{

struct Op_Blend
{
  float a;
  float n;
  
  finline Op_Blend(float a) :a(a) ,n(1-a) {}
  
  finline float C(float ,float v1 ,float v2) { return v1*n+v2*a; }
  finline int   C(int   ,int   v1 ,int   v2) { return roundf(v1*n+v2*a); }
  finline bool  C(bool  ,bool  v1 ,bool  v2) { return a>=.5? v2:v1; }
  template<class T>
  finline T C(const IBlend&, T v1, T v2) { return v1.Blend(v2, a); }
  template<class T>
  finline T C(const IEnum&, T v1, T v2) { return a>=.5? v2:v1; }
  
  template<typename T>
  finline void operator() (T& res, const T& v1, const T& v2)
  {
    res=(T)C(v1, v1, v2);
  }

  template<typename T>
  finline void operator() (T& v1, const T& v2)
  {
    (*this)(v1, v1, v2);
  }
};

}
