use std::process::Command;
use std::path::Path;
use std::io;

fn main() {
    let basedir = "C:/Local/Repositories/";
    let mut input = String::new();

    let repositories: [&str; 3] = ["Linux-Pipeline", "Website-CoffeeOrders", "Template-Projects"];

    println!("1: Push\n2: Pull\n3: Repair\n4: Initiate\n");
    io::stdin().read_line(&mut input).expect("Failed to read line");

    if input.trim() == "1" {
        push(basedir, repositories);
    }
    else if input.trim() == "2" {
        pull(basedir, repositories);
    }
    else if input.trim() == "3" {
        println!("This will delete all locally stored repositories.\nAre you sure. (Y/N)");
        io::stdin().read_line(&mut input).expect("Failed to read line");
        if input.trim() == "y" || input.trim() == "Y" {
            repair(basedir, repositories);
        }
    }
    else if input.trim() == "4" {
        initiate(basedir, repositories);
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

// Options
fn push(basedir: &str, repositories: [&str; 3]) {
    for repo in repositories {
        let dir = basedir.to_string() + repo;
        let b: bool = Path::new(&dir).is_dir();
        if !b {
            continue;
        }

        let mut arg = "git add -A";
        command(&dir, arg);

        arg = "git commit -m 'Auto-Push'";
        command(&dir, arg);

        arg = "git push";
        command(&dir, arg);
    }
}
fn pull(basedir: &str, repositories: [&str; 3]) {
    for repo in repositories {
        let dir = basedir.to_string() + repo;
        let b: bool = Path::new(&dir).is_dir();
        if !b {
            continue;
        }
        
        let arg = "git pull";
        command(&dir, arg);
    }
}
fn repair(dir: &str, repositories: [&str; 3]) {
    for repo in repositories {
        let rm = "rm -r ";
        let arg = rm.to_string() + repo;
        command(&dir, &arg);
    }
    initiate(dir, repositories);
}
fn initiate(dir: &str, repositories: [&str; 3]) {
    let url = "https://github.com/Bensterriblescripts/";
    let arg_start = "git clone ";
    // Check is repo exists
    for repo in repositories {
        let newdir = dir.to_string() + repo;
        let b: bool = Path::new(&newdir).is_dir();
        if b {
            continue;
        }

        let arg = format!("{}{}{}.git", arg_start, url, repo);
        command(&dir, &arg);
    }
}