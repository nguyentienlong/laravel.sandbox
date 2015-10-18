<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext;


/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
  /**
   * @Given some precondition
   */
  public function somePrecondition()
  {
      $session = $this->getSession();
      $session->visit('http://google.com');
      //$t = $session->getStatusCode();
      $this->assertResponseStatus(200);
      //throw new PendingException();
  }

  /**
   * @Given some other precondition
   */
  public function someOtherPrecondition()
  {
      echo ('pass');
      //throw new PendingException();
  }

  /**
   * @When some action by the actor
   */
  public function someActionByTheActor()
  {
      echo ('pass2');
      //throw new PendingException();
  }

  /**
   * @When some other action
   */
  public function someOtherAction()
  {
      echo ('pass3');
      //throw new PendingException();
  }

  /**
   * @When yet another action
   */
  public function yetAnotherAction()
  {
      echo ('pass4');
      //throw new PendingException();
  }

  /**
   * @Then some testable outcome is achieved
   */
  public function someTestableOutcomeIsAchieved()
  {
      echo ('pass5');
      //throw new PendingException();
  }

  /**
   * @Then something else we can check happens too
   */
  public function somethingElseWeCanCheckHappensToo()
  {
      echo ('pass6');
      throw new PendingException();
  }


}
