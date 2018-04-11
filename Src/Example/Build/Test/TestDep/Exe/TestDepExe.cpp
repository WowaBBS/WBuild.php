#include <stdio.h>
#include "TestDepLib1.h"
//#include "TestDepLib2.h" // Fix bug of VC
#include "TestDepLib3.h"

int main(void)
{
  TestDepLib1();
//TestDepLib2(); // Fix bug of VC
  TestDepLib3();
  return 0;
}
