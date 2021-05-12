from locators import HomePageLocators
from base_page import BasePage

class HomePage(BasePage):
    # index.php page methods 

    def title_matches(self):
        # Checks that "Freelancelot" is in page title
        return "Freelancelot" in self.driver.title

    def is_nav_displayed(self):
        self.nav = self.driver.find_element(*HomePageLocators.NAV)
        return self.nav.is_displayed()
    
    def is_name_displayed(self, name):
        return name in self.driver.page_source
    
    def click_sign_out(self):
        self.button = self.driver.find_element(*HomePageLocators.SIGN_OUT)
        self.button.click()

