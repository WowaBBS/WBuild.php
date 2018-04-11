#include <stdio.h>
#include "TestDepLib1.h"
#include "TestDepLib2.h"
#include "TestDepLib3.h"

int main(void)
{
  TestDepLib1();
  TestDepLib3();
//TestDepLib2();
  return 0;
}
