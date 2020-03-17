<?php
  class MyClass
  {
    function __set ($name, $value) {
      echo "I ";
    }
    static function __callStatic ($name, $value) {
      echo "World!";
    }
    function __invoke () {
      echo "love ";
    }
    function __toString () {
      return "PHP. ";
    }
    function __call ($name, $value) {
      echo "Hello ";
    }
  }
  
  $c = new MyClass();
  $c->a = 0;
  $c();
  echo $c;
  $c->a();
  MyClass::a();


?>
