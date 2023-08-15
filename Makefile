init:
  git init
push:
  repo=$(cat Assets)
  for k in $repo dp
    cd /home/ben/Repo/Website-CoffeeOrders
    git pull $repo
  done
commit:
  git commit
