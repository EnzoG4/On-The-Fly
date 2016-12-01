# project-onthefly
Final Project: Sandy Choi, Eliot Kim, Lorenzo Guevara

4/11 
- Use Case diagram is improved.
- Eagle ID is tricky because you can only use your own.
- PHPMyAdmin is not the db, MySQL is.  PHPMyAdmin is an administrative front end to MySQL
  DB isn't fed, but queried by both admin and users.
  
RUBRIC - For Data Documentation
CRITERIA:
Create SQL Complete for all tables. Table names and field names well
chosen, clearly presented.
COMMENTS:
The phone number mock up data is strange.  I don't think you will be using 
international calling.
There is something wrong with the relationship between student and dining
hall.  Why do you have an enum in student, and then a table with randomly
generated dining halls.  That does not make sense.  
It also does not make sense to have an enumerated type for dining hall as
part of the student table.  Shouldn't a student be able to purchase food from 
any dining hall?
Why is the order id so complex?
What is the MOCK_DATA table?  Why is it included?
Why does the tray have a name?  Is it a fixed collection of menu items that 
a student can order? or is it a name for an order?
What about time placed for an order?
How about order status?  So for example, a deliverer would mark an
order as "in process" so you don't have a multiple deliverers completing
the same order.
How about time stamps so you can indicated the average time that it
takes to fulfill and order.  You can also use timestamps to find the 
fastest deliverer.
Deleting orders when they are complete removes valuable reporting information.
SCORE: 5 / 5 pts 
**********************
CRITERIA:
Populate SQL Complete - data is representative. All associations have
specific records demonstrating their relationships.
COMMENTS:
The menu items don't correspond to the menus at the various dining locations.
SCORE: 5 / 5 pts 
**********************
CRITERIA:
All use cases documented with actor, pre/post conditions, queried and UI
mockup - there must be a sufficient number of use cases to receive full
credit. Five is the absolute minumum. Is the purpose and function of the
use case clear?
COMMENTS:
I'm not sure why an admin would be deleting chicken from an order.
Wouldn't they just delete the order?  
I suggest you add a complete, and time placed.
What is pickup order?
SCORE: 30 / 30 pts 
**********************
CRITERIA:
Is purpose and function of the project clear? Note this is only 5
points, but its really crucial.
COMMENTS:
Yes
SCORE: 5 / 5 pts 
**********************
CRITERIA:
Data documentation includes a ER diagram.
COMMENTS:
yes, needs work
SCORE: 5/ 5 pts 
**********************
Total Points: 50 out of 50  