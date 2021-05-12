from element import PageTextElement
from locators import OrgBioLocators
from base_page import BasePage


class OrgBioPage(BasePage):
    # org_info.php page action methods 

    info = PageTextElement()
    info.locator = OrgBioLocators.INFO[1]

    img = PageTextElement()
    img.locator = OrgBioLocators.IMG[1]

    location = PageTextElement()
    location.locator = OrgBioLocators.LOCATION[1]
    
    website = PageTextElement()
    website.locator = OrgBioLocators.WEBSITE[1]

    def click_submit(self):
        # Submits form
        self.submit = self.driver.find_element(*OrgBioLocators.SUBMIT)
        self.submit.click()
    
