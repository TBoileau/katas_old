<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\DungeonsAndMaps\Tests;

use PHPUnit\Framework\TestCase;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity\Explorer;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\Entity\Map;
use TBoileau\CodinGame\Easy\DungeonsAndMaps\ValueObject\Coordinate;

final class DungeonsAndMapsTest extends TestCase
{
    /**
     * @dataProvider provideMaps
     */
    public function test(?int $numberOfActions, string $rawMap): void
    {
        $map = Map::createFromRaw($rawMap);

        $explorer = new Explorer();

        $explorer->explore($map, Coordinate::create(1, 1));

        $this->assertTrue($map->explored);

        if ($numberOfActions === null) {
            $this->assertFalse($map->treasureHasBeenFound);
        } else {
            $this->assertEquals($numberOfActions, $map->numberOfActionsToFindTreasure);
        }
    }

    public function provideMaps(): \Generator
    {
        yield 'find treasure' => [6, <<<EOF
.>>v
.^#v
..#v
...T
EOF];
        yield 'walled' => [null, <<<EOF
....
v<#.
v.#.
#.>T
EOF];
        yield 'trap' => [null, <<<EOF
....
v<#.
v.#.
..>T
EOF];
        yield 'Di' => [null, <<<EOF
....
v<#.
>^#.
...T
EOF];
    }
}
