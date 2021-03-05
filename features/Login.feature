Feature: Login
  Scenario: Login Functionality
    Given user navigates to the system hr_system.com
    And there user los in through the login  by using Username as "USER" and Password as "PASSWORD"
    Then Login must be successful