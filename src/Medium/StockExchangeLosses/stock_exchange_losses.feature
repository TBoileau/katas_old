Feature: Stock Exchange Losses - Medium
  Scenario Outline:
    Given we want to find the biggest loss
    When we analyze the following data <values>
    Then we must have a loss of <loss>
    Examples:
      | values         | loss |
      | 3 2 4 2 1 5    | -3    |
      | 5 3 4 2 3 1    | -4   |
      | 1 2 4 4 5      | 0    |
      | 3 4 7 9 10     | 0    |
      | 3 2 10 7 15 14 | -3   |