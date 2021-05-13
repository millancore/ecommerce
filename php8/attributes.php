<?php

#[Attribute]
class Integer {
    private $bytes = 255;

    /**
     * @return int
     */
    public function getBytes(): int
    {
        return $this->bytes;
    }
}


class User {

    #[Integer]
    private $dni;
}


$reflector = new ReflectionClass(User::class);

$attributes = $reflector->getProperty('dni')->getAttributes();

$intergerIntance =  $attributes[0]->newInstance();

var_dump($intergerIntance->getBytes());