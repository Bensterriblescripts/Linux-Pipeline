import os

repositories = [
    "Template-Projects", "Website-CoffeeOrders", "Linux-Pipeline", "Script-BruteForcePassword"
]
baseurl = "https://github.com/Bensterriblescripts/"

dir = "/home/ben/Repositories"
if os.path.exists(dir) == False:
    os.system("mkdir Repositories")
os.chdir(dir)

def firstSetup():
    os.system('git config --global user.email "coffeeinfusednanson@gmail.com"')
    os.system('git config --global user.name "Ben Nanson"')
    os.system('git config --global credential.helper store')

def pullAll(repositories, dir):
    for repo in repositories:
        repodir = dir + "/" + repo
        os.chdir(repodir)
        os.system('git pull')    

def pushAll(repositories, dir):
    for repo in repositories:
        repodir = dir + "/" + repo
        os.chdir(repodir)
        os.system('git add -A')
        os.system('git commit -m "Automated Push"')
        os.system('git push')

# firstSetup
# pullAll(repositories, dir)
pushAll(repositories, dir)