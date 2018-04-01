
#undef TEST_API
#define TEST_API __declspec(dllimport)

#include "TestDll.h"

//void TestDll();
void _TestDll() { TestDll(); }
