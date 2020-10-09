------------------------------------------------------------------------
-- MYDB.sql by Emiliano Massai: 
-- All the commands to create the database are displaied below. An extra
-- section is created (USEFUL COMMANDS) with useful commands for manage the 
-- database.
------------------------------------------------------------------------
------------------------------------------------------------------------


------------------------------------------------------------------------
-- STEPS TO CREATE THE DATABASE:
------------------------------------------------------------------------
-- to connect to the heroku database, just enter the following command:
heroku pg :psql --app serene-spire-30078

-- the following table is used to create an auto-increment number for the userID
CREATE TABLE tablename (
   colname SERIAL
); 

-- then, create a new table for the users of the app
CREATE TABLE public.budgetUser (
    user_id SERIAL PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    display_name VARCHAR(100) NOT NULL 
);

CREATE TABLE public.transaction (
    transaction_id  SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES public.budgetUser(user_id),
    amount FLOAT NOT NULL,
    notes VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL,
    date DATE NOT NULL
);

-- CREATE TABLE public.accountActivity (
--     activity_id SERIAL PRIMARY KEY,
--     user_id INT NOT NULL REFERENCES public.budgetUser(user_id),
--     transaction_id INT NOT NULL REFERENCES public.transaction(transaction_id)
-- );

------------------------------------------------------------------------
-- COMMANDS TO POPULATE THE DATABASE:
------------------------------------------------------------------------
--TO INSERT NEW USERS WITH AN AUTOMATIC ID JUST DECLARE THE FIELD YOU ARE WILLING TO FILL AND LEAVE THE ID TO THE APP.
insert into public.budgetUser (user_name, password, display_name) values ('Aemolus84', 'emimass', 'Emiliano Massai');


--TO INSERT A NEW TRANSACTION BY A SPECIFIC USER
insert into public.transaction (user_id, amount, notes, category, date) values ('1', '2275.00', 'Salary October 2020', 'income', '2020-10-30');


------------------------------------------------------------------------
-- COMMANDS TO DISPLAY THE DATA FROM THE TABLES:
------------------------------------------------------------------------


-- 1 -- TO SHOW A CUSTOMIZED TABLE WITH DATA FROM MULTIPLE TABLES (ALL USERS):
-------------------------------------
SELECT
    budgetUser.user_id,
    budgetUser.display_name,
    transaction.transaction_id,
    transaction.amount,
    transaction.notes,
    transaction.category,
    transaction.date
FROM budgetUser

INNER JOIN
    transaction
ON
-- linking  the first table primarykey to the second table foreignkey;
    budgetUser.user_id = transaction.user_id

-- extra 'ORDER BY' to display in a customized order
ORDER BY date;

-- 1.1 -- TO SHOW A CUSTOMIZED TABLE WITH DATA FROM MULTIPLE TABLES (SELECTED USER):
-------------------------------------
SELECT
    budgetUser.user_id,
    budgetUser.display_name,
    transaction.transaction_id,
    transaction.amount,
    transaction.notes,
    transaction.category,
    transaction.date
FROM budgetUser

INNER JOIN
    transaction
ON
-- linking  the first table primarykey to the second table foreignkey;
    budgetUser.user_id = transaction.user_id

-- extra where is used to select only an user. Avoid this to se a complete list
-- of all the users.
WHERE budgetUser.user_id = '2'

-- extra 'ORDER BY' to display in a customized order
ORDER BY date;


-- 2 -- TO SHOW THE TOTAL AMOUNT OF THE BUDGET FOR USER WITH ID '1'
-------------------------------------
SELECT
    budgetUser.user_id,
    budgetUser.display_name,
    SUM(transaction.amount)
FROM budgetUser

INNER JOIN
    transaction
ON
-- linking  the first table primarykey to the second table foreignkey;
    budgetUser.user_id = transaction.user_id

-- extra where is used to select only an user. Avoid this to se a complete list
-- of all the users.
WHERE budgetUser.user_id = '2'
GROUP BY budgetUser.user_id;


-- 3 -- TO SHOW THE TOTAL AMOUNT OF ALL THE BUDGETS OF ALL USERS:
-------------------------------------
SELECT
    budgetUser.user_id,
    budgetUser.display_name,
    SUM(transaction.amount)
FROM budgetUser

INNER JOIN
    transaction
ON
-- linking  the first table primarykey to the second table foreignkey;
    budgetUser.user_id = transaction.user_id

-- extra where is used to select only an user. Avoid this to se a complete list
-- of all the users.
GROUP BY budgetUser.user_id
ORDER BY display_name;


---------------------------------------------------------------------------
-- USEFUL COMMANDS:
---------------------------------------------------------------------------

-- alter table public.transaction Add date DATE NOT NULL;

--CHANGE VALUES OF EXISTING DATA. 
--In this example, the data will be changed for all the transactions of the user '3'. If you want to change date for a single transaction use transaction_id instead of user_id.
UPDATE transaction
SET date = '2020-10-31' 
WHERE user_id = 3;

--to see the the data in the table  
select * from transaction;  

--TO GET THE TOTAL OF ALL THE TRANSACTIONS, JUST USE THE EXISTING SQL FUNCTION
select sum(amount) from transaction;

--TO HAVE THE TOTAL OF A SINGLE USER BUDGET BY USER_ID, USE THE FOLLOWING
SELECT SUM(amount) FROM transaction WHERE user_id = '1';

--TO HAVE THE TOTAL OF ALL THE USER'S BUDGET BY USER_ID, USE THE FOLLOWING
SELECT user_id, SUM(amount) FROM transaction GROUP BY user_id;

--TO SELECT ONLY AN USER AND ALL HIS TRANSACTIONS:
SELECT * FROM transaction WHERE user_id = '1';  

--TO DELETE A SINGLE VALUE FROM A TABLE:
DELETE FROM transaction
WHERE transaction_id = '9';

--TO DELETE ALL DATA FROM A TABLE WITHOUT DESTROY THE TABLE:
TRUNCATE TABLE  table_name;

--TO DELETE A TABLE AND ALL ITS DATA:
DROP TABLE table_name;