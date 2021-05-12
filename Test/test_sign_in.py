import unittest
from selenium import webdriver
from test_setup import UserStudent
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support.expected_conditions import presence_of_element_located

import sign_in

class pageSignIn(unittest.TestCase):
    # A  test class for sign_in.php

    def setUp(self):
        user = UserStudent()
        # user = test_setup.UserOrg()
        self.driver = webdriver.Chrome()
        self.driver.get(user.url)

    def test_login(self):
        # Test logging into the website
        user = UserStudent()
        # user = UserOrg()

        # Load the  page
        loginPage = sign_in.SignInPage(self.driver)

        # Fill and submit form
        loginPage.email = user.email
        loginPage.set_category_student()
        loginPage.click_category()
        loginPage.password = user.password
        loginPage.click_submit()

 
        alert = wait.until(expected_conditions.alert_is_present())
        assert alert.text == "Well Done. Logged in successfully"

        # Press the OK button
        alert.accept()
        alert.dismiss()


        # Check whether the browser was routed to the dashboard
        # if login was successful 
        currentURL = self.driver.getCurrentUrl()
        expectedURL = "../view/stud_dashboard.php" 
        
        self.assertEqual(currentURL, expectedURL)

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()