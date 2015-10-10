CREATE TABLE questions(
    id serial PRIMARY KEY NOT NULL,
    name text NOT NULL,
    email text NOT NULL,
    topic text NOT NULL,
    content text NOT NULL,
    votes integer NOT NULL DEFAULT 0,
    create_time date NOT NULL,
    update_time date NOT NULL
);

CREATE TABLE answers(
    id serial PRIMARY KEY NOT NULL,
    question_id integer REFERENCES questions(id),
    name text NOT NULL,
    email text NOT NULL,
    content text NOT NULL,
    votes integer NOT NULL DEFAULT 0,
    create_time date NOT NULL,
    update_time date NOT NULL
);