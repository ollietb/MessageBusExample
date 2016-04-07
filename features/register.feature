Feature: I can register
  In order to use the site
  As a visitor
  I have to register for an account

  @core @ui
  Scenario: I can register
    Given I am registering
    When I register with the name "Ross Masters" and email "ross.masters@eventstag.com"
    Then my account is created
