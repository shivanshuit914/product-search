Feature: Product Search

  Scenario: Search product from database
    Given there is a product with identification "123"
    When I search for details of product with identification "123"
    Then I should receive product details as below:
      | id  | name      | price |
      | 123 | product 1 | 100   |
    And will increase product "1234" search count to 1