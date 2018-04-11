#include <stdio.h>

#include "TestDepLib2.h"

float TestDepLib2Value=123456;

void TestDepLib2()
{
}

struct TTestDepLib2
{
  TTestDepLib2()
  {
    printf("2");
    TestDepLib2Value=654321;
  }
} TestDepLib2Inner;
