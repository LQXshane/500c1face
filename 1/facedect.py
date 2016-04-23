# -*- coding: utf-8 -*-
import cv2
import dlib
import numpy
import os
import sys

PREDICTOR_PATH = "./shape_predictor_68_face_landmarks.dat"
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

# Points used to line up the images.
ALIGN_POINTS = ( MOUTH_POINTS)

# Points from the second image to overlay on the first. The convex hull of each
# element will be overlaid.
OVERLAY_POINTS = [
    MOUTH_POINTS
]

# Amount of blur to use during colour correction, as a fraction of the
# pupillary distance.
#COLOUR_CORRECT_BLUR_FRAC = 0.6

detector = dlib.get_frontal_face_detector()
predictor = dlib.shape_predictor(PREDICTOR_PATH)

class TooManyFaces(Exception):
    pass

class NoFaces(Exception):
    pass

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

def annotate_landmarks(im, landmarks):
    im = im.copy()
    for idx, point in enumerate(landmarks):
        pos = (point[0, 0], point[0, 1])
        cv2.putText(im, str(idx), pos,
                    fontFace=cv2.FONT_HERSHEY_SCRIPT_SIMPLEX,
                    fontScale=0.4,
                    color=(0, 0, 255))
        cv2.circle(im, pos, 3, color=(0, 255, 255))
    return im

def draw_convex_hull(im, points, color):
    points = cv2.convexHull(points)
    cv2.fillConvexPoly(im, points, color=color)

def get_face_mask(im, landmarks):
    im = numpy.zeros(im.shape[:2], dtype=numpy.float64)

    for group in OVERLAY_POINTS:
        draw_convex_hull(im,
                         landmarks[group],
                         color=1)

    im = numpy.array([im, im, im]).transpose((1, 2, 0))

   # im = (cv2.GaussianBlur(im, (FEATHER_AMOUNT, FEATHER_AMOUNT), 0) > 0) * 1.0
    im = cv2.GaussianBlur(im, (FEATHER_AMOUNT, FEATHER_AMOUNT), 0)

    return im
    
def transformation_from_points(points1, points2):
    
    points1 = points1.astype(numpy.float64)
    points2 = points2.astype(numpy.float64)

    c1 = numpy.mean(points1, axis=0)
    c2 = numpy.mean(points2, axis=0)
    points1 -= c1
    points2 -= c2

    s1 = numpy.std(points1)
    s2 = numpy.std(points2)
    points1 /= s1
    points2 /= s2

    U, S, Vt = numpy.linalg.svd(points1.T * points2)

 
    R = (U * Vt).T

    return numpy.vstack([numpy.hstack(((s2 / s1) * R,
                                       c2.T - (s2 / s1) * R * c1.T)),
                         numpy.matrix([0., 0., 1.])])


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
    img = cv2.imread(pic)
    for k in range(n):  
        i = int(numpy.random.random() * img.shape[1])  
        j = int(numpy.random.random() * img.shape[0]) 
        if img.ndim == 2:   
            img[j,i] = 255        
        elif img.ndim == 3:     
            img[j,i,0]= 255    
            img[j,i,1]= 255    
            img[j,i,2]= 255  
    #cv2.imwrite("th3.png", img, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])       
    dst=cv2.cvtColor(img,cv2.COLOR_BGR2GRAY) 

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
    new= cv2.bilateralFilter(dst,7,75,75) 
    return new
new= colorchange (sys.argv[1])  
cv2.imwrite("./new.jpg", new, [int(cv2.IMWRITE_PNG_COMPRESSION), 0])







def read_im_and_landmarks(fname):
    im = cv2.imread(fname, cv2.IMREAD_COLOR)
    im = cv2.resize(im, (im.shape[1] * SCALE_FACTOR,
                         im.shape[0] * SCALE_FACTOR))
    s = get_landmarks(im)

    return im, s

def warp_im(im, M, dshape):
    output_im = numpy.zeros(dshape, dtype=im.dtype)
    cv2.warpAffine(im,
                   M[:2],
                   (dshape[1], dshape[0]),
                   dst=output_im,
                   borderMode=cv2.BORDER_TRANSPARENT,
                   flags=cv2.WARP_INVERSE_MAP)
    return output_im
"""
def correct_colours(im1, im2, landmarks1):
    blur_amount = COLOUR_CORRECT_BLUR_FRAC * numpy.linalg.norm(
                              numpy.mean(landmarks1[LEFT_EYE_POINTS], axis=0) -
                              numpy.mean(landmarks1[RIGHT_EYE_POINTS], axis=0))
    blur_amount = int(blur_amount)
    if blur_amount % 2 == 0:
        blur_amount += 1
    im1_blur = cv2.GaussianBlur(im1, (blur_amount, blur_amount), 0)
    im2_blur = cv2.GaussianBlur(im2, (blur_amount, blur_amount), 0)

    # Avoid divide-by-zero errors.
    im2_blur += (128 * (im2_blur <= 1.0)).astype(im2_blur.dtype)

    return (im2.astype(numpy.float64) * im1_blur.astype(numpy.float64) /
                                                im2_blur.astype(numpy.float64))
"""
im1, landmarks1 = read_im_and_landmarks(sys.argv[1])
im2, landmarks2 = read_im_and_landmarks('./new.jpg')

M = transformation_from_points(landmarks1[ALIGN_POINTS],
                               landmarks2[ALIGN_POINTS])

mask = get_face_mask(im2, landmarks2)
warped_mask = warp_im(mask, M, im1.shape)
combined_mask = numpy.max([get_face_mask(im1, landmarks1), warped_mask],
                          axis=0)

warped_im2 = warp_im(im2, M, im1.shape)
#warped_corrected_im2 = correct_colours(im1, warped_im2, landmarks1)

output_im = im1 * (1.0 - combined_mask) + warped_im2 * combined_mask

cv2.imwrite('./output.jpeg', output_im)