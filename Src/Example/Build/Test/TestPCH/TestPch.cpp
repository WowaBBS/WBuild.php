
#include "StdAfx.h"
#include <stdio.h>

int main(void)
{
  printf("TestPCH\n");
  TestDef();
  TestDll();
#ifdef TEST_LIB
  TestLib();
#endif// def TEST_LIB
  return 0;
}
