<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->rootDir = realpath(__DIR__ . '/../..');
        $this->executable = $this->rootDir . '/bin/speciphy';
        $this->sandboxDir = $this->rootDir . '/sandbox';
    }

    /**
     * @Given /^a file named "([^"]*)" with:$/
     */
    public function aFileNamedWith($filename, PyStringNode $content)
    {
        $filepath = "{$this->sandboxDir}/{$filename}";
        $filedir  = dirname($filepath);
        if (!file_exists($filedir)) {
            exec("mkdir -p " . escapeshellarg($filedir));
        }
        file_put_contents("{$filepath}", (string)$content);
    }

    /**
     * @When /^I run Speciphy executable with args "([^"]*)"$/
     */
    public function iRunSpeciphyExecutableWithArgs($args)
    {
        $cwd = getcwd();
        chdir($this->sandboxDir);
        ob_start();
        $this->output = shell_exec("{$this->executable} {$args} 2>&1");
        ob_end_flush();
        chdir($cwd);
    }

    /**
     * @Then /^The output should contain:$/
     */
    public function theOutputShouldContain(PyStringNode $string)
    {
        try {
            assertContains((string)$string, $this->output);
        }
        catch (Exception $e) {
            $diff = PHPUnit_Framework_TestFailure::exceptionToString($e);
            throw new Exception($diff, $e->getCode(), $e);
        }
    }
}
