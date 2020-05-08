import mysql.connector
import settings

class database():   
    def __init__(self):
       self.__connection = None
       self.__status = False
       self.__setStatus(self.__status)
       #self.getStatus()
       self.connectDB()
       
    
    def connectDB(self):
        try:
            cnx =  mysql.connector.connection.MySQLConnection(user=settings.username, password=settings.userpassword,
                                        host=settings.hostname,
                                        database=settings.dbname)
            self.__connection = cnx
            self.__setStatus(True)
        except:
            self.__setStatus(False)

    def __closeDB(self, connection):
        self.__connection.close()


    def updateDB(self, value):
        #imageurl = "face-picture-collection.s3.amazonaws.com/"+filename
        data = (value,)
        cursor = self.__connection.cursor()
        query = ("UPDATE students set s_present = s_present+1 where fid = %s")
        cursor.execute(query,data)
        self.__connection.commit()
        cursor.close()
       
    def insertDB(self, values):
        cursor = self.connection.cursor()
        values = (2, 'work in', 'progress')
        query = ("INSERT INTO student" 
        "(id, name, lname)"
        "VALUES (%s, %s, %s)")
        cursor.execute(query, values)
        self.__connection.commit()
        cursor.close()
        self.__connection.close()
    
    def getStatus(self):
        return self.__status
    
    def __setStatus(self, status):
        self.__status = status
#if __name__ == "__main__":
#    db = database()
#    print(db.getStatus())
