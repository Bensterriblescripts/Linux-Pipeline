import os

repositories = [
    "Template-Projects", "Website-CoffeeOrders", "Linux-Pipeline"
]
baseurl = "https://github.com/BensterribleScripts/"

dir = "/home/ben/Repo"
os.chdir(dir)

# Setup Git Repo
def create(repo, url):
    os.system("git init")
    os.system("git remote add " + repo + " " + url + repo + ".git")
    os.system("git config --global credential.helper store")
    os.system("git push --set-upstream " + repo + " master")

def createAll(repositories, url):
    os.system("git config --global credential.helper store")
    for repository in repositories:
        os.system("git init")
        os.system("git clone " + url + repository + ".git")
        os.system("git remote add " + repository + " " + url + repository + ".git")
        os.system("git push --set-upstream " + repository + " master")

# Push
def push(repo, url, dir):
    try:
        os.system("git add -A " + dir + "/" + repo)
        os.system("git push -f " + repo + " origin master")
    except:
        create(repo, url)

def pushAll(repositories, url, dir):
    for repository in repositories:
        print("Updating " + repository + ".....")
        try:
            os.system("git add -A " + dir + "/" + repository)
            os.system("git push -f " + url + repository + ".git" + " master")
        except: 
            print("Push failed on: " + repository)
pushAll(repositories, baseurl, dir)


