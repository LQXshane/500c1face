#Tutorial for AWS EC2 Instance



###**1. Connect to the AWS instance**


So we are talking about connecting to an existing instance. To learn more about creating/managing(which is what I've been doing), see 


<https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/EC2_GetStarted.html?icmpid=docs_ec2_console>

First of all, make sure that the instance is **running**.   If it's turned off no way anyone can connect to it.

**Now, we want the key to be readable and excecutable from your computer, to do this open up your** **terminal**

(*for Windows probably doable via cmd*)

> $ cd ~/Dropbox/EC500C1/


The key is named "FaceDect.pem" (typo...yeah I know). Use chmod command

> $ chmod 400 FaceDect.pem

Use ***ssh*** to access our EC2 instance

>$ ssh -L 5901:localhost:5901 -i ~/Dropbox/EC500C1/"FaceDect.pem" ubuntu@ec2-52-90-32-113.compute-1.amazonaws.com

Notice that this command has three parts:

- -L 5901:localhost:5901  This is to set up VNC server for the next step.
- your key.pem, make sure the directory is correct
- ec2-52-90-32-113.compute-1.amazonaws.com is the public DNS for our instance. 
**Important: this would change everytime the instance is rebooted. Check up with me if necessary. 
**



###**2. Open VNC viewer on our AWS**

This step is pretty easy, since vnc is configured on this instance. However we may have to install it again when we  create a new instance. Full tutorial is here:


<http://www.brianlinkletter.com/how-to-run-gui-applications-xfce-on-an-amazon-aws-cloud-server-instance/>

For now we only have to type the following command into **the terminal of our instance.**

>vncserver :1

You'll see a ip adress if succesful.

###**3. Get a GUI **

Download the VNC viewer **on your computer**.
<https://www.realvnc.com/download/viewer/>

It is free but need registration.

Install and open up your VNC viewer.

There are two tabs:

>VNC Viewer: localhost:1

>Encrytion: let vnc viewer choose.(it wouldn't matter)

Ignore the security message and our passcode is 

>#500c1fac

#**Click connect!**

###**4. Finally**

You will be able to see the linux virtual desktop and it is no difference than working on your own! Have fun!

_I will create new instances and try to connect them together.For the time being, I propose that we all use my AWS(Amazon) account- play round, get use to working with EC2'S while we learn to code/web develop._

_This instance has only 8GB and almost 86% is being used. However, I've only **installed python, OpenCV and vncviewer**. We'll figure out if we need to purchase better instances._



