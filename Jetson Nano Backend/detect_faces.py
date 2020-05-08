import cv2 

def detect_faces(cascade, test_image, scaleFactor = 1.1):
    # create a copy of the image to prevent any changes to the original one.
    image_copy = test_image.copy()
    gray_image = cv2.cvtColor(image_copy, cv2.COLOR_BGR2GRAY)
    
    # Applying the haar classifier to detect faces
    faces_rect = cascade.detectMultiScale(gray_image, scaleFactor=scaleFactor, minNeighbors=5)

    #Create an list of images if a face is found crop that face and append it to
    #the list, return the list when done
    img =[]
    for (x, y, w, h) in faces_rect:
        #cv2.rectangle(image_copy, (x, y), (x+w, y+h), (0, 0, 0), 5)
        img.append(image_copy[y-20:y+h+30, x-20:x+h+20].copy())
        
    return img
