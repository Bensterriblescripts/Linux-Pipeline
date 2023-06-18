use postgres::{Client, NoTls, Error};
use std::env;

struct Order {
    id: i32,
    itemname: String,
    size: i32,
    shots: i32,
    milk: String,
    sumwhole: i32,
    sumcents: i32,
    timeadded: i32
}

fn process_orders() -> Result<Vec<Order>, Error> {
    let connstring = env::var("PostgresConnString")
        .expect("PostgresConnString must be set");

    let mut client = Client::connect(&connstring, NoTls)?;

    let mut orders = Vec::new();

    for row in client.query("SELECT id, itemname, size, shots, milk, sumwhole, sumcents, timeadded FROM orders", &[])? {
        let order = Order {
            id: row.get(0),
            itemname: row.get(1),
            size: row.get(2),
            shots: row.get(3),
            milk: row.get(4),
            sumwhole: row.get(5),
            sumcents: row.get(6),
            timeadded: row.get(7)
        };

        orders.push(order);
    }

    Ok(orders)
}

// SELECT order
fn main() -> Result<(), Error> {

    let connstring = env::var("PostgresConnString")
        .expect("PostgresConnString must be set");

    let mut client = Client::connect(&connstring, 
                                    NoTls)?;
    
    let orders = process_orders()?;

    println!("Displaying {} orders", orders);

    Ok(())
}



// let mut order = HashMap::new();
// authors.insert(String::from("Chinua Achebe"), "Nigeria");
// authors.insert(String::from("Rabindranath Tagore"), "India");
// authors.insert(String::from("Anita Nair"), "India");

// for (key, value) in &authors {
//     let order = Order {
//         _id: 0,
//         name: key.to_string(),
//         country: value.to_string()
//     };

//     client.execute(
//             "INSERT INTO author (name, country) VALUES ($1, $2)",
//             &[&author.name, &author.country],
//     )?;
// }