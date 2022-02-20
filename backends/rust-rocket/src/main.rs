use rocket::serde::json::Json;
use serde::{Serialize,Deserialize};

#[macro_use] extern crate rocket;

#[derive(Serialize, Deserialize)]
struct Post {
    id: usize,
    title: String,
    text: String,
}

#[derive(Serialize, Deserialize)]
struct ResultJson<T> {
    data: T,
    error: bool,
}

#[derive(Serialize, Deserialize)]
struct ResultNotFound {
    error: bool,
    msg: String,
}

#[get("/")]
fn index() -> Json<ResultJson<Vec<Post>>> {
    let mut vec: Vec<Post> = Vec::new();

    let post1: Post = Post {
        id: 1,
        title: String::from("post 1"),
        text: String::from("description post 1")
    };
    let post2: Post = Post {
        id: 2,
        title: String::from("post 2"),
        text: String::from("description post 2")
    };
    let post3: Post = Post {
        id: 3,
        title: String::from("post 3"),
        text: String::from("description post 3")
    };
    let post4: Post = Post {
        id: 4,
        title: String::from("post 4"),
        text: String::from("description post 4")
    };

    vec.push(post1);
    vec.push(post2);
    vec.push(post3);
    vec.push(post4);

    let result: ResultJson<Vec<Post>> = ResultJson {
        data: vec,
        error: false,
    };

    Json(result)
}

#[catch(404)]
fn not_found() -> Json<ResultNotFound> {
    Json(ResultNotFound {
        error:true,
        msg: String::from("Could not find request uri!")
    })
}

#[launch]
fn rocket() -> _ {
    rocket::build().register("/",catchers![not_found]).mount("/api/posts", routes![index])
}
