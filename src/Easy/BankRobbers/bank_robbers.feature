Feature: Bank Robbers - Easy
  Scenario Outline:
    Given A gang of <robbers> foolish robbers decides to heist a bank
    When robbers have managed to extract the following combinations <combinations>
    Then they heist the bank in <seconds> seconds

    Examples:
      | robbers | combinations                                                                    | seconds |
      | 1       | 3,1                                                                             | 250     |
      | 4       | 3,2;4,1;7,6;7,1                                                                 | 5000000 |
      | 2       | 3,1;3,2;4,0;4,0                                                                 | 1125    |
      | 5       | 6,3;7,1;4,4;8,4;3,0;4,3;8,1;3,3;5,5;7,6;6,2;5,3;5,4;7,0;7,0;8,4;6,0;6,5;3,2;4,2 | 6515625 |