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