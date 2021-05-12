from element import PageTextElement
from locators import studentBioLocators
from base_page import BasePage


class StudentBioPage(BasePage):
    # stud_bio.php page action methods 

    bio = PageTextElement()
    bio.locator = studentBioLocators.BIO[1]

    img = PageTextElement()
    img.locator = studentBioLocators.IMG[1]

    major = PageTextElement()
    major.locator = studentBioLocators.MAJOR[1]
    
    university = PageTextElement()
    university.locator = studentBioLocators.UNIVERSITY[1]

    def click_submit(self):
        # Submits form
        self.submit = self.driver.find_element(*studentBioLocators.SUBMIT)
        self.submit.click()
    
