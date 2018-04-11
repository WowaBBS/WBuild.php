#include <iostream>
#include "TestIncLib1.h"
#include "TestIncLib2.h" // Fix bug of VC
#include "TestIncLib3.h"
#include "Test.inc"

int main(void)
{
  TestIncLib1();
  TestIncLib2();
  TestIncLib3();
  std::cout<<"TestIncExe\n";
  std::cout<<"TestInc: 0=="<<TestInc<<";\n";
  return 0;
}
