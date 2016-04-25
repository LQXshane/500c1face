#Color Change
##Lips 
####I tried two way to change the color of lips.

####Approach1:
+ I use the gaussian threshold.

		threshold.cv2.ADAPTIVE_THRESH_GAUSSIAN_C 
Threshold value is the weighted sum of neighbourhood values where weights are a gaussian window. This is a kind of adaptive thresholding which could fit image in different lighting conditions in different areas. 

+ Also I use the bilateral filter to blur the image
			
		cv2.bilateralFilter()
This filter is highly effective at noise removal while preserving edges. Though the operation is slower compared to other filters.

Step1. 	Get the grayscale of image.

Step2. 	Adjust the histogram. 
(It in case the picture is to dark or to light)

Step3. 	Using gaussian Threshold and rewrite the picture 

Step4. 	Set the white part of picture to color1
	 	Set the black part of picture to color2
	 	(color1 is what we want the color,color2 is a little lighter than color1)
	 	In this case, it could remain the detail of the picture.

Step5. 	Blur the picture to make it more nature

Step6. 	Blend the new picture (which has already changed color) with the original picture.
		I use the addweight as 0.7 to 0.3
	 	(This step guarantee that the effect will be different due to the different people's orginal lip color)

**The advantage of this approach:**
When using the picture which is high definition and already contain many details,the result will as good as picture of **example1**. However,when we use the front-facing camera,the detial of lips is rare. Only the outline of lips are apparent.

####Approach2:
+ I use the salt to add noise on picture

**The advantage of this approach:** It add more texture to the picture. Expecially when we use the front-facing camera, the effect is better. However,the texture is not as real as the approach1.

####Final edition:
By cooproate the two approach, the lips could have an apparent outline and some texture and gloss on it. 



##eyebrow 
So far, I just simplely get the coordinates of eyebrow and draw a colorful line to connect them. The effect is far away from good to look. In further improve,I want try to use PIL library of Python to draw lines which makes the pictures more vivid.
