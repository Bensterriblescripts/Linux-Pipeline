use std::process::Command;
use std::io;

fn main() {
    let basedir = "C:/Local/Repositories/";
    let mut input = String::new();

    let repositories: [&str; 2] = ["Linux-Pipeline", "CoffeeOrders-Website"];

    println!("1: Push\n2: Pull\n3: Initiate Repositories\n");
    io::stdin().read_line(&mut input).expect("Failed to read line");

    if input.trim() == "1" {
        push(basedir, repositories);
    }
    else if input.trim() == "2" {
        pull(basedir, repositories);
    }
}

fn push(basedir: &str, repositories: [&str; 2]) {

    for repo in repositories {

        let mut dir = basedir.to_string() + repo;

        // Add all
        let output = Command::new("cmd")
            .args(&["/C", "git add -A"])
            .current_dir(&dir)
            .output();

        // Commmit message
        let output = Command::new("cmd")
            .args(&["/C", "git commit -m 'Auto-Push'"])
            .current_dir(&dir)
            .output();

        // Push
        let output = Command::new("cmd")
            .args(&["/C", "git push"])
            .current_dir(&dir)
            .output();
    }

}

fn pull(basedir: &str, repositories: [&str; 2]) {

    for repo in repositories {
        let mut dir = basedir.to_string() + repo;

        let output = Command::new("cmd")
            .args(&["git pull"])
            .current_dir(repo)
            .output();
    }
}