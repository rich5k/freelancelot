from element import PageTextElement
from locators import signupPageLocators
from base_page import BasePage


class SignUpPage(BasePage):
    # SignUp.php page action methods 

    first = PageTextElement()
    first.locator = signupPageLocators.FIRST[1]

    last = PageTextElement()
    last.locator = signupPageLocators.LAST[1]

    email = PageTextElement()
    email.locator = signupPageLocators.EMAIL[1]
    
    pass1 = PageTextElement()
    pass1.locator = signupPageLocators.PASSWORD[1]

    pass2 = PageTextElement()
    pass2.locator = signupPageLocators.CONFIRM[1]

    def set_category_student(self):
        self.category = self.driver.find_element(*signupPageLocators.CAT_STUDENT)
    
    def set_category_org(self):
        self.category = self.driver.find_element(*signupPageLocators.CAT_ORG)

    def get_category(self):
        # Returns radio button 
        return self.category

    def click_submit(self):
        # Submits sign up form
        self.submit = self.driver.find_element(*signupPageLocators.SUBMIT)
        self.submit.click()
    
    def click_category(self):
        # Click radio button
        self.category.click()