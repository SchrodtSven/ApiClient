CREATE TABLE IF NOT EXISTS character (
    id      INTEGER PRIMARY KEY,
    marvel_id      INTEGER NOT NULL,
    priv_name      TEXT    NULL,
    char_name      TEXT NOT NULL,
    description     TEXT,
    thumb_uri TEXT, 
    api_name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS creator (
    id      INTEGER PRIMARY KEY,
    marvel_id      INTEGER NOT NULL,
    first_name      TEXT    NULL,
    mid_name      TEXT NULL,
    last_name      TEXT NULL,
    suffix     TEXT NULL,
    thumb_uri TEXT NULL, 
    full_name TEXT NULL,
    modified TEXT
);

CREATE TABLE IF NOT EXISTS event (
    id          INTEGER PRIMARY KEY,
    marvel_id   INTEGER NOT NULL,
    title       TEXT    NULL,
    start_date  TEXT NOT NULL,
    end_date    TEXT NOT NULL,
    description TEXT,
    thumb_uri TEXT
);

CREATE TABLE IF NOT EXISTS event_character (
    id          INTEGER PRIMARY KEY,
    marvel_character_id   INTEGER NOT NULL,
    marvel_event_id   INTEGER NOT NULL,
    char_name TEXT
);

CREATE TABLE IF NOT EXISTS event_creator (
    id          INTEGER PRIMARY KEY,
    marvel_creator_id   INTEGER NOT NULL,
    marvel_event_id   INTEGER NOT NULL,
    creat_name TEXT
);

INSERT INTO character
    (marvel_id, priv_name, char_name, description, thumb_uri)
    VALUES
    (%d, '%s', '%s', '%s', )