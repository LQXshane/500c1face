'''
This code is about adding the texture by using salt.

'''
# -*- coding: utf-8 -*-  
  
import cv2    
import numpy as np    
  
  
 
def salt(img, n):  
    for k in range(n):  
        i = int(np.random.random() * img.shape[1])  
        j = int(np.random.random() * img.shape[0])   
        if img.ndim == 2:   
            img[j,i] = 255    
        elif img.ndim == 3:     
            img[j,i,0]= 255    
            img[j,i,1]= 255    
            img[j,i,2]= 255    
    return img  
  
  
img = cv2.imread("me.png",0)    
saltImage = salt(img,90000)    
cv2.imshow("Salt", saltImage)

# star change color
th3 = cv2.adaptiveThreshold(saltImage,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,\
            cv2.THRESH_BINARY,11,2)

cv2.imwrite("im2.png", th3, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])
im=cv2.imread('im2.png')
imline=cv2.imread('im2.png')
ori = cv2.imread('me.png',)


im[np.where((im == [255,255,255]).all(axis = 2))] = [180,105,255]
im[np.where((im == [0,0,0]).all(axis = 2))] = [142,29,255]


dst = cv2.addWeighted(im,0.7,ori,0.3,0)
blur= cv2.bilateralFilter(dst,9,45,45)



cv2.imshow('lip2',blur)

cv2.imwrite("./6c.jpg", blur, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])



    
cv2.waitKey(0)    
cv2.destroyAllWindows() 