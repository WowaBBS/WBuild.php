#include <stdio.h>

void TestLib()
{
  printf("TestLib\n");
}

struct TTestLib
{
  TTestLib()
  {
    printf("TestLib Inner\n");
  }
} TestLibInner;
