from element import PageTextElement
from locators import OrgPostProjectLocators
from base_page import BasePage
from selenium.webdriver.support.ui import Select



class OrgPostProjectPage(BasePage):
    # post_project.php page action methods 

    title = PageTextElement()
    title.locator = OrgPostProjectLocators.TITLE[1]

    desc = PageTextElement()
    desc.locator = OrgPostProjectLocators.DESC[1]

    amount = PageTextElement()
    amount.locator = OrgPostProjectLocators.AMOUNT[1]
    

    def click_submit(self):
        # Submits form
        self.submit = self.driver.find_element(*OrgPostProjectLocators.SUBMIT)
        self.submit.click()

    def select_paid(self):
        select = Select(driver.find_element(*OrgPostProjectLocators.TYPE))
        select.select_by_visible_text("Paid")
        
    def select_unpaid(Self):
        select = Select(driver.find_element(*OrgPostProjectLocators.TYPE))
        select.select_by_visible_text("Voluntary")

    def select_entry_level(self):
        select = Select(driver.find_element(*OrgPostProjectLocators.DIFF))
        select.select_by_visible_text("Entry Level")
        
    def select_intermediate_level(Self):
        select = Select(driver.find_element(*OrgPostProjectLocators.DIFF))
        select.select_by_visible_text("Intermediate")
    
    def select_expert_level(self):
        select = Select(driver.find_element(*OrgPostProjectLocators.DIFF))
        select.select_by_visible_text("Expert")
        
