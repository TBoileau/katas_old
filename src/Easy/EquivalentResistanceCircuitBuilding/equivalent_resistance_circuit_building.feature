Feature: Equivalent Resistance Circuit Building - Easy
  Scenario: Series
    Given we need to calculate the total of resistors
    When we have a list of resistors :
      | name   | resistance |
      | A      | 20         |
      | B      | 10         |
    And the circuit is ( A B )
    Then the equivalent resistance is 30.0 Ohms
  Scenario: Parallel
    Given we need to calculate the total of resistors
    When we have a list of resistors :
      | name   | resistance |
      | C      | 20         |
      | D      | 25         |
    And the circuit is [ C D ]
    Then the equivalent resistance is 11.1 Ohms
  Scenario: Parallel
    Given we need to calculate the total of resistors
    When we have a list of resistors :
      | name   | resistance |
      | A      | 24         |
      | B      | 8         |
      | C      | 48         |
    And the circuit is [ ( A B ) [ C A ] ]
    Then the equivalent resistance is 10.7 Ohms
  Scenario: Complex
    Given we need to calculate the total of resistors
    When we have a list of resistors :
      | name   | resistance |
      | Alfa   | 1         |
      | Bravo  | 1         |
      | Charlie| 12        |
      | Delta  | 4         |
      | Echo   | 2         |
      | Foxtrot| 10        |
      | Golf   | 8         |
    And the circuit is ( Alfa [ Charlie Delta ( Bravo [ Echo ( Foxtrot Golf ) ] ) ] )
    Then the equivalent resistance is 2.4 Ohms
  Scenario: More Complex
    Given we need to calculate the total of resistors
    When we have a list of resistors :
      | name   | resistance |
      | Alef   | 30        |
      | Bet    | 20        |
      | Vet    | 10        |
    And the circuit is ( Alef [ ( Bet Bet Bet ) ( Vet [ ( Vet Vet ) ( Vet [ Bet Bet ] ) ] ) ] )
    Then the equivalent resistance is 45.0 Ohms
  Scenario: 5-pointed star
    Given we need to calculate the total of resistors
    When we have a list of resistors :
      | name   | resistance |
      | Star   | 78        |
    And the circuit is [ ( [ Star ( Star Star ) ] [ Star ( Star Star ) ] Star ) ( [ Star ( Star Star ) ] [ Star ( Star Star ) ] Star ) ]
    Then the equivalent resistance is 91.0 Ohms
