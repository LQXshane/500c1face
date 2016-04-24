### WITCH: EC500C1 Face Recognition/Makeup Project

> Hello World. We're team "Witch" from ECE department, Boston University.
Witch is a curriculum-based software application team project. A core technology objective was given to us, face recognition, and we have sucessfully transformed it in terms of building a real-world executable and marketable application. 
#####The idea is to utilize facial landmark detection for virtual makeup, and beyond that, we wanted to make recommendations or suggestions based on the makeups that our customer have just tried on. We believe that technology have simlified a lot of things and Witch will be another proof- it reduces the time cost and eliminates hygene concerns for women shopping for beauty products and who knows, men could also use our "witchcraft" to pick out a *perfect* present for their girls. ;)

>Witch Tells You Which. 


#### Introduction
So far, we have pulled out a web-based application hosted by cloudfront computer server. Such main functionalities are
lipcolor/eyebrow virtual try-out and live-time recommendation that leads you to the purchasing page. These are achieved by:

* Website frontend design, in conjunction with backend 
* L(inux)- A(pache) - M(ySQL) - P(ython & PHP) Dynamic web hosting
* Facial landmard detection and virtual effect  with dlib and OpenCV bindings
* Amazon Product advertising/ItemLookup API

--------------------------------------------------------------------------------------
#### How to use the web app:
* open it with firefox: http://ec2-54-173-250-109.compute-1.amazonaws.com
* open develop tools to inspect the files and data transfer between the front end and server
* click 'try witcha now' to test the facial effect
* click 'snap photo' to take a photo
* click 'upload' to send the picture to server; for the best result, make sure there is sufficient lighting in the room
* choose to change lipstick or eyebrow
* choose the color to apply

The following files in the repository are used to maintian all subject related documents

1. AWS -- Amazon Web Service & Product Advetising API (Zhe Cai, QiuXuan Lin)
2. Datebase -- MySQL files (QiuXuan Lin)
3. Python code -- Python code (Yang Ming, YuanKun Li)
4. Webdesign -- all files related to dynamic website design (Zhe Cai, QiuXuan Lin)


--------------------------------------------------------------------------------------
#### AWS -- Amazon Web Service & Product Advetising API (Zhe Cai, QiuXuan Lin)

--------------------------------------------------------------------------------------
#### Datebase -- MySQL files (QiuXuan Lin)

--------------------------------------------------------------------------------------
#### Python code -- Python code (Yang Ming, YuanKun Li)

#####Sprint 1:

* 

#####Sprint2:

* 

#####Sprint3:

* 

#####Sprint4:

* 




--------------------------------------------------------------------------------------
#### Webdesign -- (Zhe Cai, QiuXuan Lin)

There are five folders, the first one is the learning notes for building dynamic website. And the subsequent folders are the four versions of the websites I have done for the four sprints.

Each sprint has more features added to it:

* sprint 1: static website for the front end
* sprint 2: estabilish first dynamic website on local host with a simple GET image function
* sprint 3: upload website on AWS; connect to webcam; send and get images to and from server; connect to MySQL and send data to frontend; trigger python at AWS
* sprint 4: be able to run python-opencv-dlib at server; display product data at frontend; better frontend UI
* This README.txt file is mainly focusing on the final version (pres4 website).

##### AWS content tree
* EC2
  * Python/opencv
  * Apache server
    * MySQL
      * mysqli_connection.php
    * PHP
      * css
      * img
      * js
      * dlib
        * eyebrow.py/facedect.py
      * cc.txt / contact.php / error.jpg / eyebrow.json / faceEffect.php / getcolorindo.php / geteyebrow.php / index.php / nav.php / protfolio.php / savePicture.php / sendpyimg.php / sendpyimgeye.php

* AWS screenshot -- the screenshot of content in AWS
* cc.txt -- the color code the frontend sent for python script
* contact.php -- all webpages use this, it is the contact section of the frontend
* error.jpg -- these error pictures are sent to frontend if no face or more than one face is detected
* eyebrow.json -- due to the limited time, this is used to replace the actual database section for eyebrow
* eyebrow.py -- done by Yang Ming and Yuankun Li. It is the python script for changing eyebrow color
* facedect.py -- done by Yang Ming and Yuankun Li. It is the python script for lip color
* faceEffect.php -- the webpage for changing color
* getcolorindo.php -- extract lipstick data from database and send to frontend
* geteyebrow.php -- send eyebrow data to frontend
* index.php -- homepage
* mysqli_connection.php -- done by Qiuxuan Lin. log into database
* nav.php -- all webpages use this, it is the nav section of the frontend
* protfolio.php -- all webpage use this, it is the protfolio section of the frontend
* savePicture.php -- receive the picture from the frontend and save it in local folder
* sendpyimg.php -- triggered by the frontend; receive the color code and save it to cc.txt; evoke python script; send processed picture to frontend
* sendpyimgeye.php -- similar to sendpyimg, but process eyebrow instead of lips