Feature: Dungeons and Maps
  Scenario: Example
    Given I want to explore a dungeon and find the treasure
    And the pack of old maps contains :
    """
    .>>v
    .^#v
    ..#v
    ...T
    """
    And the pack of old maps contains :
    """
    ....
    .v#.
    .v#.
    .>>T
    """
    And the pack of old maps contains :
    """
    ....
    v<#.
    v.#.
    ..>T
    """
    When I explore the dungeons starting at 1 and 1
    Then the map with valid and shortest path is 1
  Scenario: Trap
    Given I want to explore a dungeon and find the treasure
    And the pack of old maps contains :
    """
    >.....
    ......
    ......
    ......
    ......
    ......
    .....T
    """
    When I explore the dungeons starting at 1 and 1
    Then it's a trap
  Scenario: 2 maps
    Given I want to explore a dungeon and find the treasure
    And the pack of old maps contains :
    """
    ......
    ......
    ..>>T.
    ......
    ......
    ......
    ......
    """
    And the pack of old maps contains :
    """
    .>>>>v
    .^...v
    .^<.T<
    ......
    ......
    ......
    ......
    """
    When I explore the dungeons starting at 2 and 2
    Then the map with valid and shortest path is 0
  Scenario: Many maps
    Given I want to explore a dungeon and find the treasure
    And the pack of old maps contains :
    """
    ...........
    ...........
    .#########.
    .>>>>>>>>>v
    .^..###...v
    .^..###..T<
    ....###....
    ...........
    .#########.
    ...........
    ...........
    """
    And the pack of old maps contains :
    """
    >>>>>>>>>>v
    ^.........v
    ^#########v
    ^.........v
    ^...###...v
    ^<..###..T<
    ....###....
    ...........
    .#########.
    ...........
    ...........
    """
    And the pack of old maps contains :
    """
    ...........
    ...........
    .#########.
    .>>>>>>>>v.
    .^..###..v.
    .^..###..T.
    ....###....
    ...........
    .#########.
    ...........
    ...........
    """
    And the pack of old maps contains :
    """
    ...........
    ...........
    .#########.
    .>>>>>>>...
    .^..###....
    .^..###..T.
    ....###..^.
    ...>>>>>>^.
    .#########.
    ...........
    ...........
    """
    And the pack of old maps contains :
    """
    ...........
    ...........
    .#########.
    >>>>>>>>>v.
    ^...###..v.
    ^<..###..T.
    ....###....
    ...........
    .#########.
    ...........
    ...........
    """
    When I explore the dungeons starting at 5 and 1
    Then the map with valid and shortest path is 2
  Scenario: Di
    Given I want to explore a dungeon and find the treasure
    And the pack of old maps contains :
    """
    ###################
    #.................#
    #..>>>v......>T...#
    #..^..>v.....^<...#
    #..^...>v.........#
    #..^....v....>v...#
    #..^....v....^v...#
    #..^...v<....^v...#
    #..^..v<.....^v...#
    #..^<<<......^<...#
    #.................#
    ###################
    """
    And the pack of old maps contains :
    """
    ###################
    #.................#
    #...>>>v......>T..#
    #...^..>v.....^<..#
    #...^...>v........#
    #...^....v....>v..#
    #...^....v....^v..#
    #...^...v<....^v..#
    #...^..v<.....^v..#
    #...^<<<......^<..#
    #.................#
    ###################
    """
    When I explore the dungeons starting at 2 and 4
    Then it's a trap
  Scenario: Many maps
    Given I want to explore a dungeon and find the treasure
    And the pack of old maps contains :
    """
    #########v#########
    ##...............##
    #........#........#
    #....##..#..##....#
    #....##..#..##....#
    ...####..#..####...
    ...####..#..####...
    #........#........#
    #.#............#..#
    #.#..###.#.###.#..#
    #.#............#..#
    #.......###.......#
    .......#####.......
    ..#...#######...#..
    #..#...#####...#..#
    ##..#...###...#..##
    ###..#...#...#..###
    ####.....T.....####
    ###################
    """
    And the pack of old maps contains :
    """
    #########v#########
    ##.......>>v.....##
    #........#.v......#
    #....##..#.v##....#
    #....##..#.v##....#
    ...####..#v<####...
    ...####..#>v####...
    #........#.>>>>>>v#
    #.#............#.v#
    #.#..###.#.###.#.v#
    #.#............#.v#
    #.......###......v#
    .......#####..v<<<.
    ..#...#######v<.#..
    #..#...#####v<.#..#
    ##..#...###v<.#..##
    ###..#...#v<.#..###
    ####.....T<....####
    ###################
    """
    And the pack of old maps contains :
    """
    #########v#########
    ##......v>>>>>>>v##
    #.......v#......>v#
    #....##.v#..##...v#
    #....##.v#..##...v#
    ...####.v#..####.>>
    ...####.v#..####...
    #...v<<<v#........#
    #.#.>^..v......#..#
    #.#..###v#.###.#..#
    #.#....v<......#..#
    #.....v<###.......#
    .....v<#####.......
    ..#..v#######...#..
    #..#.>v#####...#..#
    ##..#.>v###...#..##
    ###..#.>v#...#..###
    ####....>T.....####
    ###################
    """
    And the pack of old maps contains :
    """
    #########v#########
    ##......v<>>>>>>v##
    #.......v#......>v#
    #....##.v#..##...v#
    #....##.v#..##...v#
    ...####.v#..####.>>
    ...####.v#..####...
    #...v<<<v#........#
    #.#.>^..v......#..#
    #.#..###v#.###.#..#
    #.#....v<......#..#
    #.....v<###.......#
    .....v<#####.......
    ..#..v#######...#..
    #..#.>v#####...#..#
    ##..#.>v###...#..##
    ###..#.>v#...#..###
    ####....>T.....####
    ###################
    """
    And the pack of old maps contains :
    """
    #########v#########
    ##.......>>>>>>>v##
    #........#......>v#
    #....##..#..##...v#
    #....##..#..##...v#
    ...####..#..####.>v
    ...####..#..####.v<
    #........#.......v#
    #.#............#.v#
    #.#..###v#.###.#.v#
    #.#............#.v#
    #.......###......v#
    .......#####.....>v
    ..#...#######...#v<
    #..#...#####...#v<#
    ##..#...###...#v<##
    ###..#...#...#v<###
    ####.....T<<<<<####
    ###################
    """
    And the pack of old maps contains :
    """
    #########v#########
    ##.......>>>>>>>v##
    #........#......>v#
    #....##..#..##...v#
    #....##..#..##...v#
    ...####..#..####.>v
    ...####..#..####.v<
    #........#.......v#
    #.#............#.v#
    #.#..###v#.###.#.v#
    #.#....v<<<<...#.v#
    #.....v<###^<....v#
    .....v<#####^<...>v
    ..#..v#######^..#v<
    #..#.>v#####>^.#v<#
    ##..#.>v###>^.#v<##
    ###..#.>v#>^.#v<###
    ####....>T^<<<<####
    ###################
    """
    When I explore the dungeons starting at 0 and 9
    Then the map with valid and shortest path is 3