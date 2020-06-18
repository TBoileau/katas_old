Feature: Van Eck's Sequence - Easy
  Scenario Outline:
    Given I start with <start>
    When I've got the <position> position of number that I need to find
    Then I must find <number>

    Examples:
      | start | position | number |
      | 0     | 2        | 0      |
      | 0     | 3        | 1      |
      | 1     | 58       | 11     |
      | 10    | 5692     | 7      |
      | 1     | 56804    | 29     |
      | 0     | 1000000  | 34143  |