#include "TestDef.h"
#include <stdio.h>

void TestDef()
{
  printf("TestDef\n");
#if TestDef1==1
  printf("TestDef1 is 1\n");
#endif
#ifdef TestDef2
  printf("TestDef2 is exist\n");
#endif
#ifdef TestDef3
  printf("TestDef2 is exist\n");
#endif
}
