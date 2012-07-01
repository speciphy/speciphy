Feature: Speciphy DSL using not array but function argument.

  Scenario: Execute spec with argument notation
    Given a file named "spec/BowlingSpec.php" with:
      """
      <?php
      namespace Speciphy\DSL;

      class Bowling
      {
          public $score = 0;

          public function hit()
          {
          }
      }

      return describe('Bowling',
          subject(function () {
              $bowling = new Bowling;
              for ($i = 1; $i <= 20; $i++) {
                  $bowling->hit(0);
              }
              return $bowling;
          }),

          it('score should be 0', function ($bowling) {
              expect($bowling->score)->to->be(0);
          })
      );
      """
    When I run Speciphy executable with args "."
    Then The output should contain:
      """
      .

      Bowling
        score should be 0
      """
