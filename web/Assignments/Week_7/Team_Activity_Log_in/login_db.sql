-- This is the database for the login team activity
-- It is a simple database table for users with an ID, 
-- a username, and a password (to store hashed passwords).
CREATE TABLE userDB (
    id SERIAL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(256) NOT NULL
);