import boto3
import settings

def upload_s3_file(fileName):
    s3_client = boto3.client('s3')
    response = s3_client.upload_file(str(fileName), settings.bucket, str(fileName))

def upload_s3_object(data):
    s3_client = boto3.client('s3')
    response = s3_client.upload_fileobj(data, settings.bucket, 'testkey')
