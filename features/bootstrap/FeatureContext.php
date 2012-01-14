<?php

require_once __DIR__.'/../../vendor/.composer/autoload.php';

use Behat\Behat\Context\ClosuredContextInterface,
	Behat\Behat\Context\TranslatedContextInterface,
	Behat\Behat\Context\BehatContext,
	Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
	Behat\Gherkin\Node\TableNode;

/**
 * Features context.
 */
class FeatureContext extends Behat\Mink\Behat\Context\MinkContext
{
	/**
	 * Initializes context.
	 * Every scenario gets it's own context object.
	 *
	 * @param   array   $parameters     context parameters (set them up through behat.yml)
	 */
	public function __construct(array $parameters)
	{
		// Initialize your context here
	}

	private function jqueryWait($duration = 1000)
	{
			$this->getSession()->wait($duration, '(0 === jQuery.active && 0 === jQuery(\':animated\').length)');
	}

	/**
	 * @Then /^I should see the modal "([^"]*)"$/
	 */
	public function iShouldSeeTheModal($title)
	{
		$this->jqueryWait(20000);
		$this->assertElementContainsText('#modal-from-dom .modal-header h3', $title);
		assertTrue($this->getSession()->getPage()->find('css', '#modal-from-dom')->isVisible());
	}
}
