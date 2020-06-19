Feature: Enigma - Easy
  Scenario Outline:
    Given we need to <mode> the following message <message>
    When the starting shift is <starting_shift>
    And adding the rotor <rotor_1>
    And adding the rotor <rotor_2>
    And adding the rotor <rotor_3>
    Then final output <output> is sent via Radio Transmitter

    Examples:
      | mode   | starting_shift | rotor_1                    | rotor_2                    | rotor_3                    | message                                           | output                                            |
      | ENCODE | 4              | BDFHJLCPRTXVZNYEIWGAKMUSQO | AJDKSIRUXBLHWTMCQGZNPYFVOE | EKMFLGDQVZNTOWYHXUSPAIBRCJ | AAA                                               | KQF                                               |
      | ENCODE | 7              | BDFHJLCPRTXVZNYEIWGAKMUSQO | AJDKSIRUXBLHWTMCQGZNPYFVOE | EKMFLGDQVZNTOWYHXUSPAIBRCJ | WEATHERREPORTWINDYTODAY                           | ALWAURKQEQQWLRAWZHUYKVN                           |
      | DECODE | 9              | BDFHJLCPRTXVZNYEIWGAKMUSQO | AJDKSIRUXBLHWTMCQGZNPYFVOE | EKMFLGDQVZNTOWYHXUSPAIBRCJ | PQSACVVTOISXFXCIAMQEM                             | EVERYONEISWELCOMEHERE                             |
      | ENCODE | 9              | BDFHJLCPRTXVZNYEIWGAKMUSQO | AJDKSIRUXBLHWTMCQGZNPYFVOE | EKMFLGDQVZNTOWYHXUSPAIBRCJ | EVERYONEISWELCOMEHERE                             | PQSACVVTOISXFXCIAMQEM                             |
      | ENCODE | 9              | BDFHJLCPRTXVZNYEIWGAKMUSQO | AJDKSIRUXBLHWTMCQGZNPYFVOE | EKMFLGDQVZNTOWYHXUSPAIBRCJ | EVERYONEISWELCOMEHEREEVERYONEISWELCOMEHERE        | PQSACVVTOISXFXCIAMQEMDZIXFJJSTQIENEFQXVZYV        |
      | DECODE | 5              | BDFHJLCPRTXVZNYEIWGAKMUSQO | AJDKSIRUXBLHWTMCQGZNPYFVOE | EKMFLGDQVZNTOWYHXUSPAIBRCJ | XPCXAUPHYQALKJMGKRWPGYHFTKRFFFNOUTZCABUAEHQLGXREZ | THEQUICKBROWNFOXJUMPSOVERALAZYSPHINXOFBLACKQUARTZ |
