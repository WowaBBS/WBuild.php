#include <iostream>

#include "TestDepLib2.h"

float TestDepLib2Value=123456;

void TestDepLib2()
{
  std::cout<<"TestDepLib2\n";
  std::cout<<"TestDepLib2Value="<<TestDepLib2Value<<"\n";
}

struct TTestDepLib2
{
  TTestDepLib2()
  {
    std::cout<<"TestDepLib2 Inner\n";
    TestDepLib2Value=654321;
  }
} TestDepLib2Inner;
