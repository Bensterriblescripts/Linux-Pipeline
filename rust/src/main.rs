use std::process::Command;
use std::io;

fn main() {
    let basedir = "C:/Local/Repositories/";
    let mut input = String::new();

    let repositories: [&str; 3] = ["Linux-Pipeline", "Website-CoffeeOrder", "Template-Projects"];

    println!("1: Push\n2: Pull\n3: Repair\n4: Initiate");
    io::stdin().read_line(&mut input).expect("Failed to read line");

    if input.trim() == "1" {
        push(basedir, repositories);
    }
    else if input.trim() == "2" {
        pull(basedir, repositories);
    }
    else if input.trim() == "3" {
        repair(repositories);
    }
    else if input.trim() == "4" {
        initiate(repositories);
    }
}
fn command(dir: &str, arg: &str) {
    let output = Command::new("cmd")
        .args(&["/C", arg])
        .current_dir(&dir)
        .output()
        .expect("Failed to run pull command");
    if output.status.success() {
        let stdout = String::from_utf8_lossy(&output.stdout);
        println!("{}", stdout);
    } 
    else {
        let stderr = String::from_utf8_lossy(&output.stderr);
        println!("{}", stderr);
    }
}

// Commands
fn push(basedir: &str, repositories: [&str; 3]) {
    for repo in repositories {
        let mut arg = "";
        let mut dir = basedir.to_string() + repo;

        arg = "git add -A";
        command(&dir, arg);

        arg = "git commit -m 'Auto-Push'";
        command(&dir, arg);

        arg = "git push";
        command(&dir, arg);
    }
}
fn pull(basedir: &str, repositories: [&str; 3]) {
    for repo in repositories {
        let mut dir = basedir.to_string() + repo;
        let mut arg = "git pull";
        command(repo, arg);
    }
}
fn repair(repositories: [&str; 3]) {
    
}
fn initiate(repositories: [&str; 3]) {

}