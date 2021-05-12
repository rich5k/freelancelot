from locators import signinPageLocators
from element import PageTextElement
from base_page import BasePage



class SignInPage(BasePage):
    # sign_in.php page action methods 

    email= PageTextElement()
    email.locator = signinPageLocators.EMAIL[1]

    password = PageTextElement()
    password.locator = signinPageLocators.PASSWORD[1]
    
    def set_category_org(self):
        self.category = self.driver.find_element(*signinPageLocators.USER_ORG)
    
    def set_category_student(self):
        self.category = self.driver.find_element(*signinPageLocators.USER_STUDENT)

    def get_category(self):
        # Returns radio button
        return self.category

    def click_submit(self):
        self.submit = self.driver.find_element(*signinPageLocators.SUBMIT)
        self.submit.click()
    
    def click_category(self):
        self.category.click()



