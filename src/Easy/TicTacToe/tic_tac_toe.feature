Feature: Tic Tac Toe - Easy
  Scenario: No opponent - Line
    Given find the winning move of O player
    When the following tic tac toe board is :
      | O | O | . |
      | . | . | . |
      | . | . | . |
    Then the final tic tac toe board is :
      | O | O | O |
      | . | . | . |
      | . | . | . |
  Scenario: No opponent - Column
    Given find the winning move of O player
    When the following tic tac toe board is :
      | O | . | . |
      | . | . | . |
      | O | . | . |
    Then the final tic tac toe board is :
      | O | . | . |
      | O | . | . |
      | O | . | . |
  Scenario: No opponent - Diagonal
    Given find the winning move of O player
    When the following tic tac toe board is :
      | O | . | . |
      | . | O | . |
      | . | . | . |
    Then the final tic tac toe board is :
      | O | . | . |
      | . | O | . |
      | . | . | O |
  Scenario: Real condition
    Given find the winning move of O player
    When the following tic tac toe board is :
      | O | X | X |
      | X | O | . |
      | O | . | . |
    Then the final tic tac toe board is :
      | O | X | X |
      | X | O | . |
      | O | . | O |
  Scenario: Real condition
    Given find the winning move of O player
    When the following tic tac toe board is :
      | . | . | . |
      | . | . | . |
      | . | . | . |
    Then the final tic tac toe board is :
      | . | . | . |
      | . | . | . |
      | . | . | . |
