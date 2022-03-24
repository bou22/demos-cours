use regex::Regex;
use rocket::http::{Cookie, CookieJar};
use rocket::serde::json::Json;
use serde::{Deserialize, Serialize};

#[macro_use]
extern crate rocket;

#[derive(Deserialize)]
struct FormData {
    entier: String,
    float: String,
    couriel: String,
    url: String,
    utilisateur: String,
    motpasse: String,
}

#[derive(Serialize)]
struct FormResultItem {
    err: bool,
    msg: String,
}

#[derive(Serialize)]
struct FormResult {
    entier: FormResultItem,
    float: FormResultItem,
    couriel: FormResultItem,
    url: FormResultItem,
    utilisateur: FormResultItem,
    motpasse: FormResultItem,
}

fn validate_data(form_data: FormData) -> (bool, FormResult) {
    let mut err = false;
    let mut form_result = FormResult {
        entier: FormResultItem {
            err: false,
            msg: String::from(""),
        },
        float: FormResultItem {
            err: false,
            msg: String::from(""),
        },
        couriel: FormResultItem {
            err: false,
            msg: String::from(""),
        },
        url: FormResultItem {
            err: false,
            msg: String::from(""),
        },
        utilisateur: FormResultItem {
            err: false,
            msg: String::from(""),
        },
        motpasse: FormResultItem {
            err: false,
            msg: String::from(""),
        },
    };

    let re_entier = Regex::new(r"^[1-9]*$").unwrap();
    let re_float = Regex::new(r"^[1-9]*\.[1-9]*$").unwrap();
    let re_couriel =
        Regex::new(r"^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$")
            .unwrap();
    let re_utilisateur = Regex::new(r"^[a-zA-Z]*$").unwrap();
    let re_url = Regex::new(r"^https?:/{2}(?:[a-z]*\.)*[a-z]*$").unwrap();

    if !re_entier.is_match(&form_data.entier) {
        form_result.entier = FormResultItem {
            err: true,
            msg: String::from("The entier you have inserted is not formated properly"),
        }
    }

    if !re_float.is_match(&form_data.float) {
        err = true;
        form_result.float = FormResultItem {
            err: true,
            msg: String::from("The float you have inserted is not formated properly"),
        }
    }

    if !re_couriel.is_match(&form_data.couriel) {
        err = true;
        form_result.couriel = FormResultItem {
            err: true,
            msg: String::from("The couriel you have inserted is not formated properly"),
        }
    }

    if !re_utilisateur.is_match(&form_data.utilisateur) {
        err = true;
        form_result.utilisateur = FormResultItem {
            err: true,
            msg: String::from("The utilisateur you have inserted is not formated properly"),
        }
    }

    if !re_url.is_match(&form_data.url) {
        err = true;
        form_result.url = FormResultItem {
            err: true,
            msg: String::from("The url you have inserted is not formated properly"),
        }
    }

    (err, form_result)
}

#[post("/validate", data = "<form_data>")]
fn validate(cookies: &CookieJar<'_>, form_data: Json<FormData>) -> Json<FormResult> {
    let result = validate_data(form_data.into_inner());

    let c = match cookies
        .get("asErr")
        .map(|crumb| format!("Last Fetch Error: {}", crumb.value()))
    {
        Some(c) => c,
        None => String::from("No cookie"),
    };

    println!("{}", c);

    cookies.remove(Cookie::named("asErr"));

    if result.0 {
        cookies.add(Cookie::new("asErr", "true"));
    } else {
        cookies.add(Cookie::new("asErr", "false"));
    }
    Json(result.1)
}

#[launch]
fn rocket() -> _ {
    rocket::build().mount("/api/", routes![validate])
}
