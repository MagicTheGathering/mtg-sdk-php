<?php

namespace mtgsdk;

trait DataBag
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }

        throw new \UnexpectedValueException("Invalid property: [$name]");
    }
}
