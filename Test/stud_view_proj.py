from locators import viewProjectLocators
from base_page import BasePage


class ViewProject(BasePage):
    # project.php page action methods 


    def is_title_displayed(self, title):
        return title in self.driver.page_source 

    def is_desc_displayed(self, desc):
        return desc in self.driver.page_source

    def no_desc_found(self, notfound):
        return notfound in self.driver.page_source
    
    def click_send(self):
        self.send = self.driver.find_element(*viewProjectLocators.SEND)
        self.send.click()