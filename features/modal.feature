Feature: Modal dialog
	
	@javascript
	Scenario: Open modal dialog
		Given I am on "/javascript.html"
			And I should see "Launch Modal"
		When I press "Launch Modal"
		Then I should see the modal "Modal Heading"
			And I should see "One fine body…"