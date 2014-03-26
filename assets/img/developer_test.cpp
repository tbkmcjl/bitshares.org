#include <iostream>
#include <stdlib.h>
#include <vector>

class A 
{
   public:
   A() { func(); }
   
   virtual void func() 
   { 
      std::cout << 1;
      if( rand() < 3 ) throw "";
   }
   std::vector<char> x;
};

class B : public A
{
   public:
   void func()
   {
        std::cout<<2;
   }
};


void test()
{
    A* a;
    try 
    {
       a = new B();
       a->func();
       delete a;
    } 
    catch ( ... )
    {
    }
}


