#include <stdio.h>
#include "TestDef.h"
#include "TestDll.h"
#ifdef TEST_LIB
#include "TestLib.h"
#endif// def TEST_LIB

int main(void)
{
  printf("Hello, world!\n");
  TestDef();
  TestDll();
#ifdef TEST_LIB
  TestLib();
#endif// def TEST_LIB
  return 0;
}
