import os

repositories = [
    "Template-Projects", "Website-CoffeeOrders", "Linux-Pipeline"
]
baseurl = "https://github.com/Bensterriblescripts/"

# Move to Repo Directory
dir = "/home/ben/Repositories"
if os.path.exists(dir) == False:
    os.system("mkdir Repositories")
os.chdir(dir)

# Setup Git Repository
def create(repo, url, dir):
    os.system("git init")
    os.system("git config --global credential.helper store")
    if os.path.exists(dir + "/" + repo) == False: 
        os.system("git clone " + url + repo + ".git")

def createAll(repositories, url, dir):
    os.system("git init")
    os.system("git config --global credential.helper store")
    for repository in repositories:
        if os.path.exists(dir + "/" + repository) == False:
            os.system("git clone " + url + repository + ".git")

# Push
def push(repo, url, dir):
    try:
        os.system("git add -A")
        os.system("git push -f --set-upstream " + url + repo + " .git master")
    except:
        create(repo, url)

def pushAll(repositories, url, dir):
    os.system("git add -A")
    os.system('git commit -m "Auto-Push"')
    for repository in repositories:
        os.system("git pull " + repository)
        print("Updating " + repository + ".....")
        try:
            os.system("git push --set-upstream " + url + repository + ".git master")
        except: 
            print("Push failed on: " + repository)


pushAll(repositories, baseurl, dir)
