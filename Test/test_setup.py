class UserStudent:
    def __init__(self):
        self.url = "http://127.0.0.1:8080/freelance"
        self.fname = "Demo"
        self.lname = "Student"
        self.email = "demo.student@gmail.com"
        self.password = "password"
        self.major = "Computer Science"
        self.university = "Demo University"
        self.bio = "Demo student bio"
        self.projs = 5
        self.proposal = "This is a demo proposal"
        self.completed = 2
        self.noprojs = "No ongoing projects"
        self.nobio = "Sorry you don\'t have a bio. Please create one"
        self.nocompleted = "Sorry, you don\'t have any completed projects in your portfolio."


class UserOrg:
    def __init__(self):
        self.url = "http://127.0.0.1:8080/"
        self.cname = "Demo company"
        self.email = "demo.company@gmail.com"
        self.password = "password"
        self.location = "Demo city"
        self.info =  "We specialize in demos"
        self.website = "www.demowebsite.co.uk"
        self.pending = 5
        self.ongoing = 5
        self.completed = 2
