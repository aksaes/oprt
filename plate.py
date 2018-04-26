import io
import os
import sys
import re
from google.cloud import vision
from google.cloud.vision import types

image_name = sys.argv[1]
client = vision.ImageAnnotatorClient()
with io.open(image_name, 'rb') as image_file:
    content = image_file.read()
image = types.Image(content=content)
response = client.text_detection(image=image)
labels = response.text_annotations
for label in labels:
        text=label.description
        if ('AN' in text ) or ('AP' in text ) or ('AR' in text ) or ('AS' in text ) or ('BR' in text ) or ('CG' in text ) or ('CH' in text ) or ('DD' in text ) or ('DL' in text ) or ('DN' in text ) or ('GA' in text ) or ('GJ' in text ) or ('HR' in text ) or ('HP' in text ) or ('JH' in text ) or ('JK' in text ) or ('KA' in text ) or ('KL' in text ) or ('LD' in text ) or ('MH' in text ) or ('ML' in text ) or ('MN' in text ) or ('MP' in text ) or ('MZ' in text ) or ('NL' in text ) or ('OD' in text ) or ('PB' in text ) or ('PY' in text ) or ('RJ' in text ) or ('SK' in text ) or ('TN' in text ) or ('TR' in text ) or ('TS' in text ) or ('UK' in text ) or ('UP' in text ) or ('WB' in text ) :
                text=re.sub('\W+','', text )
                image=' '+image_name
                cmd="php trigger-sms.php "+text+image
                os.system(cmd)
                break
        break
