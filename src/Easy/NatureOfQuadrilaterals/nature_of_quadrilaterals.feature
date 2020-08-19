Feature: Nature of Quadrilaterals - Easy
  Scenario: Quadrilateral
    Given we have to print the nature of the quadrilaterals
    When A is in -14,-3
    And B is in 5,-9
    And C is in 11,4
    And D is in -7,13
    Then we have a quadrilateral
  Scenario: Parallelogram
    Given we have to print the nature of the quadrilaterals
    When D is in -4,-2
    And E is in 2,0
    And R is in 4,4
    And P is in -2,2
    Then we have a parallelogram
  Scenario: Rhombus
    Given we have to print the nature of the quadrilaterals
    When A is in -2,0
    And B is in 0,1
    And C is in 2,0
    And D is in 0,-1
    Then we have a rhombus
  Scenario: Rectangle
    Given we have to print the nature of the quadrilaterals
    When E is in -2,-1
    And F is in -2,3
    And G is in 1,3
    And H is in 1,-1
    Then we have a rectangle
  Scenario: Square
    Given we have to print the nature of the quadrilaterals
    When A is in 1,-2
    And B is in 5,0
    And C is in 3,4
    And D is in -1,2
    Then we have a square
  Scenario: Everything - Quadrilateral
    Given we have to print the nature of the quadrilaterals
    When H is in -4,3
    And A is in 2,5
    And R is in 4,2
    And D is in 10,4
    Then we have a quadrilateral
  Scenario: Everything - Rhombus
    Given we have to print the nature of the quadrilaterals
    When J is in -2,0
    And A is in 0,1
    And C is in 2,0
    And K is in 0,-1
    Then we have a rhombus
  Scenario: Everything - Square
    Given we have to print the nature of the quadrilaterals
    When A is in 1,-2
    And B is in 5,0
    And C is in 3,4
    And D is in -1,2
    Then we have a square