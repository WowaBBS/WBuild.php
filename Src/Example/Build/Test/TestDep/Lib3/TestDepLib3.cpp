#include <iostream>

#include "TestDepLib3.h"
#include "TestDepLib2.h"

void TestDepLib3()
{
  std::cout<<"TestDepLib3\n";
  std::cout<<"TestDepLib2Value="<<TestDepLib2Value<<"\n";
}

struct TTestDepLib3
{
  TTestDepLib3()
  {
    std::cout<<"TestDepLib3 Inner\n";
    std::cout<<"TestDepLib2Value="<<TestDepLib2Value<<"\n";
    if(TestDepLib2Value!=654321)
      std::cout<<"[Error] TestDepLib2Value should be 654321\n";
  }
} TestDepLib3Inner;
