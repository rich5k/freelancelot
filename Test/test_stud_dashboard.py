import unittest
from selenium import webdriver
import test_setup 
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support.expected_conditions import presence_of_element_located

import stud_dashboard
import stud_bio


class StudentDashboard(unittest.TestCase):
    # A  test case for stud_dashboard.php

    def setUp(self):
        user = test_setup.UserStudent()
        self.driver = webdriver.Chrome()
        self.driver.get(user.url)

    def test_view(self):
        # Test if dashboard elements are displayed

        # Load the  page
        dashboard = stud_dashboard.StudentDashboardPage(self.driver)

        # Check if title and bio details are correct
        assert dashboard.title_matches()

        self.assertTrue(dashboard.prof_img_is_displayed(), "Profile picture is not visible") 

        self.assertTrue(dashboard.bio_is_displayed(user.bio), " Student's bio is not displayed")  

        if(not dashboard.bio_is_displayed(user.bio)):
            self.assertTrue(dashboard.no_bio_is_displayed(user.nobio), "Error in stud_dashboard.php")

        self.asserEqual(dashboard.get_num_projects(), user.projs, "Ongoing projects not diplayed")
        if (dashboard.get_num_projects() == -1):
            assertTrue(dashboard.no_proj_is_displayed(user.noproj), "Error in displaying acailable projects")
    
        # Click button to view student portfolio
        dashboard.click_portfolio()

        # Confirm that student_portfolio.php has been navigated to
        assertEqual(self.driver.title, "Your Porfolio", "Error in navigating to student portfolio")
        
        projs = self.driver.find_elements_by_class_name("projects")

        self.assertEqual(len(projs), user.completed, "Completed projects not displayed")

        self.assertFalse(user.nocompleted in self.driver.page_source )

    def test_create_bio(self):
        if(not dashboard.bio_is_displayed(user.bio)):
            page = stud_bio.StudentBioPage(self.driver)

            page.bio = user.bio
            page.img = os.getcwd()+"images/test.png"
            page.major = user.major
            page.university = user.university

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()