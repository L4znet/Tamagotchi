<?php

class helpers extends Animal
{
    public function test()
    {
        if ($this->actions <= 0) {
            return false;
        } else {
            return true;
        }
    }
}
