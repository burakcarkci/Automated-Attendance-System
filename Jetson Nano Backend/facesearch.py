import boto3
import settings


def getfacebyImage(fileName):
    threshold = 90
    maxFaces = 1
    client=boto3.client('rekognition')

  
    response=client.search_faces_by_image(CollectionId=settings.collectionId,
                                Image={'S3Object':{'Bucket':settings.bucket,'Name':fileName}},
                                FaceMatchThreshold=threshold,
                                MaxFaces=maxFaces)

                                
    faceMatches=response['FaceMatches']
    faceId = faceMatches[0]['Face']['FaceId']
    return faceId