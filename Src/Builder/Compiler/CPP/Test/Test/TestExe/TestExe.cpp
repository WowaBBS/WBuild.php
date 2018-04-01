#include <stdio.h>
#include "TestDef.h"
#include "TestDll.h"
#ifdef TEST_LIB
#include "TestLib.h"
#endif// def TEST_LIB

int main(void)
{
  TestDef();
  printf("Hello, world!\n");
  TestDll();
#ifdef TEST_LIB
  TestLib();
#endif// def TEST_LIB
  return 0;
}
