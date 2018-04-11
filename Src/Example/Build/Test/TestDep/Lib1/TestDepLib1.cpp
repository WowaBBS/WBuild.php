#include <iostream>

#include "TestDepLib1.h"
#include "TestDepLib2.h"

void TestDepLib1()
{
  std::cout<<"TestDepLib1\n";
  std::cout<<"TestDepLib2Value="<<TestDepLib2Value<<"\n";
}

struct TTestDepLib1
{
  TTestDepLib1()
  {
    std::cout<<"TestDepLib1 Inner\n";
    std::cout<<"TestDepLib2Value="<<TestDepLib2Value<<"\n";
    if(TestDepLib2Value!=654321)
      std::cout<<"[Error] TestDepLib2Value should be 654321\n";
  }
} TestDepLib1Inner;
