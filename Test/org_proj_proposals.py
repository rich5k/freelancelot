from locators import OrgProjProposalsLocators
from base_page import BasePage

class ProjectProposalsPage(BasePage):
    # project_proposals.php page methods 

    def is_stud_img_displayed(self):
        try:
            self.img = self.driver.find_element(*OrgProjProposalLocators.IMG)
        except:
            return false 
        else:
            return self.img.is_displayed()


    def is_no_proposals_displayed(self, noprop):
        return noprop in self.driver.page_source


    def get_num_proposals(self):
        num = -1 
        try:
            projs = self.driver.find_elements(*OrgProjProposalLocators.PROPOSAL)
            num = len(projs)
        finally:
            return num
    
    def click_check_first(self):
        self.check = self.driver.find_element(*OrgDashboardLocators.POST)
        self.check.click()

    def click_accept_next(self):
        self.accept = self.driver.find_elements(*OrgDashboardLocators.ACCEPT)[1]
        self.accept.click()
    
    def click_decline_next(self):
        self.decline = self.driver.find_elements(*OrgDashboardLocators.DECLINE)[2]
        self.decline.click()