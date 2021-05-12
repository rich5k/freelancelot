import unittest
from selenium import webdriver
import test_setup 
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support.expected_conditions import presence_of_element_located

import org_dashboard
import org_post_project
import org_proj_proposals
import org_proj_proposal



class OrgDashboard(unittest.TestCase):
    # A  test case for stud_dashboard.php

    def setUp(self):
        user = test_setup.UserOrg()
        self.driver = webdriver.Chrome()
        self.driver.get(user.url)
        # Load the  page
        dashboard = org_dashboard.OrgaDashboard(self.driver)


    def test_view(self):
        # Test if dashboard elements are displayed

        if(not dashboard.is_no_profile_displayed()):
            # Check if title and bio details are correct
            self.assertTrue(dashboard.is_prof_img_displayed(), "Profile picture is not visible") 

            self.assertTrue(dashboard.is_info_displayed(user.info), " Company info is not displayed")  

            self.assertTrue(dashboard.is_location_displayed(user.location), " Company location is not displayed")  

            self.assertTrue(dashboard.is_web_displayed(user.website), " Company website is not displayed")  

        self.assertFalse(dashboard.is_no_profile_displayed(), "User does not have a bio")

        self.asserEqual(dashboard.get_num_pending_displayed(), user.pending, "Error in displaying pending projects")
        
        if (not dashboard.is_no_pending_displayed()):
            num_pending = dashboard.get_num_pending()
            # See proposals for first project
            # Navigatte to project_proposals.php
            page = org_proj_proposals.ProjectProposalsPage(self.driver)
            page.click_first_check_proposal()
            # Click on first proposal, navigats to org_prosposal.php
            page = org_proj_proposal.ProjectProposalPage(self.driver)
            # Check out proposal 
            page.click_accept_proposal()
            user.completed = user.completed + 1
        self.assertTrue(is_no_pending_displayed(), "Error in displaying pending projects")
    
        # if (not dashboard.is_no_ongoing_displayed()):
            # dashboard.click_first_end_project()
            # Rate student and make payment
            
        self.assertTrue(is_no_ongoing_displayed(), "Error in displaying ongoing projects")
       

    def test_view_completed_projects(self):
         # Click button to view completed projects
        dashboard.click_completed()

        page = org_completed.OrgProjectsPage(self.driver)
        # Confirm successful navigated to destination
        self.assertIn(self.driver.title, "Your Projects", "Error in navigating to completed projects org_projects.php")
        
        # If projects are displayed
        if (not page.is_no_completed_displayed()):
            # check  number of projects on page
            self.assertEqual(page.get_completed(), user.completed, "Error in displaying projects")
        
            # view first project if any 
            page.click_first_check()
            # check if navigation is successful and page loads
            # correctly
            self.assertIn(user.cname, self.driver.title,"Failed to navigate to org_project.php")

    def test_post_project(self):
        # Click button to navigate to post project page
        dashboard.click_post()

        page = org_post_project.OrgPostProjectPage(self.driver)
        # Fill out form
        page.title = "Demo project for testing"
        page.desc = "This was created in a test"
        page.select_paid()
        page.amount = 200
        page.select_expert_level()
        # Submit form
        page.click_submit()

        # Check if susccessully navigated to projects.php
        self.assertIn(self.driver.title, "Find a Project of Your Interest!", "Failed to navigate to projects.php")


    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()