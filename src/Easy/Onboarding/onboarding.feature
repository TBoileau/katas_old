Feature: Onboarding - Easy
  Scenario Outline:
    Given a cannon has to defend itself from attacking ships
    When the <enemy1> ship at <dist1> meters
    And the <enemy2> ship at <dist2> meters
    Then the cannon need to destroy <ship> because it's the closest one to him

    Examples:
      | enemy1   | dist1 | enemy2   | dist2 | ship     |
      | Rock     | 30    | HotDroid | 40    | Rock     |
      | HotDroid | 75    | Buzz     | 74    | Buzz     |
      | HotDroid | 50    | Zap      | 60    | HotDroid |
      | Zap      | 45    | Charger  | 42    | Charger  |