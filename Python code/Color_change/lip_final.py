'''
This file is about final version of change color on lips
I cooperate approach1 with approach2

Step1.  Get the grayscale of image.

Step2.  Adjust the histogram. 

        (It in case the picture is to dark or to light)

Step3.  Using gaussian Threshold and rewrite the picture 

Step4.  Add salt on picture,the number is 20000

Step5.  Set the white part of picture to color1
        Set the black part of picture to color2
        (color1 is what we want the color,color2 is a little darker than color1.
        Since most lipstick color are red， I set the gradual change of color from original to (0,0,255).)
        In this case, it could remain the detail of the picture.

Step6.  Blend the new picture (which has already changed color) with the original picture.
        I use the addweight as 0.7 to 0.3
        (This step guarantee that the effect will be different due to the different people's orginal lip color)

Step7.  Blur the picture to make it more nature

'''
# -*- coding: utf-8 -*-


"""

"""
color=readfile(sys.argv[2])
b=color[0]
g=color[1]
r=color[2]
B=b+(0-b)*4/10
G=g+(0-g)*4/10
R=r+(255-r)*3/10
n=20000
def colorchange(pic):
    th3 = cv2.imread(pic)
    for k in range(n):  
        i = int(numpy.random.random() * th3.shape[1])  
        j = int(numpy.random.random() * th3.shape[0]) 
        if th3.ndim == 2:   
            th3[j,i] = 255        
        elif th3.ndim == 3:     
            th3[j,i,0]= 255    
            th3[j,i,1]= 255    
            th3[j,i,2]= 255  
    #cv2.imwrite("th3.png", th3, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])       
    dst=cv2.cvtColor(th3,cv2.COLOR_BGR2GRAY) 

    clahe = cv2.createCLAHE(clipLimit=2.0, tileGridSize=(8,8))
    cl1 = clahe.apply(dst)
    #cv2.imwrite("cl1.png", cl1, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])
    th4 = cv2.adaptiveThreshold(cl1,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,\
            cv2.THRESH_BINARY,11,2)

    #th3 = cv2.adaptiveThreshold(img,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,\
            #cv2.THRESH_BINARY,11,2)

    cv2.imwrite("im2.png", th4, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])
    cha=cv2.imread('im2.png')
    ori = cv2.imread(pic)

    
    cha[numpy.where((cha == [255,255,255]).all(axis = 2))] = [b,g,r]
    cha[numpy.where((cha == [0,0,0]).all(axis = 2))] =[B,G,R]

    dst= cv2.addWeighted(cha,0.7,ori,0.3,0) 

    return dst
ne= colorchange (sys.argv[1])
new= cv2.bilateralFilter(ne,7,75,75)   
cv2.imwrite("./new.jpg", new, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])



