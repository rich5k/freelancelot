from locators import studentDashboardLocators
from base_page import BasePage


class StudentDashboardPage(BasePage):
    # stud_dashboard.php page action methods 

    def title_matches(self):
        return "Your Bio" in self.driver.title

    def prof_img_is_displayed(self):
        try:
            self.img = self.driver.find_element(*studentDashboardLocators.IMG)
        except:
            return false 
        else:
            return self.img.is_displayed()

    def bio_is_displayed(self, bio):
        return bio in self.driver.page_source

    def no_bio_is_displayed(self, nobio):
        return nobio in self.driver.page_source
      
    def major_is_displayed(self, major):
        return major in self.driver.page_source
    
    def no_proj_is_displayed(self, noproj):
        return noproj in self.driver.page_source


    def get_num_projs(self):
        num = -1 
        try:
            projs = self.driver.find_elements(*studentDashboardLocators.ONG_PROJS)
            num = len(projs)
        finally:
            return num

    def click_portfolio(self):
        button = self.driver.find_element(*studentDashboardLocators.VIEW_PORTFOLIO)
        button.click()

    def click_create_bio(Self):
        button = self.driver.find_element(*studentDashboardLocators.CREATE_BIO)
        button.click()