import unittest
from selenium import webdriver
import test_setup 
from selenium.webdriver.support.ui import WebDriverWait

import stud_find_proj
import stud_view_proj



class Projects(unittest.TestCase):
    # A  test case for projects.php

    def setUp(self):
        user = test_setup.UserStudent()
        # user = test_setup.UserOrg()
        self.driver = webdriver.Chrome()
        self.driver.get(user.url)
        # Load the  page
        projects = stud_find_proj.FindProjectsPage(self.driver)

        # Check if title and bio details are correct
        none_available = "Sorry there are no available projects at the moment"
        

    def test_view(self):
        # Test if projects.php elements are displayed

        if(none_available in self.driver.page_source):
            # Get number of projects on page
            num = projects.get_num_projs()

            # Get title of the first project on the
            # page
            title = projects.get_first_title()
            desc = projects.get_first_desc()

            # Click on first project
            projects.click_first_proj()

            page = stud_view_proj.ViewProject(self.driver)

            # Check if project description on
            # projects.php matches project description
            # on current page
            no_desc = "No project to view. Pls click on the Find Work button and select a project you are interested in."
            if(not page.no_desc_found(no_desc)):
                self.assertTrue(page.is_desc_displayed(desc), "Error in displaying project.php")
                self.assertTrue(page.is_title_displayed(desc), "Error in displaying to project.php")

            self.assertTrue(no_desc_found(no_desc), "Error in project.php page")


    def test_submit_proposal(self):
        # Testing submitting a proposal
         if(none_available in self.driver.page_source):
            # Click on first project
            projects.click_first_proj()

            page = stud_view_proj.ViewProject(self.driver)

            page.click_Send()

            # Fill out and submit proposal
            page.proposal = user.proposal
            page.click_submit()

            # Check if successfully navigated back to projects.php
            self.assertIn("Find a Project of Your Interest!", self.driver.title, "Proposal not successfully submitted")


    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()