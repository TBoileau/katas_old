<?php

declare(strict_types=1);

namespace TBoileau\CodinGame\Easy\Asteroids\Tests;

use Generator;
use PHPUnit\Framework\TestCase;
use TBoileau\CodinGame\Easy\Asteroids\Entity\Asteroid;
use TBoileau\CodinGame\Easy\Asteroids\Entity\Point;
use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Position;
use TBoileau\CodinGame\Easy\Asteroids\ValueObject\Time;

final class AsteroidsTest extends TestCase
{
    /**
     * @param array<array-key, array{asteroid: Asteroid, final: Position}> $asteroids
     * @dataProvider providesData
     */
    public function test(array $asteroids, Time $time): void
    {
        /** @var array{asteroid: Asteroid, final: Position} $asteroid */
        foreach ($asteroids as $asteroid) {
            $asteroid['asteroid']->determineFinalPositionAt($time);
            $this->assertEquals($asteroid['final'], $asteroid['asteroid']->getFinalPoint()->position);
        }
    }

    /**
     * @return Generator<string, Time|array<array-key, array{asteroid: Asteroid, final: Position}>>
     */
    public function providesData(): Generator
    {
        yield 'horizontal motion' => [
            [
                [
                    'asteroid' => Asteroid::create(
                        'A',
                        [
                        Point::create(Time::create(1), Position::create(0, 0)),
                        Point::create(Time::create(2), Position::create(0, 1))
                        ]
                    ),
                    'final' => Position::create(0, 2)
                ],
            ],
            Time::create(3)
        ];

        yield 'vertical motion' => [
            [
                [
                    'asteroid' => Asteroid::create(
                        'A',
                        [
                            Point::create(Time::create(1), Position::create(0, 0)),
                            Point::create(Time::create(2), Position::create(1, 0))
                        ]
                    ),
                    'final' => Position::create(2, 0)
                ],
            ],
            Time::create(3)
        ];

        yield 'combined motion' => [
            [
                [
                    'asteroid' => Asteroid::create(
                        'A',
                        [
                            Point::create(Time::create(1), Position::create(0, 0)),
                            Point::create(Time::create(2), Position::create(1, 1))
                        ]
                    ),
                    'final' => Position::create(2, 2)
                ],
            ],
            Time::create(3)
        ];

        yield 'negative motion' => [
            [
                [
                    'asteroid' => Asteroid::create(
                        'A',
                        [
                            Point::create(Time::create(1), Position::create(2, 2)),
                            Point::create(Time::create(2), Position::create(1, 1))
                        ]
                    ),
                    'final' => Position::create(0, 0)
                ],
            ],
            Time::create(3)
        ];

        yield 'greater delta' => [
            [
                [
                    'asteroid' => Asteroid::create(
                        'A',
                        [
                            Point::create(Time::create(1), Position::create(0, 0)),
                            Point::create(Time::create(5), Position::create(0, 4))
                        ]
                    ),
                    'final' => Position::create(0, 5)
                ],
            ],
            Time::create(6)
        ];

        yield 'no motion' => [
            [
                [
                    'asteroid' => Asteroid::create(
                        'A',
                        [
                            Point::create(Time::create(0), Position::create(1, 1)),
                            Point::create(Time::create(1255), Position::create(1, 1))
                        ]
                    ),
                    'final' => Position::create(1, 1)
                ],
            ],
            Time::create(9999)
        ];

        yield 'regular delta grater than 1' => [
            [
                [
                    'asteroid' => Asteroid::create(
                        'A',
                        [
                            Point::create(Time::create(1), Position::create(0, 0)),
                            Point::create(Time::create(3), Position::create(0, 1))
                        ]
                    ),
                    'final' => Position::create(0, 2)
                ],
            ],
            Time::create(5)
        ];
    }
}
