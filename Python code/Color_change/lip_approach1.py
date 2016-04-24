'''
This code is about change the color of picture by using gaussian threshold.

Step1. 	Get the grayscale of image.

Step2. 	Adjust the histogram. 

		(It in case the picture is to dark or to light)

Step3. 	Using gaussian Threshold and rewrite the picture 

Step4. 	Set the white part of picture to color1
	 	Set the black part of picture to color2
	 	(color1 is what we want the color,color2 is a little lighter than color1)
	 	In this case, it could remain the detail of the picture.

Step5. 	Blend the new picture (which has already changed color) with the original picture.
		I use the addweight as 0.7 to 0.3
	 	(This step guarantee that the effect will be different due to the different people's orginal lip color)

Step6. 	Blur the picture to make it more nature

'''
# -*- coding: utf-8 -*-

#1.get gray 2.change Histograms 3.use gaussian 4.blur
import numpy as np
import cv2

img = cv2.imread('me.png')
dst=cv2.cvtColor(img,cv2.COLOR_BGR2GRAY) 

clahe = cv2.createCLAHE(clipLimit=2.0, tileGridSize=(8,8))
cl1 = clahe.apply(dst)
th4 = cv2.adaptiveThreshold(cl1,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,\
            cv2.THRESH_BINARY,11,2)

cv2.imwrite("im2.png", th4, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])
im=cv2.imread('im2.png')
ori = cv2.imread('me.png',)

im[np.where((im == [255,255,255]).all(axis = 2))] = [180,105,255]
im[np.where((im == [0,0,0]).all(axis = 2))] = [155,54,255]


#imline[0:rows,0:cols] = [142,29,255]

dst2 = cv2.addWeighted(im,0.7,ori,0.3,0)
blur= cv2.bilateralFilter(dst2,9,75,75)
#med= cv2.medianBlur(dst,5)
#gauss= cv2.GaussianBlur(dst,(5,5),0)

#kernel = np.ones((5,5),np.float32)/25
#blur = cv2.filter2D(dst,-1,kernel)

#cv2.imshow('lip',dst2)
cv2.imshow('lip2',blur)


cv2.imwrite("./2c.jpg", blur, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])
cv2.waitKey(0)
cv2.destroyAllWindows()