import cv2
import dlib
import numpy
import os
import sys


PREDICTOR_PATH = "dlib/python_examples/shape_predictor_68_face_landmarks.dat"
SCALE_FACTOR = 1 
FEATHER_AMOUNT = 11

FACE_POINTS = list(range(17, 68))
MOUTH_POINTS = list(range(48, 61))
RIGHT_BROW_POINTS = list(range(17, 22))
LEFT_BROW_POINTS = list(range(22, 27))
RIGHT_EYE_POINTS = list(range(36, 42))
LEFT_EYE_POINTS = list(range(42, 48))
NOSE_POINTS = list(range(27, 35))
JAW_POINTS = list(range(0, 17))

detector = dlib.get_frontal_face_detector()
predictor = dlib.shape_predictor(PREDICTOR_PATH)

#img
def get_landmarks(im):
    rects = detector(im, 1)
    error1 = cv2.imread('./error.jpg')
    error2 = cv2.imread('./error2.jpg')
    if len(rects) > 1:
        cv2.imwrite('./facepy.jpeg', error1)
        exit()
    if len(rects) == 0:
        cv2.imwrite('./facepy.jpeg', error2)
        exit()
    return numpy.matrix([[p.x, p.y] for p in predictor(im, rects[0]).parts()])

def readfile(filename):  
    '''''Print a file to the standard output.'''  
    f = file(filename)  
    col = f.read().rstrip() 
    value = col.lstrip('#')
    lv = len(value)
    col = tuple(int(value[i:i + lv // 3], 16) for i in range(0, lv, lv // 3))
    col=col[2],col[1],col[0]
    return col
    f.close()  

def dline(pic):
	im=cv2.imread(pic)
	img=cv2.imread(pic)
	img2=cv2.imread(pic)
#img = np.zeros((512,512,3), np.uint8)
#img2 = np.zeros((512,512,3), np.uint8)
#img3 = np.zeros((512,512,3), np.uint8)
#arry
        s = get_landmarks(im)
	pts1 = numpy.array(s[17:22], numpy.int32)
        pts2 = numpy.array(s[22:27], numpy.int32)
#color
        
	color=readfile(sys.argv[2])
	b=color[0]
	g=color[1]
	r=color[2]

#black
	B=b+(0-b)*7/10
	G=g+(0-g)*7/10
	R=r+(0-r)*7/10

	#cv2.polylines(img, [pts1],False, (B,G,R),6)
        #cv2.polylines(img, [pts2],False, (B,G,R),6)
        cv2.polylines(img2, [pts1],False, (b,g,r),12)
	cv2.polylines(img2, [pts2],False, (b,g,r),12)
	#dst= cv2.add(img,img2)
	#dst2= cv2.addWeighted(img2,1.0,dst,0.5,0)
	return img2

line = dline(sys.argv[1])
cv2.imwrite("./new.jpg", line, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])



