FROM rust:latest AS builder

RUN update-ca-certificates

# Create appuser
ENV USER=api
ENV UID=10001

RUN adduser \
    --disabled-password \
    --gecos "" \
    --home "/nonexistent" \
    --shell "/sbin/nologin" \
    --no-create-home \
    --uid "${UID}" \
    "${USER}"


WORKDIR /rust

RUN rustup override set nightly

RUN echo "fn main() {}" > dummy.rs
COPY ./Cargo.toml .
RUN sed -i 's#src/main.rs#dummy.rs#' Cargo.toml
RUN cargo build --release
RUN sed -i 's#dummy.rs#src/main.rs#' Cargo.toml

COPY ./src ./src
COPY ./Cargo.lock .
COPY ./Cargo.toml .


RUN cargo install --path . --root . --force

####################################################################################################
## Final image
####################################################################################################
FROM debian:bookworm-slim

# Import from builder.
COPY --from=builder /etc/passwd /etc/passwd
COPY --from=builder /etc/group /etc/group

WORKDIR /api

# Copy our build
COPY --from=builder /rust/bin/rust /usr/local/bin/api

# Use an unprivileged user.
USER api:api

CMD ["api"]
