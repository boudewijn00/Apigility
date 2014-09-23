<?php
namespace Theridiid\V1\Rest\Sleep;

class SleepResourceFactory
{
    public function __invoke($services)
    {
        return new SleepResource();
    }
}
