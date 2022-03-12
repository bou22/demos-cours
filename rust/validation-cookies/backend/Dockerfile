FROM rust:latest AS builder

RUN update-ca-certificates

ENV USER=backend
ENV UID=10001

RUN adduser \
    --disabled-password \
    --gecos "" \
    --home "/nonexistent" \
    --shell "/sbin/nologin" \
    --no-create-home \
    --uid "${UID}" \
    "${USER}"


WORKDIR /backend

RUN rustup override set nightly

RUN echo "fn main() {}" > dummy.rs
COPY ./Cargo.toml .
RUN sed -i 's#src/main.rs#dummy.rs#' Cargo.toml
RUN cargo build --release
RUN sed -i 's#dummy.rs#src/main.rs#' Cargo.toml

COPY ./src ./src
COPY ./Cargo.lock .
COPY ./Cargo.toml .
COPY ./Rocket.toml .


RUN cargo install --path . --root . --force

FROM debian:bookworm-slim

COPY --from=builder /etc/passwd /etc/passwd
COPY --from=builder /etc/group /etc/group

WORKDIR /backend

COPY --from=builder /backend/bin/backend /usr/local/bin/backend
COPY ./Rocket.toml .

USER backend:backend

CMD ["backend"]
