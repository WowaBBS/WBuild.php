
// comment next line \
#include "Hello"

#define AAA \
  #include "Define"

#include "Main/Application.h"
#include <Main/Application.h>
char *Str="#include <Exclude.h>"
char *Str2="\
#include <String>"  #include <AfterString>
char *Str3=R"AAA(\
#include <RawString>
)AAA" #include <AfterRawString>
//#include "PersMixer.h"
//#include "ModelInfo.h"
//#include "WorldBuilder.h"

//public  ref class TestFormControl : public System::Windows::Forms::Form

const v=10'000;

CRLF

/*
 #include "ModelInfo.h"
 //#include "ModelInfo.h"
 //TODO: #include "ToDo.h"
 *#include "ModelInfo.h"
*/

End line
