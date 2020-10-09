--You should put all of the commands necessary to create your database into this file. 
-- to connect to the heroku database, just enter the following command:
heroku pg :psql --app serene-spire-30078
-- then, create a new table for the users of the app

-- the following table is used to create an auto-increment number for the userID
CREATE TABLE tablename (
   colname SERIAL
); 

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

CREATE TABLE public.accountActivity (
    activity_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES public.budgetUser(user_id),
    transaction_id INT NOT NULL REFERENCES public.transaction(transaction_id)
);


--to show a customized list of data from different tables:
SELECT
    budgetUser.user_id,
    budgetUser.display_name,
    transaction.transaction_id,
    transaction.amount,
    transaction.notes,
    transaction.date
FROM budgetUser

INNER JOIN
    transaction
ON
-- linking  the first table primarykey to the second table foreignkey;
    budgetUser.user_id = transaction.user_id

-- extra 'ORDER BY' to display in a customized order
ORDER BY user_id;
    

--TO INSERT NEW USERS WITH AN AUTOMATIC ID JUST DECLARE THE FIELD YOU ARE WILLING TO FILL AND LEAVE THE ID TO THE APP.
--insert into public.budgetUser (user_name, password, display_name) values ('Pippolux', 'pippo1234lux', 'Pippo Camillo');


-- insert into public.transaction (user_id, amount, notes, category, date) values ('1', '2275.00', 'Salary October 2020', 'income', '2020-10-30');
-- alter table public.transaction Add date DATE NOT NULL;

-- select * from transaction;  // to see the the data in the table  

--TO GET THE TOTAL OF ALL THE TRANSACTIONS, JUST USE THE EXISTING SQL FUNCTION
-- select sum(amount) from transaction;

--TO HAVE THE TOTAL OF A SINGLE USER BUDGET BY USER_ID, USE THE FOLLOWING
--SELECT SUM(amount) FROM transaction WHERE user_id = '1';

--TO HAVE THE TOTAL OF ALL THE USER'S BUDGET BY USER_ID, USE THE FOLLOWING
-- SELECT user_id, SUM(amount) FROM transaction GROUP BY user_id;

--TO SELECT ONLY AN USER AND ALL HIS ATTRIBUTES:
--SELECT * FROM transaction WHERE user_id = '1';  
