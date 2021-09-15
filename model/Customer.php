<?php

namespace Model;

class Customer
{
    public string $tenhang;
    public string $loaihang;
    public int $masp;

    public function __construct(string $tenhang,
                                string $loaihang)
    {
        $this->tenhang = $tenhang;
        $this->loaihang = $loaihang;
    }
}
