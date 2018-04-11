#include <iostream>

#include "TestDepLib1.h"
#include "TestDepLib2.h"

void TestDepLib1()
{
  TestDepLib2();
}

struct TTestDepLib1
{
  TTestDepLib1()
  {
    std::cout<<"1";
  }
} TestDepLib1Inner;
