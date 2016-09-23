Feature: Cash withdrawal

	Scenario: Account has sufficient funds
		Given I have deposited $100 in my account
		When I request $20
		Then $20 should be dispensed
