import numpy as np
import time
import datetime
import cv2
import io
import os
import re
from google.cloud import vision
from google.cloud.vision import types


id=0
font = cv2.FONT_HERSHEY_SIMPLEX
client = vision.ImageAnnotatorClient()

def cloud():
        ts = time.time()
        st = datetime.datetime.fromtimestamp(ts).strftime('%Y_%m_%d_%H_%M_%S')
        loc='capture\\'+st+'.jpg'
        print loc
        cv2.imwrite(loc,frame)
        time.sleep(1)
        with io.open(loc, 'rb') as image_file:
            content = image_file.read()
        image = types.Image(content=content)
        response = client.text_detection(image=image)
        labels = response.text_annotations
        for label in labels:
                text=label.description
                if ('AN' in text ) or ('AP' in text ) or ('AR' in text ) or ('AS' in text ) or ('BR' in text ) or ('CG' in text ) or ('CH' in text ) or ('DD' in text ) or ('DL' in text ) or ('DN' in text ) or ('GA' in text ) or ('GJ' in text ) or ('HR' in text ) or ('HP' in text ) or ('JH' in text ) or ('JK' in text ) or ('KA' in text ) or ('KL' in text ) or ('LD' in text ) or ('MH' in text ) or ('ML' in text ) or ('MN' in text ) or ('MP' in text ) or ('MZ' in text ) or ('NL' in text ) or ('OD' in text ) or ('PB' in text ) or ('PY' in text ) or ('RJ' in text ) or ('SK' in text ) or ('TN' in text ) or ('TR' in text ) or ('TS' in text ) or ('UK' in text ) or ('UP' in text ) or ('WB' in text ) :
                        text=re.sub('\W+','', text )
                        cmd="php trigger-sms.php "+text+' '+loc
                        os.system(cmd)
                        print text
                        break
camera = cv2.VideoCapture(0)

while True:
        (grabbed, frame) = camera.read()
        if id==3:
                cloud()
                id=0
        
        cv2.imshow("Live", frame)
        k = cv2.waitKey(5) & 0xFF
        if k == 27:
                print "Program Exiting"
                break
        elif k==107:
                id=3
                stat=0
        elif k==255:
                f=0
        else:
                print k
                print "Invalid Input"
        
camera.release()
cv2.destroyAllWindows()



