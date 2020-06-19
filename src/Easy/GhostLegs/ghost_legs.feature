Feature: GhostLegs - Easy
  Scenario: Simple Sample
    Given a player want to play to ghost legs
    Then he chooses a line in:
    """
    A  B  C
    |  |  |
    |--|  |
    |  |--|
    |  |--|
    |  |  |
    1  2  3
    """
    Then we need to check the following connected pairs:
    """
    A2
    B1
    C3
    """

  Scenario: Small Sample
    Given a player want to play to ghost legs
    Then he chooses a line in:
    """
    A  B  C  D  E
    |  |  |  |  |
    |  |--|  |  |
    |--|  |  |  |
    |  |  |--|  |
    |  |--|  |--|
    |  |  |  |  |
    1  2  3  4  5
    """
    Then we need to check the following connected pairs:
    """
    A3
    B5
    C1
    D2
    E4
    """

  Scenario: 6 Lanes
    Given a player want to play to ghost legs
    Then he chooses a line in:
    """
    F  E  D  C  B  A
    |  |--|  |  |  |
    |--|  |--|  |--|
    |  |--|  |--|  |
    |  |  |  |  |--|
    |  |--|  |--|  |
    |  |  |--|  |  |
    |  |  |--|  |--|
    |--|  |  |--|  |
    |  |  |--|  |  |
    |--|  |  |  |--|
    |  |--|  |  |  |
    |  |  |--|  |  |
    0  1  2  3  4  5
    """
    Then we need to check the following connected pairs:
    """
    F3
    E1
    D0
    C2
    B5
    A4
    """

  Scenario: 8 Lanes
    Given a player want to play to ghost legs
    Then he chooses a line in:
    """
    P  Q  R  S  T  U  V  W
    |  |  |  |  |--|  |  |
    |  |  |--|  |  |  |--|
    |  |--|  |--|  |  |  |
    |--|  |--|  |  |  |--|
    |--|  |  |  |  |--|  |
    |  |--|  |  |--|  |--|
    |  |  |  |--|  |--|  |
    |--|  |  |  |--|  |  |
    |  |  |--|  |  |  |  |
    |  |  |  |--|  |  |--|
    |  |  |  |  |--|  |  |
    |--|  |  |  |  |  |  |
    |--|  |--|  |  |  |--|
    |  |--|  |  |--|  |  |
    |  |  |--|  |  |  |--|
    |--|  |--|  |  |--|  |
    1  2  3  4  5  6  7  8
    """
    Then we need to check the following connected pairs:
    """
    P3
    Q7
    R8
    S5
    T6
    U2
    V4
    W1
    """

  Scenario: 10 Lanes
    Given a player want to play to ghost legs
    Then he chooses a line in:
    """
    A  B  C  D  E  F  G  H  I  J
    |--|  |--|  |--|  |--|  |--|
    |  |--|  |--|  |--|  |--|  |
    |--|  |--|  |--|  |--|  |--|
    |--|  |--|  |--|  |--|  |--|
    |  |--|  |--|  |--|  |--|  |
    |  |--|  |--|  |--|  |--|  |
    |--|  |--|  |--|  |--|  |--|
    |--|  |--|  |--|  |--|  |--|
    |  |--|  |--|  |--|  |--|  |
    |--|  |--|  |--|  |--|  |--|
    |  |--|  |--|  |--|  |--|  |
    |--|  |--|  |--|  |--|  |--|
    |--|  |--|  |--|  |--|  |--|
    |--|  |--|  |--|  |--|  |--|
    |  |--|  |--|  |--|  |--|  |
    |--|  |--|  |--|  |--|  |--|
    |--|  |--|  |--|  |--|  |--|
    |  |--|  |--|  |--|  |--|  |
    0  1  2  3  4  5  6  7  8  9
    """
    Then we need to check the following connected pairs:
    """
    A1
    B3
    C0
    D5
    E2
    F7
    G4
    H9
    I6
    J8
    """

  Scenario: Wide and Wild
    Given a player want to play to ghost legs
    Then he chooses a line in:
    """
    ~  !  @  #  $  %  ^  &  *  (  )  +  `  1  2  3  4  5  6  7  8  9  0  =  \  /
    |  |--|  |  |--|  |  |--|  |--|  |  |--|  |  |  |--|  |--|  |  |--|  |  |--|
    |--|  |--|  |  |  |--|  |--|  |--|  |  |  |--|  |  |--|  |--|  |  |  |--|  |
    |  |--|  |--|  |  |  |  |  |--|  |--|  |  |  |  |--|  |--|  |--|  |--|  |--|
    |--|  |--|  |  |  |--|  |--|  |--|  |  |  |--|  |--|  |--|  |  |  |--|  |--|
    |--|  |  |  |  |--|  |  |--|  |  |  |  |--|  |--|  |--|  |--|  |--|  |--|  |
    |  |--|  |  |--|  |--|  |  |--|  |  |--|  |--|  |  |  |--|  |  |--|  |--|  |
    |  |  |  |--|  |--|  |--|  |  |  |--|  |--|  |  |--|  |--|  |--|  |--|  |--|
    |--|  |  |  |--|  |--|  |--|  |  |  |--|  |--|  |--|  |  |--|  |  |--|  |--|
    |  |  |--|  |  |  |  |--|  |  |--|  |  |  |  |  |  |--|  |  |  |--|  |--|  |
    |  |  |  |--|  |  |--|  |  |  |  |--|  |  |--|  |--|  |--|  |--|  |--|  |--|
    |  |--|  |--|  |  |  |  |  |--|  |--|  |  |  |  |--|  |--|  |--|  |--|  |--|
    |--|  |--|  |  |  |--|  |--|  |--|  |  |  |--|  |--|  |--|  |  |  |--|  |--|
    |--|  |  |  |  |--|  |  |--|  |  |  |  |--|  |--|  |--|  |--|  |--|  |--|  |
    |--|  |--|  |  |  |--|  |--|  |--|  |  |  |--|  |  |--|  |  |  |--|  |  |--|
    |  |--|  |  |--|  |--|  |  |--|  |  |--|  |--|  |  |  |--|  |  |--|  |--|  |
    |  |--|  |  |--|  |  |  |  |--|  |  |--|  |  |--|  |--|  |--|  |--|  |--|  |
    |--|  |  |--|  |  |  |  |--|  |  |--|  |--|  |  |--|  |--|  |--|  |--|  |--|
    |--|  |--|  |  |  |--|  |--|  |--|  |  |  |--|  |  |--|  |  |  |--|  |  |--|
    |  |--|  |  |--|  |  |--|  |--|  |  |  |--|  |--|  |  |--|  |--|  |--|  |--|
    |  |  |  |--|  |  |--|  |  |  |  |--|  |  |--|  |  |--|  |--|  |--|  |--|  |
    |--|  |--|  |--|  |--|  |--|  |--|  |--|  |--|  |--|  |--|  |  |  |  |  |--|
    a  A  b  B  c  C  d  D  e  E  f  F  g  G  h  H  i  I  j  J  k  K  l  L  m  M
    """
    Then we need to check the following connected pairs:
    """
    ~E
    !F
    @C
    #c
    $G
    %B
    ^A
    &h
    *a
    (g
    )b
    +f
    `I
    1d
    2D
    3i
    4J
    5e
    6M
    7k
    8L
    9l
    0H
    =K
    \j
    /m
    """

  Scenario: Simple Sample
    Given a player want to play to ghost legs
    Then he chooses a line in:
    """
    A  B  C
    |  |  |
    |--|  |
    |  |--|
    |  |--|
    |  |  |
    1  2  3
    """
    Then we need to check the following connected pairs:
    """
    A2
    B1
    C3
    """
