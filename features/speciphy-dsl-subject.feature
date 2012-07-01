Feature: Speciphy DSL's subject
  System under test.

  Scenario: Execute spec with subject
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

          it('score should be 0', function ($it) {
              expect($it->score)->to->be(0);
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

  Scenario: Execute spec with outer subject
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

          public function getScore()
          {
              return $this->score;
          }
      }

      return describe('Bowling',
          describe('getScore()',
              subject(function () {
                  $bowling = new Bowling;
                  for ($i = 1; $i <= 20; $i++) {
                      $bowling->hit(0);
                  }
                  return $bowling->getScore();
              }),

              context('When all gutter game',
                  it('should be 0', function ($it) {
                      expect($it)->to->be(0);
                  })
              )
          )
      );
      """
      When I run Speciphy executable with args "."
      Then The output should contain:
        """
        .

        Bowling
          getScore()
            When all gutter game
              should be 0
        """
