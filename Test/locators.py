from selenium.webdriver.common.by import By

class HomePageLocators(object):
    # A class for index page locators

    NAME = (By.ID, '') 
    NAV = (By.CLASS_NAME, 'navbar')
    SIGN_OUT = (By.ID, 'sign-in')

class signinPageLocators(object):
    # A class for login locators. 
    EMAIL = (By.ID, 'email')
    USER_STUDENT = (By.ID, 'student-check')
    USER_ORG = (By.ID, 'org-check')
    PASSWORD = (By.ID, 'password')
    SUBMIT = (By.NAME,  'submit')

class signupPageLocators(object):
    # A class for signup locators
    FIRST = (By.ID, 'fname')
    LAST = (By.NAME, 'lname')
    PASSWORD = (By.ID, 'pswd')
    CONFIRM = (By.ID, 'confirmPswd')
    EMAIL = (By.ID, 'email')
    CAT_STUDENT = (By.ID, 'student-check')
    CAT_ORG = (By.ID, 'org-check')
    SUBMIT = (By.NAME, 'submit')


class studentBioLocators(object):
    # A class for stud_bio.php
    BIO = (By.ID, 'Bio')
    MAJOR = (By.ID, 'major')
    UNIVERSITY = (By.ID, 'university')
    IMG = (By.ID, 'image')
    SUBMIT = (By.NAME, 'submit')

class studentDashboardLocators(object):
    # A class for stud_dashboard.php
    IMG = (By.CLASS_NAME, "profile-img")
    BIO = (By.ID, 'stud-bio')
    MAJOR = (By.ID, 'stud-major')
    UNIVERSITY = (By.ID, 'stud-university')
    ONG_PROJS = (By.CLASS_NAME, "ongoing-projects")
    VIEW_PORTFOLIO = (By.CLASS_NAME, "btn-view-portfolio")
    CREATE_BIO = (By.ID, 'btn-create')

class FindProjectPageLocators(object):
    # A class for projects.php
    JOBS = (By.CLASS_NAME, '')
    TITLE = (By.CLASS_NAME, "")
    TIME = (By.CLASS_NAME, "")
    STATUS = (By.CLASS_NAME, "")
    AMOUNT = (By.CLASS_NAME, "")
    DIFF = (By.CLASS_NAME, "")
    CHECK = (By.CLASS_NAME, "")

class viewProjectLocators(object):
    # A class for project.php
    NO_PROJECT = (By.ID, "")
    TITLE = (By.ID, "")
    DESC = (By.ID, "")
    SEND = (By.NAME, "submit")

class ApplyForJobLocators(object):
    # A class for proposal.php
    PROP = (By.ID, "proposal")
    SUBMIT = (By.NAME, "submit")

class studentPortfolioLocators(object):
    # A class for student_portfolio.php
    pass

class OrgDashboardLocators(object):
    # A class for org_dashboard.php
    IMG = (By.CLASS_NAME, "profile-img")
    INFO = (By.ID, "bio-info")
    LOCATION = (By.ID, "bio-location")
    WEBSITE = (By.ID, "bio-website")
    PENDING_PROJS = (By.CLASS_NAME, "pending-projs")
    ONGOING_PROJS = (By.CLASS_NAME, "ongoing-projs")
    POST_PROJ = (By.CLASS_NAME, "btn-post-proj")
    END_PROJ = (By.CLASS_NAME, "btn-end-proj")
    CREATE_PROFILE = (By.ID, "btn-profile")
    CHECK_PROP = (By.CLASS_NAME, "btn-check")
    SEE_COMPLETED = (By.ID, "btn-completed")
    NO_BIO = (By.ID, "")
    NO_PENDING = (By.ID, "")
    NO_ONGOING = (By.ID, "")
    NO_PROFILE = (By.ID, "")

class OrgProjProposalsLocators(object):
    # A class for project_proposals.php
    IMG = (By.CLASS_NAME, "profile-img")
    PROPOSALS = (By.CLASS_NAME, "proposal")
    CHECK_STUDENT = (By.CLASS_NAME, "btn-check")
    ACCEPT = (By.CLASS_NAME, "btn-accept")
    DECLINE = (By.CLASS_NAME, "btn-decline")

class OrgProjProposalLocators(object):
    # A class for student_proposal.php
    BIO = (By.ID, "stud-bio")
    PROPOSAL = (By.ID, "stud-proposal")
    PORTFOLIO = (By.CLASS_NAME, "stud-portfolio")
    ACCEPT = (By.CLASS_NAME, "btn-accept-proposal")
    DECLINE = (By.CLASS_NAME, "btn-decline-proposal")

class OrgProjectsLocators(object):
    # A class for org_projects.php
    PROJS = (By.CLASS_NAME, "proj")
    TITLE = (By.CLASS_NAME, "proj-title")
    CHECK_OUT = (By.CLASS_NAME, "proj-check-out")

class OrgBioLocators(object):
    # A class for org_info.php
    INFO = (By.ID, "companyInfo")
    LOCATION = (By.ID, "clocation")
    WEBSITE = (By.ID, "cwebsite")
    IMG = (By.ID, "Image")
    SUBMIT = (By.NAME, "submit")

class OrgPostProjectLocators(object):
    # A class for post_project.php
    TITLE = (By.ID, "ptitle")
    DESC = (By.ID, "pdescription")
    TYPE = (By.ID, "payStatus")
    AMOUNT = (By.ID, "amount")
    DiFF = (By.ID, "pdifficulty")
    SUBMIT = (By.CSS_SELECTOR, "button[type='submit']")

class OrgEndProject(object):
    pass

class FindTalent(object):
    pass

class ReviewProject(object):
    pass