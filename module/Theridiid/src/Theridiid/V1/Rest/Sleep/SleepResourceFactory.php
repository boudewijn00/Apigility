<?php
namespace Theridiid\V1\Rest\Sleep;

class SleepResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Theridiid\V1\Rest\Sleep\SleepMapper');
        return new SleepResource($mapper);
    }
}
