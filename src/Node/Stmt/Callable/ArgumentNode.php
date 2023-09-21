<?php

declare(strict_types=1);

namespace TypeLang\Parser\Node\Stmt\Callable;

use TypeLang\Parser\Node\Node;
use TypeLang\Parser\Node\Stmt\Statement;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal TypeLang\Parser
 */
final class ArgumentNode extends Node implements ArgumentNodeInterface
{
    public function __construct(
        public readonly Statement $type,
    ) {}

    public function is(string $class): bool
    {
        return $this instanceof $class;
    }

    public function getType(): Statement
    {
        return $this->type;
    }
}
