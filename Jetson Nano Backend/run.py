import cv2
from detect_faces import *
from datetime import date
from upload import upload_s3_file
from dbconnection import database
from facesearch import getfacebyImage

db = database()
if not db.getStatus():
    #loop display on lcd no connection to database check ethernet restart program
    print("No connection")

key = cv2. waitKey(1)
webcam = cv2.VideoCapture(0)
webcam.set(cv2.CAP_PROP_FRAME_WIDTH, 1920)
webcam.set(cv2.CAP_PROP_FRAME_HEIGHT, 1080)
webcam2 = cv2.VideoCapture(1)
webcam2.set(cv2.CAP_PROP_FRAME_WIDTH, 1920)
webcam2.set(cv2.CAP_PROP_FRAME_HEIGHT, 1080)
persons = {}
if not(webcam.isOpened and webcam2.isOpened()):
    #display webcams not plugged in on lcd
    print("Plug in cameras")
    webcam.release()
    webcam2.release()
    exit()

print("Capturing")
while True:
        check, frame = webcam.read()
        check2, frame2 = webcam2.read()
        
        cv2.imshow("Capturing", frame2)
        key = cv2.waitKey(1)
        if key == ord('s'):
            
            #Camera 1
            haar_cascade_face = cv2.CascadeClassifier('haarcascades/haarcascade_profileface.xml')
            faces1 = detect_faces(haar_cascade_face, frame)
            i = 0
            j = 0
            currentDay  = date.today()
            for face in faces1:
                try:
                    filename = f"{currentDay}-{i}cam1.jpg"
                    cv2.imwrite(filename, face)
                    upload_s3_file(filename)
                    #print(getfacebyImage(filename))
                    temp = getfacebyImage(filename)
                    if temp not in persons:
                        persons[temp] = temp
                except Exception as e:
                    cv2.destroyAllWindows()
                    webcam.release()
                    webcam = cv2.VideoCapture(0)
                    webcam.set(cv2.CAP_PROP_FRAME_WIDTH, 1920)
                    webcam.set(cv2.CAP_PROP_FRAME_HEIGHT, 1080)
                    check, frame = webcam.read()
                    break
                        
            #Camera 2
            haar_cascade_face = cv2.CascadeClassifier('haarcascades/haarcascade_frontalface_default.xml')
            faces2 = detect_faces(haar_cascade_face, frame2)
            for face in faces2:
                try:
                    filename = f"{currentDay}-{j}cam2.jpg"
                    cv2.imwrite(filename, face)
                    upload_s3_file(filename)
                    temp = getfacebyImage(filename)
                    if temp not in persons:
                        persons[temp] = temp
                except Exception as e:
                    cv2.destroyAllWindows()
                    webcam2.release()
                    webcam2 = cv2.VideoCapture(1)
                    webcam2.set(cv2.CAP_PROP_FRAME_WIDTH, 1920)
                    webcam2.set(cv2.CAP_PROP_FRAME_HEIGHT, 1080)
                    check2, frame2 = webcam2.read()
                    cv2.imshow("Capturing", frame2)
                    break
            if not db.getStatus():
                #Show no connection
                print("NC")
            else:
                for person in persons:
                    db.updateDB(person)
                    print(person)
        elif key == ord('q'):
            print("Turning off camera.")
            webcam.release()
            print("Camera off.")
            print("Program ended.")
            cv2.destroyAllWindows()
            break
        
