'''
This file is about final version of change color on lips
'''



# -*- coding: utf-8 -*-
import cv2
import dlib
import numpy
import os
import sys

def readfile(filename):  
    '''''Print a file to the standard output.'''  
    f = file(filename)  
    col = f.read().rstrip() 
    value = col.lstrip('#')
    lv = len(value)
    value = value[::-1]
    col = tuple(int(value[i:i + lv // 3], 16) for i in range(0, lv, lv // 3))
    return col
    f.close()  
"""
def readfile(filename):
    with open(filename) as f:
        array = [int(x) for x in next(f).split()] 
    return array
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



