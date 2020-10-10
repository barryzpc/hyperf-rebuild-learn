<?php
/**
 * Created by PhpStorm.
 * User: barry
 * Date: 2020/10/9
 * Time: 13:17
 */
namespace App;

class Bar
{
    public function bar(){
        $foo = new Foo();
        echo $foo->foo();
    }

}