CREATE TABLE scriptures (
        scriptures_id SERIAL PRIMARY KEY,
        book VARCHAR(255),
        chapter INT,
        verse INT,
        content VARCHAR(255)
);
INSERT INTO scriptures (book, chapter, verse, content)
VAlUES (
                'John',
                1,
                5,
                'And the light shineth in darkness; and the darkness comprehended it not.'
        );
INSERT INTO scriptures (book, chapter, verse, content)
VAlUES (
                'Doctrine and Covenants',
                88,
                49,
                'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
        );
INSERT INTO scriptures (book, chapter, verse, content)
VAlUES (
                'Doctrine and Covenants',
                93,
                28,
                'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
        );
INSERT INTO scriptures (book, chapter, verse, content)
VAlUES (
                'Mosiah',
                16,
                9,
                'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
        );
-- This is the assignment of this week.To add the table, open the "Scriptures" database and:
CREATE TABLE topic (
        topic_id SERIAL PRIMARY KEY,
        name VARCHAR(255)
);
-- Insert multiple rows using the multirow VALUES syntax (for PostgreSQL 8.2 or newer)
INSERT INTO topic (name)
VALUES ('Faith'),
        ('Sacrifice'),
        ('Charity');
-- Create another table to link scriptures to topics. (This is a many-to-many relationship, so it requires another table for the linking). Make sure to include foreign keys constraints.
--  The following table has only one purpose, and that is to create a "Many to Many" relationship between a scripture and its topic.
CREATE TABLE scriptures_topic_link (
        scriptures_topic_link SERIAL PRIMARY KEY,
        scriptures_id INT NOT NULL REFERENCES scriptures (scriptures_id),
        topic_id INT NOT NULL REFERENCES topic (topic_id)
);