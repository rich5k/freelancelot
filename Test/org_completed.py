from locators import OrgProjectsLocators
from base_page import BasePage


class OrgProjectsPage(BasePage):
    # org_projects.php page action methods

    def is_title_displayed(self, title):
        return title in self.driver.page_source

    def is_no_completed_displayed(self):
        nocompleted = "Sorry, you don\'t have any completed projects in your portfolio."
        return nocompleted in self.driver.page_source
    
    def get_completed():
        num = -1
        try:
            projs = self.driver.find_element(*OrgProjectsLocators.PROJS)
            num = len(projs)
        finally:
            return num
            
    def click_first_check(self):
        self.check = self.driver.find_element(*OrgProjectsLocators.CHECK_OUT)
        self.check.click()
    
