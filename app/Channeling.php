<?php


namespace Laratube;


trait Channeling
{

    public function updateChannel($data)
    {
        return $this->update($data);
    }

}