use std::process::Command;
use std::io;

fn main() {
    let basedir = "C:/Local/Repositories/";
    let mut input = String::new();

    let mut repo = basedir.to_string() + "Linux-Pipeline";

    println!("1: Push\n2: Pull\n3: Initiate Repositories\n");
    io::stdin().read_line(&mut input).expect("Failed to read line");

    if input.trim() == "1" {
        push(&repo);
    }
    else if input.trim() == "2" {
        pull(&repo);
    }
}

fn pull(repo: &str) {

    let output = Command::new("cmd")
        .args(&["git pull"])
        .current_dir(repo)
        .output()
        .expect("Failed to execute command");

    if output.status.success() {
        let stdout = String::from_utf8_lossy(&output.stdout);
        println!("{}", stdout);
    } 
    else {
        let stderr = String::from_utf8_lossy(&output.stderr);
        println!("{}", stderr);
    }
}

fn push(repo: &str) {

    // Add all
    let output = Command::new("cmd")
        .args(&["/C", "git add -A"])
        .current_dir(repo)
        .output()
        .expect("Failed to execute command");

    if output.status.success() {
        let stdout = String::from_utf8_lossy(&output.stdout);
        println!("{}", stdout);
    } 
    else {
        let stderr = String::from_utf8_lossy(&output.stderr);
        println!("{}", stderr);
    }

    // Commmit message
    let output = Command::new("cmd")
        .args(&["/C", "git commit -m 'Auto-Push'"])
        .current_dir(repo)
        .output()
        .expect("Failed to execute command");

    if output.status.success() {
        let stdout = String::from_utf8_lossy(&output.stdout);
        println!("{}", stdout);
    } 
    else {
        let stderr = String::from_utf8_lossy(&output.stderr);
        println!("{}", stderr);
    }

    // Push
    let output = Command::new("cmd")
        .args(&["/C", "git push"])
        .current_dir(repo)
        .output()
        .expect("Failed to execute command");

    if output.status.success() {
        let stdout = String::from_utf8_lossy(&output.stdout);
        println!("{}", stdout);
    } 
    else {
        let stderr = String::from_utf8_lossy(&output.stderr);
        println!("{}", stderr);
    }
}