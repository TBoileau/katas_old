Feature: Winamax Battle - Medium
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      AD
      KC
      QC
      """
    And player two has:
      """
      KH
      QS
      JC
      """
    Then player one wins in 3 rounds
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      5C
      3D
      2C
      7D
      8C
      7S
      5D
      5H
      6D
      5S
      4D
      6H
      6S
      3C
      3S
      7C
      4S
      4H
      7H
      4C
      2H
      6C
      8D
      3H
      2D
      2S
      """
    And player two has:
      """
      AC
      9H
      KH
      KC
      KD
      KS
      10S
      10D
      9S
      QD
      JS
      10H
      8S
      QH
      JD
      AD
      JC
      AS
      QS
      AH
      JH
      10C
      9C
      8H
      QC
      9D
      """
    Then player two wins in 26 rounds
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      6H
      7H
      6C
      QS
      7S
      8D
      6D
      5S
      6S
      QH
      4D
      3S
      7C
      3C
      4S
      5H
      QD
      5C
      3H
      3D
      8C
      4H
      4C
      QC
      5D
      7D
      """
    And player two has:
      """
      JH
      AH
      KD
      AD
      9C
      2D
      2H
      JC
      10C
      KC
      10D
      JS
      JD
      9D
      9S
      KS
      AS
      KH
      10S
      8S
      2S
      10H
      8H
      AC
      2C
      9H
      """
    Then player two wins in 56 rounds
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      8C
      KD
      AH
      QH
      2S
      """
    And player two has:
      """
      8D
      2D
      3H
      4D
      3S
      """
    Then player two wins in 1 rounds
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      10H
      KD
      6C
      10S
      8S
      AD
      QS
      3D
      7H
      KH
      9D
      2D
      JC
      KS
      3S
      2S
      QC
      AC
      JH
      7D
      KC
      10D
      4C
      AS
      5D
      5S
      """
    And player two has:
      """
      2H
      9C
      8C
      4S
      5C
      AH
      JD
      QH
      7C
      5H
      4H
      6H
      6S
      QD
      9H
      10C
      4D
      JS
      6D
      3H
      8H
      3C
      7S
      9S
      8D
      2C
      """
    Then player one wins in 52 rounds
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      8C
      KD
      AH
      QH
      3D
      KD
      AH
      QH
      6D
      """
    And player two has:
      """
      8D
      2D
      3H
      4D
      3S
      2D
      3H
      4D
      7H
      """
    Then player two wins in 1 rounds
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      AH
      4H
      5D
      6D
      QC
      JS
      8S
      2D
      7D
      JD
      JC
      6C
      KS
      QS
      9D
      2C
      5S
      9S
      6S
      8H
      AD
      4D
      2H
      2S
      7S
      8C
      """
    And player two has:
      """
      10H
      4C
      6H
      3C
      KC
      JH
      10C
      AS
      5H
      KH
      10S
      9H
      9C
      8D
      5C
      AC
      3H
      4S
      KD
      7C
      3S
      QH
      10D
      3D
      7H
      QD
      """
    Then player two wins in 1262 rounds
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      5S
      8D
      10H
      9S
      4S
      6H
      QC
      6C
      6D
      9H
      2C
      7S
      AC
      5C
      7D
      9D
      QS
      4D
      3C
      JS
      2D
      KD
      10S
      QD
      3H
      8H
      """
    And player two has:
      """
      4C
      JC
      8S
      10C
      5H
      7H
      3D
      AH
      KS
      10D
      JH
      6S
      2S
      KC
      8C
      9C
      KH
      3S
      AD
      JD
      4H
      7C
      2H
      QH
      5D
      AS
      """
    Then PAT
  Scenario:
    Given we identify the winner of the battle between 2 players
    When player one has:
      """
      4C
      4S
      QS
      7D
      QD
      AS
      6H
      5D
      2S
      10S
      3S
      2C
      JS
      10C
      2D
      5H
      KC
      AD
      KD
      JD
      JH
      9H
      7S
      6S
      3D
      8S
      """
    And player two has:
      """
      3H
      7C
      KS
      9D
      4D
      6D
      8D
      JC
      9S
      10H
      5C
      8H
      AC
      2H
      6C
      7H
      10D
      3C
      KH
      AH
      9C
      QC
      4H
      8C
      QH
      5S
      """
    Then PAT