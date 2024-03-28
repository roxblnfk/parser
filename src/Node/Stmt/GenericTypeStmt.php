<?php

declare(strict_types=1);

namespace TypeLang\Parser\Node\Stmt;

/**
 * @template T of TypeStatement
 */
abstract class GenericTypeStmt extends TypeStatement
{
    /**
     * @param T $type
     */
    public function __construct(
        public TypeStatement $type,
    ) {}

    public function toArray(): array
    {
        return [
            ...parent::toArray(),
            'type' => $this->type->toArray(),
        ];
    }

    public function __serialize(): array
    {
        return [$this->offset, $this->type];
    }

    public function __unserialize(array $data): void
    {
        $this->offset = $data[0] ?? throw new \UnexpectedValueException(\sprintf(
            'Unable to unserialize %s offset',
            static::class,
        ));

        $this->type = $data[1] ?? throw new \UnexpectedValueException(\sprintf(
            'Unable to unserialize %s type',
            static::class,
        ));
    }
}
