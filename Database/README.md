###Database Section
> Updated and maintain by Qiuxuan Lin

We have built a make up database exclusively for Witch. 

#####One of our major problem in this project is that there is NO EXISTING similar dataset for beauty products. That means, you can not find any database that contains all of the below:
1. Product color in hex or RGB
2. Product name, brand, price or other essential info
3. Purchase Link
4. Image of that prodduct

#####Our game-changer business concept MUST consists of the above- one could easily change color randomly, just use a random number generator, but could not make recommendations without such a well-stacked database.

To achive this, I've been looking into different approaches such as the Amazon API and reseached into web crawler. For the time being, we have constructed the database by using exhaustive search and Amazon ItemLookup API, which is good enough during our developing process this semester. To move forward, we must consider using a crawler/spider that could scrapy pictures from websites automatically so that our database could be huge!

This folder contains the following information:

* PHP files to get the frontend and backend connected.
* Witch101_LipsticksDB: originally collected information during development process. All info is now on the server. A manual is also included to show how to upload the forementioned info onto EC2 instances.
* backlog: desscibes some expolartotry attemps such as inspecting other makeup databases to optimize virtual makeup accuracy.
* test_connection.jpg: A demo to show sucessful connection between MySQL and other functionalities.










