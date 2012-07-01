Feature: Speciphy executable
  Command-line tool to execute Speciphy spec files.

  Scenario: Execute success spec with Speciphy
    Given a file named "spec/TrueSpec.php" with:
      """
      <?php
      namespace Speciphy\DSL;

      return describe("Boolean true",
          subject(function () {
              return true;
          }),

          it('should be true', function ($it) {
              expect($it)->to->be(true);
          })
      );
      """
    When I run Speciphy executable with args "."
    Then The output should contain:
      """
      .

      Boolean true
        should be true
      """

  Scenario: Execute failure spec with Speciphy
    Given a file named "spec/TrueSpec.php" with:
      """
      <?php
      namespace Speciphy\DSL;

      return describe("Boolean true",
          subject(function () {
              return false; // Wrong subject
          }),

          it('should be true', function ($it) {
              expect($it)->to->be(true);
          })
      );
      """
    When I run Speciphy executable with args "."
    Then The output should contain:
      """
      F

      Boolean true
        should be true (FAILED)
      """
