use std::io::prelude::*;
use std::net::TcpListener;
use std::net::TcpStream;
use std::fs;
use std::path::Path;

fn main() {
    let listener = TcpListener::bind("0.0.0.0:4000").unwrap();
    let routes:Vec<Posts> = vec![Posts { url: "/api/posts".to_string() }];

    for stream in listener.incoming() {
        let stream = stream.unwrap();

        handle_connection(stream, &routes);
    }
}

struct Request {
    url: String,
    stream: TcpStream,
}

impl Request {
    fn new(buf:[u8;1024],stream: TcpStream) -> Request {
        let mut url = "".to_string();

        let buf_str = String::from_utf8_lossy(&buf);
        let cut = buf_str.split("\r\n").next();

        match cut {
            Some(line) => {
                let ln = line.to_string();
                let mut spl = ln.split(" ");

                match spl.next() {
                    Some(_met) => (),
                    None => ()
                }

                match spl.next() {
                    Some(path) => url = path.to_string(),
                    None => ()
                }
            },
            None => (),
        }

        Request { url, stream }
    }
}

trait Handler {
    fn new(path:String) ->Self;
}

struct Posts {
    url: String,
}

impl Posts { 
    fn handle(&self, req: &mut Request) {
        if req.url != self.url {
            panic!("Wrong path for the url");
        }

        let path = Path::new("/var/www/data.json");
        let contents = fs::read_to_string(path).unwrap();

        let response = format!(
            "HTTP/1.1 200 OK\r\nContent-Length: {}\r\nContent-Type: application/json\r\n\r\n{}",
            contents.len(),
            contents
        );

        req.stream.write(response.as_bytes()).unwrap();
        req.stream.flush().unwrap();
    }
}

impl Handler for Posts {
    fn new(path: String) -> Self {
        Posts { url: path }
    }
}

fn handle_connection(mut stream: TcpStream, posts: &Vec<Posts>) {
    let mut buffer = [0; 1024];
    stream.read(&mut buffer).unwrap();

    let mut req = Request::new(buffer, stream);

    let mut found = false;

    for post in posts {
        if post.url == req.url {
            found = true;
            post.handle(&mut req);
            break;
        }
    }

    if !found {
        let path = Path::new("/var/www/error.json");
        let contents = fs::read_to_string(path).unwrap();

        let response = format!(
            "HTTP/1.1 404 OK\r\nContent-Length: {}\r\nContent-Type: application/json\r\n\r\n{}",
            contents.len(),
            contents
        );

        req.stream.write(response.as_bytes()).unwrap();
        req.stream.flush().unwrap();
    }
}
