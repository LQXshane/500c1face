'''
This file is about change the line of eyebrow

''' 
import cv2 

#img
def dline(pic):
	im=cv2.imread(pic)
	img=cv2.imread(pic)
	img2=cv2.imread('me.png')
#img = np.zeros((512,512,3), np.uint8)
#img2 = np.zeros((512,512,3), np.uint8)
#img3 = np.zeros((512,512,3), np.uint8)
#arry
	pts = numpy.array([[80,170],[100,163],[120,160],[140,163],[160,170]], numpy.int32)
#color
	color=[48,48,97]
	b=color[0]
	g=color[1]
	r=color[2]

#black
	B=b+(0-b)*7/10
	G=g+(0-g)*7/10
	R=r+(0-r)*7/10

	cv2.polylines(img, [pts],False, (B,G,R),6)
	cv2.polylines(img2, [pts],False, (b,g,r),12)
	dst= cv2.add(img,img2)
	dst2= cv2.addWeighted(im,1.0,dst,0.5,0)
	return dst2

line=deline(sys.argv[1])
cv2.imwrite("./line.jpg", dst2, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])



