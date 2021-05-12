from element import PageTextElement
from locators import FindProjectPageLocators
from base_page import BasePage


class FindProjectsPage(BasePage):
    # projects.php page action methods 
    
    def click_first_proj(self):
        # Check out first project 
        self.check = self.driver.find_element(*FindProjectPageLocators.CHECK)
        self.check.click()
    
    def get_first_title(self):
        self.title = "Not found" 
        try:
            self.title = self.driver.find_element(*FindProjectPageLocators.TITLE)
        finally:
            return self.title

    def get_first_desc(self):
        self.desc = "Not found" 
        try:
            self.desc = self.driver.find_element(*FindProjectPageLocators.DESC)
        finally:
            return self.desc

    def get_num_projs(self):
        num = -1 
        try:
            projs = self.driver.find_elements(*FindProjectPageLocators.PROJS)
            num = len(projs)
        finally:
            return num

 