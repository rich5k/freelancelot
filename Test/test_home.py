import unittest
from test_setup import UserStudent
from selenium import webdriver
from home import HomePage

class homePage(unittest.TestCase):
    # A  test class for checking if the page was loaded properly

    def setUp(self):
        user = UserStudent()
        # user = test_setup.UserOrg()
        self.driver = webdriver.Chrome()
        self.driver.get(user.url)

    def test_view(self):
        # Tests to see if page elements successfully loads
        # and user name is successfully displayed after login

        homePage = HomePage(self.driver)
        # Checks if "Smart Attendance" is in the page title
        assert homePage.title_matches(), "Title doesn't match."

        # Checks if sign in was successful by checking if 
        # user name is successfully displayed
        assert homePage.is_name_displayed(), "User name is not displayed"
        self.assertEqual(homePage.name, user.name)
 

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()
