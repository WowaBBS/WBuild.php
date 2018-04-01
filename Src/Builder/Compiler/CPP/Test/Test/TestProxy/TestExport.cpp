
#undef TEST_API
#define TEST_API __declspec(dllexport)

#include "TestDll.h"

void _TestDll();
//void TestDll() { _TestDll(); }
extern void TestDll();
void TestProxy() { _TestDll(); }
