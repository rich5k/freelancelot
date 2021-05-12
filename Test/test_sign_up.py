import unittest
from selenium import webdriver
import test_setup 
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support.expected_conditions import presence_of_element_located

import sign_up

class pageSignUp(unittest.TestCase):
    # A  test case for sign_up.php

    def setUp(self):
        user = test_setup.UserStudent()
        # user = test_setup.UserOrg()
        self.driver = webdriver.Chrome()
        self.driver.get(user.url)

    def test_signup(self):
        # Test singing up on the website

        # Load the  page
        signupPage = sign_up.SignUpPage(self.driver)

        # Provide user credentials to test with
        signupPage.first = user.first
        signupPage.last = user.last
        signupPage.pass1 = user.password
        signupPage.pass2 = user.password
        signupPage.email = user.email
        signupPage.set_category_student()
        signupPage.click_category()
        signupPage.click_submit()

        alert = wait.until(expected_conditions.alert_is_present())
        assert alert.text == "Well Done. You have been registered successfully"

        # Press the OK button
        alert.accept()
        alert.dismiss()
        
        # Check whether the browser was routed to the sign in page
        # if sign up was successful 
        actual_result = self.driver.getCurrentUrl()
        expected_result = "../view/signIn.php"

        self.assertEqual(actual_result, expected_result)

        

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()