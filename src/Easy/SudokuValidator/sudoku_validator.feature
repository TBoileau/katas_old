Feature: Sudoku Validator - Easy
  Scenario: Basic grid
    Given I have to check a sudoku grid from player
    When the player give me the following sudoku grid:
      """
      1 2 3 4 5 6 7 8 9
      4 5 6 7 8 9 1 2 3
      7 8 9 1 2 3 4 5 6
      9 1 2 3 4 5 6 7 8
      3 4 5 6 7 8 9 1 2
      6 7 8 9 1 2 3 4 5
      8 9 1 2 3 4 5 6 7
      2 3 4 5 6 7 8 9 1
      5 6 7 8 9 1 2 3 4
      """
    Then his sudoku grid is good

  Scenario: Another correct grid
    Given I have to check a sudoku grid from player
    When the player give me the following sudoku grid:
      """
      4 3 5 2 6 9 7 8 1
      6 8 2 5 7 1 4 9 3
      1 9 7 8 3 4 5 6 2
      8 2 6 1 9 5 3 4 7
      3 7 4 6 8 2 9 1 5
      9 5 1 7 4 3 6 2 8
      5 1 9 3 2 6 8 7 4
      2 4 8 9 5 7 1 3 6
      7 6 3 4 1 8 2 5 9
      """
    Then his sudoku grid is good

  Scenario: Row error
    Given I have to check a sudoku grid from player
    When the player give me the following sudoku grid:
      """
      4 3 2 2 6 9 7 8 1
      6 8 5 5 7 1 4 9 3
      1 9 7 8 3 4 5 6 2
      8 2 6 1 9 5 3 4 7
      3 7 4 6 8 2 9 1 5
      9 5 1 7 4 3 6 2 8
      5 1 9 3 2 6 8 7 4
      2 4 8 9 5 7 1 3 6
      7 6 3 4 1 8 2 5 9
      """
    Then his sudoku grid is wrong

  Scenario: Column error
    Given I have to check a sudoku grid from player
    When the player give me the following sudoku grid:
      """
      4 3 5 2 6 9 7 8 1
      6 8 2 5 7 1 4 9 3
      1 9 7 8 3 4 5 6 2
      8 2 6 1 9 5 3 4 7
      3 7 4 6 8 2 9 1 5
      1 5 9 7 4 3 6 2 8
      5 1 9 3 2 6 8 7 4
      2 4 8 9 5 7 1 3 6
      7 6 3 4 1 8 2 5 9
      """
    Then his sudoku grid is wrong

  Scenario: Sub grid error
    Given I have to check a sudoku grid from player
    When the player give me the following sudoku grid:
      """
      4 3 5 2 6 9 7 8 1
      6 8 2 5 7 1 4 9 3
      8 9 7 1 3 4 5 6 2
      1 2 6 8 9 5 3 4 7
      3 7 4 6 8 2 9 1 5
      9 5 1 7 4 3 6 2 8
      5 1 9 3 2 6 8 7 4
      2 4 8 9 5 7 1 3 6
      7 6 3 4 1 8 2 5 9
      """
    Then his sudoku grid is wrong

  Scenario: Rubbish error
    Given I have to check a sudoku grid from player
    When the player give me the following sudoku grid:
      """
      5 9 6 1 4 2 5 3 7
      6 1 4 3 5 8 2 4 8
      5 6 9 4 1 2 5 3 6
      1 9 5 3 6 8 4 1 6
      5 9 3 6 3 4 8 2 1
      5 9 5 3 2 1 4 5 6
      1 3 6 4 8 6 5 2 5
      4 1 2 3 6 8 4 9 2
      3 6 8 7 4 1 5 6 3
      """
    Then his sudoku grid is wrong
