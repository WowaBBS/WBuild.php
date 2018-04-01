
#undef TEST_API
#define TEST_API

#include "TestDll.h"
#include "TestProxy.h"

static int a=1;

struct __declspec(dllexport) T_TODO
{
  T_TODO()
  {
    a=2;
    TestDll();
  }
  
} TODO;
