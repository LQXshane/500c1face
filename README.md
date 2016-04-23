# EC500C1 Face Recognition/Makeup Project: WITCH

> Hello World. We're team Witch from ECE department, Boston University.
Witch is a curriculum-based software application team project. A core technology objective was given to us, face recognition, and we have sucessfully transformed it in terms of building a real-world executable and marketable application. 
#####The idea is to utilize facial landmark detection for virtual makeup, and beyond that, we wanted to make recommendations or suggestions based on the makeups that our customer have just tried on. We believe that technology have simlified a lot of things and Witch will be another proof- it reduces the time cost and eliminates hygene concerns for women shopping for beauty products and who knows, men could also use Witch to pick out a *perfect* present for their girl.

>Witch Tells You Which. :)


## Introduction
So far, we have pulled out a web-based application hosted by cloudfront computer server. Such main functionalities are:
lipcolor and eyebrow virtual try-out and live-time recommendation links that leads you to the purchasing page. These are achieved by:

* Web app design
* Host web app and Python code on Amazon AWS
* Virtual effect processed through Python with dlib and OpenCV
* Link to Amazon Product advertising API

The following files are used to maintian all subject related documents
* AWS -- Amazon Web Service & Product Advetising API (Zhe Cai, QiuXuan Lin)
* Datebase -- MySQL files (QiuXuan Lin)
* Python code -- Python code (Yang Ming, YuanKun Li)
* Webdesign -- all files related to dynamic website design (Zhe Cai, QiuXuan Lin)

--------------------------------------------------------------------------------------
## How to use the web app:
* open it with firefox: http://ec2-54-173-250-109.compute-1.amazonaws.com
* open develop tools to inspect the files and data transfer between the front end and server
* click 'try witcha now' to test the facial effect
* click 'snap photo' to take a photo
* click 'upload' to send the picture to server; for the best result, make sure there is sufficient lighting in the room
* choose to change lipstick or eyebrow
* choose the color to apply

--------------------------------------------------------------------------------------
## AWS -- Amazon Web Service & Product Advetising API (Zhe Cai, QiuXuan Lin)

--------------------------------------------------------------------------------------
## Datebase -- MySQL files (QiuXuan Lin)

--------------------------------------------------------------------------------------
## Python code -- Python code (Yang Ming, YuanKun Li)

###Sprint 1:

* 

###Sprint2:

* 

###Sprint3:

* 

###Sprint4:

* 




--------------------------------------------------------------------------------------
## Webdesign -- (Zhe Cai, QiuXuan Lin)

There are five folders, the first one is the learning notes I wrote for this project.
And the subsequent folders are the four versions of the websites I have done for the four sprints.

This README.txt file is mainly focusing on the final version (pres4 presentation).

AWS screenshot -- the screenshot of content in AWS

cc.txt -- the color code the frontend sent for python script

contact.php -- all webpages use this, it is the contact section of the frontend

error.jpg -- these error pictures are sent to frontend if no face or more than one face is detected

eyebrow.json -- due to the limited time, this is used to replace the actual database section for eyebrow

eyebrow.py -- done by Yang Ming and Yuankun Li. It is the python script for changing eyebrow color

facedect.py -- done by Yang Ming and Yuankun Li. It is the python script for lip color

faceEffect.php -- the webpage for changing color

getcolorindo.php -- extract lipstick data from database and send to frontend

geteyebrow.php -- send eyebrow data to frontend

index.php -- homepage

mysqli_connection.php --  done by Qiuxuan Lin. log into database

nav.php -- all webpages use this, it is the nav section of the frontend

protfolio.php -- all webpage use this, it is the protfolio section of the frontend

savePicture.php -- receive the picture from the frontend and save it in local folder

sendpyimg -- triggered by the frontend; receive the color code and save it to cc.txt; evoke python script; send processed picture to frontend

sendpyimgeye --  similar to sendpyimg, but process eyebrow instead of lips
