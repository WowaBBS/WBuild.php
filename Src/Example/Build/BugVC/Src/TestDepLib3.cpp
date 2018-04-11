#include <iostream>

#include "TestDepLib3.h"
#include "TestDepLib2.h"

void TestDepLib3()
{
  TestDepLib2();
}

struct TTestDepLib3
{
  TTestDepLib3()
  {
    std::cout<<"3";
  }
} TestDepLib3Inner;
