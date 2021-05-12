from element import PageTextElement
from locators import ApplyForJobLocators
from base_page import BasePage


class applyPage(BasePage):
    # proposal.php page action methods 

    proposal = PageTextElement()
    proposal.locator = ApplyForJobLocators.PROP[1]

    def click_submit(self):
        # Submits form
        self.submit = self.driver.find_element(*ApplyForJobLocators.SUBMIT)
        self.submit.click()
    
