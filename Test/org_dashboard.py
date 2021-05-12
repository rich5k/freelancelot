from locators import OrgDashboardLocators
from base_page import BasePage


class OrgDashboard(BasePage):
    # org_dashboard.php page action methods
    
    def is_prof_img_displayed(self):
        self.img = self.driver.find_element(*OrgDashboardLocators)
        return self.img.is_displayed()

    def is_info_displayed(self, info):
        return info in self.driver.page_source

    def is_location_displayed(self, location):
        return location in self.driver.page_source
    
    def is_web_displayed(self, website):
        return website in self.driver.page_source
    
    def is_no_profile_displayed(self):
        noprofile = "Sorry you don\'t have a profile for your company. Please create one"
        return noprofile in self.driver.page_source

    def is_no_pending_displayed(self):
        noproj = "No Pending Projects"
        return noproj in self.driver.page_source

    def is_no_ongoing_displayed(self):
        noongoing ="No ongoing projects"
        return noongoing in self.driver.page_source

    def get_num_pending(self):
        num = -1 
        try:
            projs = self.driver.find_elements(*OrgDashboardLocators.PENDING_PROJS)
            num = len(projs)
        finally:
            return num

    def get_num_ongoing(self):
        num = -1 
        try:
            projs = self.driver.find_elements(*OrgDashboardLocators.ONGOING_PROJS)
            num = len(projs)
        finally:
            return num
    

    def click_first_check_proposal(self):
        self.check = self.driver.find_element(*OrgDashboardLocators.CHECK_PROP)
        self.check.click()
    
    def click_post(self):
        self.post = self.driver.find_element(*OrgDashboardLocators.POST_PROJ)
        self.post.click()
    
    def click_create_profile(self):
        self.create = self.driver.find_element(*OrgDashboardLocators.CREATE_PROFILE)
        self.create.click()
    
    def click_first_end_project(self):
        self.end = self.driver.find_element(*OrgDashboardLocators.END_PROFILE)
        self.end.click()
    
    def click_completed(self):
        self.completed = self.driver.find_element(*OrgDashboardLocators.SEE_COMPLETED)
        self.completed.click()