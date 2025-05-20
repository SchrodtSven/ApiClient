<?php

namespace SchrodtSven\ApiClient\Tools;
use SchrodtSven\ApiClient\Type\ArrayClass;

interface SnapshotterInterface
{
    public function __construct(ArrayClass $steps);
    public function start(): self;
    public function push(mixed $step): self;
    public function end();
    public function flush(): self;
}