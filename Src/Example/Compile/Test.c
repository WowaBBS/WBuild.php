#include <stdio.h>

#define _NUMTOSTR_(v) #v
#define _NUMTOSTR(v) _NUMTOSTR_(v)
#define TEST_NUM(v) printf(">>>" #v ":" _NUMTOSTR_(v) ";" "<<<\n");
#define TEST_EXPR(v) printf(v? (">>>" #v ":0;" "<<<\n"):(">>>" #v ":1;" "<<<\n"));

//#define I_AM_LITTLE (((union { unsigned x; unsigned char c; }){1}).c)

int main(void)
{
//TEST_NUM(__CLR_VER);
  TEST_NUM(_INTEGRAL_MAX_BITS);
  TEST_NUM(_M_AMD64);
  TEST_NUM(_M_ARM);
  TEST_NUM(_M_ARM_ARMV7VE);
  TEST_NUM(_M_ARM_FP);
  TEST_NUM(_M_ARM64);
  TEST_NUM(_M_IX86);
  TEST_NUM(_M_IX86_FP);
  TEST_NUM(_M_X64);
  TEST_NUM(_MSC_BUILD);
  TEST_NUM(_MSC_FULL_VER);
  TEST_NUM(_MSC_VER);
  TEST_NUM(_WIN32);
  TEST_NUM(_WIN64);
  TEST_NUM(_WINRT_DLL);
//TEST_EXPR(I_AM_LITTLE);
  printf("Hello, world!\n");
  return 0;
}
