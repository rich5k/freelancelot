from locators import OrgProjProposalLocators
from base_page import BasePage

class ProjectProposalPage(BasePage):
    # project_proposal.php page methods 

    def is_stud_bio_displayed(self, bio):
        return bio in self.driver.page_source

    def is_stud_proposal_displayed(self, proposal):
        return proposal in self.driver.page_source

    def click_view_portfolio(self):
        self.link = self.driver.find_element(*OrgProjProposalLocators.PORTFOLIO)
        self.link.click()

    def click_accept_proposal(self):
        self.accept = self.driver.find_elements(*OrgProjProposalLocators.ACCEPT)
        self.accept.click()
    
    def click_decline_proposal(self):
        self.decline = self.driver.find_elements(*OrgProjProposalLocators.DECLINE)
        self.decline.click()